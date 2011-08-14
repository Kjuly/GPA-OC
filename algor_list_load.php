<?php
/*
 * 传递被选择学校的数据示例到文本框
 */
$doc = new DomDocument();
$doc->load( "data/algor_list.xml" );

$html = '<option value="" selected="selected">算法（默认采用您所在学校算法）</option>';
$algors = $doc->getElementsByTagName('algor');

// 遍历所有以字母划分的项
foreach( $algors as $a ) {
	$html .= '<option value="' . $a->getElementsByTagName('id')->item(0)->nodeValue . '">';
	$html .= $a->getElementsByTagName('name')->item(0)->nodeValue . '</option>';
}
echo $html;
?>
