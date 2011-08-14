<?php
/* 处理所有未捕获的异常 */
/*function top_level_exception()
{
	echo "发生未知异常";
}
set_exception_handler();
throw new top_level_exception();*/

/*
 * 主代码
 */
$calculate_ordinary_course = $_POST["coc"];
$calculate_elective_course = $_POST["cec"];
if( $calculate_ordinary_course!="1" && $calculate_elective_course!="1" ) {
	echo "<p id='empty_error'>对不起，没有符合的学科可计算。<br/>您可能未选学科类别。</p>";
	return;
}
$school = $_POST["school"];
$data = $_POST["data"];
$row = explode("\n",$data);
$score = array();
$credits = array();
$r_mol = 0;  // 结果分子部分
$r_den = 0;  // 结果分母部分

if( $school=="2" ) { /* 学校2：浙江工业大学 */
$col_course  = 2; // 课目类别列-1
$col_score   = 3; // 成绩所在列-1
$col_credits = 5; // 学分所在列-1
foreach( $row as $single_row )
{
	$chr = explode(" ",$single_row);
	for( $i=0; $i<count($chr); $i++ ) {
		if(     strspn($chr[$i],"优")) $chr[$i] = 95;
		elseif( strspn($chr[$i],"良")) $chr[$i] = 85;
		elseif( strspn($chr[$i],"中")) $chr[$i] = 75;
		elseif( $chr[$i] == "及格"  || $chr[$i]=="合格"   ) $chr[$i] = 65;
		elseif( $chr[$i] == "不及格"|| $chr[$i]=="不合格" ) $chr[$i] = 50;
	}
	if( ($calculate_ordinary_course=="1" && $chr[$col_course]=="普通专业")
		|| $calculate_elective_course=="1" && $chr[$col_course]=="公选课" ) {
		array_push( $score, $chr[$col_score] );
		array_push( $credits, $chr[$col_credits] );
	}
}
for( $i=0; $i<count($row); $i++ ) {
	if( $credits[$i]<=0 ) continue;
	if( $score[$i]>=60 ) $r_mol += ($score[$i]-50) / 10 * $credits[$i]; // 只有>=60，才算绩点
	$r_den += $credits[$i];                                             // 只要学分有效，均需要计算在内
}
}elseif( $school=="1" ) { /* 学校1：南京信息工程大学 */
$col_course  = 3; // 课目类别列-1
$col_score   = 4; // 成绩所在列-1
$col_credits = 5; // 学分所在列-1
foreach( $row as $single_row )
{
	$chr = explode(" ",$single_row);
	for( $i=0; $i<count($chr); $i++ ) {
		if(     strspn($chr[$i],"优")) $chr[$i] = 95;
		elseif( strspn($chr[$i],"良")) $chr[$i] = 85;
		elseif( strspn($chr[$i],"中")) $chr[$i] = 75;
		elseif( $chr[$i] == "及格"  || $chr[$i]=="合格"   ) $chr[$i] = 65;
		elseif( $chr[$i] == "不及格"|| $chr[$i]=="不合格" ) $chr[$i] = 50;
	}
	if( ($calculate_ordinary_course=="1" && (strspn($chr[$col_course],"必")||strspn($chr[$col_course],"专业")) )
		|| ($calculate_elective_course=="1" && ($chr[$col_course]=="公共"||strspn($chr[$col_course],"选")||strspn($chr[$col_course],"通") ) )) {
		array_push( $score, $chr[$col_score] );
		array_push( $credits, $chr[$col_credits] );
	}
}
for( $i=0; $i<count($row); $i++ ) {
	if(     $score[$i]>=90 ) { $tmp=4.0; }
	elseif( $score[$i]>=86 ) { $tmp=3.8; }
	elseif( $score[$i]>=83 ) { $tmp=3.5; }
	elseif( $score[$i]>=80 ) { $tmp=3.0; }
	elseif( $score[$i]>=76 ) { $tmp=2.8; }
	elseif( $score[$i]>=73 ) { $tmp=2.5; }
	elseif( $score[$i]>=70 ) { $tmp=2.0; }
	elseif( $score[$i]>=66 ) { $tmp=1.8; }
	elseif( $score[$i]>=63 ) { $tmp=1.5; }
	elseif( $score[$i]>=60 ) { $tmp=1.0; }
	else { continue; }
	$r_mol += $tmp * $credits[$i];
	$r_den += $credits[$i];
}
}

/*
 * result
 */
$result = $r_den!=0?$r_mol/$r_den:0;
$str = "GPA：<p class='gpa_result'>" . round($result,10) . "</p>";
$str .= "<br/><p>总学分：" . $r_den . "</p>";
$str .= "<p>平均成绩：" . ( count($score)!=0?array_sum($score)/count($score):0 ) . "</p>";
$str .= "<p>计算的学科总数：" . count($score) . "</p>";
echo $str;
?>
