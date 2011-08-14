<?php
/* Parameters Set */
      $algor = $_POST["algor"];         // 获取学校算法文件名
       $data = $_POST["data"];          // 获取成绩数据列表
		 $id = $_POST['school_id'];
  $col_total = substr( $id, 0, 2 );		// 数据总列数
  $col_score = substr( $id, 2, 2 )-1;	// 成绩所在列-1
$col_credits = substr( $id, 4, 2 )-1;	// 学分所在列-1
   $col_ts_d = $col_total-$col_score;   // 成绩列与总列数差
   $col_tc_d = $col_total-$col_credits; // 学分列与总列数差
      $score = array();                 // 成绩数组
    $credits = array();		            // 学分数组
      $r_mol = 0;                       // 结果分子部分
      $r_den = 0;                       // 结果分母部分

$data = strtr($data,"\t"," ");    // 将tab替换为空格
//$data = preg_replace("/ (\s+)/ "," ",$data); // 将多个空格替换为一个空格
 $row = explode("\n",$data);      // 通过\n符号分割数据列表为行

foreach( $row as $single_row )
{
	//$chr = explode(" ",$single_row);
	$chr = preg_split( "/\s+/", $single_row );
	$length = count($chr);
	if( $length < $col_total ) continue; // 判断：若列数小于总列数则忽略该行数据

	$col_s = $length - $col_ts_d;  // 从后向前
	$col_c = $length - $col_tc_d;

	array_push( $score, $chr[$col_s] );
	array_push( $credits, $chr[$col_c] );
}

/* Algorithm */
include( "algor/" . $algor . ".php" );

/* Result */
$result = $r_den!=0 ? $r_mol/$r_den : 0;
   $str = '<label>GPA：</label><span class="gpa">' . round( $result, 10 ) . '</span>';
  $str .= '<label>总学分：</label><span>' . $r_den . '</span>';
  $str .= '<label>平均成绩：</label><span>' . round( count($score)!=0 ? array_sum($score)/count($score) : 0, 5 ) . '</span>';
  $str .= '<label>计算的学科数：</label><span>' . count($score) . '</span>';
echo $str;
?>
