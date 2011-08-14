<?php
/*
 * 将数据输入框中内容格式化输出
 */
   $id = $_POST['school_id'];
 $data = $_POST['data'];
$col_t = substr( $id, 0, 2 );
$col_s = substr( $id, 2, 2 );
$col_c = substr( $id, 4, 2 );

//$data = strtr($data,"\t"," ");    // 将tab替换为空格
//$data = preg_replace("/ (\s+)/ "," ",$data); // 将多个空格替换为一个空格
//$row = explode("\n",$data);      // 通过\n符号分割数据列表为行
$rows = preg_split( '{\r?\n}', $data ); // 通过\n或者\r\n分割

$html = '<thead><tr>';
$i = 0;
while( $i++ < $col_t )
{
	if( $i == $col_s || $i == $col_c )
		$html .= '<th width="50">' . $i . '</th>';
	else
		$html .= '<th width="100">' . $i . '</th>';
}
$html .= '</tr></thead><tbody>';

// 遍历每一行
foreach( $rows as $row )
{
	$html .= '<tr>';
	$cols = preg_split( '{\s+}', $row, $col_t ); // 通过若干(至少一个)空格分割, 限制次数为$col_t
	//if( count($cols) < $col_t ) continue;
	
	// 遍历每一列
	foreach( $cols as $col )
	{
		$html .= '<td>' . $col . '</td>';
	}
	$html .= '</tr>';
}
$html .= '</tbody>';

echo $html;
?>
