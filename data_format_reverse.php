<?php
/*
 * 将格式化输出的数据表格还原为纯文本格式
 */
$html = $_POST['data'];
$html = preg_replace( '{\r?\n}', "", $html );
$html = preg_replace( '{</td>(?!</tr>)}i', " ", $html );
$html = preg_replace( '{</tr>(?!</tbody>)}i', "\r\n", $html );
$html = preg_replace( '{<[^>]*>}', "", $html );
$html = preg_replace( '{(?:^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+}', "\n", $html );

echo $html;
?>
