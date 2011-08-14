<?php
$name = $_POST['sa_name'];                           // 学校中文名
$name_en = ucwords($_POST['sa_name_en']);            // 学校英文名，首字母大写
$name_en_s = strtolower($_POST['sa_name_en_short']); // 英文缩写，转化为小写
$algor = $_POST['sa_algor'];                         // 单门绩点算法描诉
$gpa_formula = $_POST['sa_gpa_formula'];             // GPA算法公式，默认不可编辑
$new_gpa_formula = $_POST['new_gpa_formula'];        // 复选框，若checked(on)，说明GPA算法公式不同，需要处理gpa_formula
$col_t = $_POST['sa_column_total'];                  // 成绩栏总列数
$col_s = $_POST['sa_column_score'];                  // 成绩所在列
$col_c = $_POST['sa_column_credits'];                // 学分所在列
$data_eg = $_POST['sa_data_eg'];                     // 成绩数据示例
$p_name = $_POST['sa_per_name'];                     // 提交人
$p_mail = $_POST['sa_per_mail'];                     // 提交人E-mail
$p_blog = $_POST['sa_per_blog'];                     // 提交人Blog

$id_str = "";
if( $col_t < 10 ) $id_str .= '0' . $col_t;
else              $id_str .= $col_t;
if( $col_s < 10 ) $id_str .= '0' . $col_s;
else              $id_str .= $col_s;
if( $col_c < 10 ) $id_str .= '0' . $col_c;
else              $id_str .= $col_c;
                  $id_str .= $name_en_s; // 最后示例：060406zjut
$alpha = strtoupper( substr($name_en_s,0,1) );

/* send mail */
$to = "kj@kjuly.com";
$subject = "School: " . $name . " | " . $p_name;
/*$header = "MIME-Version: 1.0" . "\r\n"
	//.= "Content-type:text/html;charset=iso-8859-1" . "\r\n"
	.= "Content-type:text/html;charset=utf-8" . "\r\n"*/
$header = "From:<GPA-Calculator-Online@kjuly.com>";
$message = "alpha: " . $alpha . "\n"
	. "id: " . $id_str . "\n"
	. "name: " . $name . "\n"
	. "e-name: " . $name_en . "\n\n"
	. "单门算法描述:\n" . $algor . "\n"
	. "GPA计算公式：\n" . $gpa_formula . "\n"
	. "成绩数据示例：\n" . $data_eg . "\n\n"
	. "提交人：" . $p_name . "\n"
	. "E-Mail：" . $p_mail . "\n"
	. "Blog：" . $p_blog;
mail( $to, $subject, $message, $header );
/* send mail end */

//echo $name . $name_en . $name_en_s . $algor . $gpa_formula . $new_gpa_formula . $col_t . $col_s . $col_c . $data_eg . $p_name . $p_mail . $p_blog;
?>
