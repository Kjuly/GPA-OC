<?php
/*
 * 查看已选算法信息
 */
//$id = substr($_POST['algor'],6);
$id = $_POST['algor'];

$doc = new DomDocument('1.0');
$doc->formatOutput = true;
$doc->load( "data/" . $id . ".xml" ); // 载入对应学校数据
 
$a = $doc->getElementsByTagName('algor');

/*echo $a->getElementsByTagName('gpa')->item(0)->nodeValue . "\r\n"
	. $a->getElementsByTagName('single')->item(0)->nodeValue;*/
echo $id;
?>
