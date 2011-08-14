<?php
/*
 * 传递被选择学校的数据示例到文本框
 */
$doc = new DomDocument();
$doc->load( "data/school.xml" );

$html = '<option value="" selected="selected">输入您所在学校</option>';
$schools = $doc->getElementsByTagName('school');

// 遍历所有以字母划分的项
foreach( $schools as $s ) {
	$html .= '<option value="' . $s->getElementsByTagName('id')->item(0)->nodeValue . '">';
	$html .= $s->getElementsByTagName('name')->item(0)->nodeValue . '</option>';
}
echo $html;
?>
