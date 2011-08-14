<?php
/*
 * jmu 集美大学
 */
$index = 0;
foreach( $score as $single )
{
	if(     strspn($single,"优")) $score[$index] = 95;
	elseif( strspn($single,"良")) $score[$index] = 85;
	elseif( strspn($single,"中")) $score[$index] = 75;
	elseif( $single == "及格"  || $single=="合格"   ) $score[$index] = 65;
	elseif( $single == "不及格"|| $single=="不合格" ) $score[$index] = 50;
	$index++;
}
for( $i=0; $i<count($row); $i++ ) {
	if( $credits[$i]<=0 ) continue;
	if( $score[$i]>=60 ) $r_mol += ($score[$i]-50) / 10 * $credits[$i]; // 只有>=60，才算绩点
	$r_den += $credits[$i];                                             // 只要学分有效，均需要计算在内
}
?>
