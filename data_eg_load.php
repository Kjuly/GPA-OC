<?php
/*
 * 选择相应学校后，在数据输入框中显示对应学校的数据实例
 */
$school_id = $_POST['school_id'];     // 获取学校id
$id = substr($school_id,6);           // 获取学校英文缩写

$doc = new DomDocument('1.0');
$doc->formatOutput = true;
$doc->load( "data/" . $id . ".xml" ); // 载入对应学校数据
 
echo $doc->getElementsByTagName('eg1')->item(0)->nodeValue . "\r\n"
   . $doc->getElementsByTagName('eg2')->item(0)->nodeValue . "\r\n"
   . $doc->getElementsByTagName('eg3')->item(0)->nodeValue;
?>
