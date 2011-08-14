<?php
/*
 * 中国电子科技大学
 */
$index = 0;
foreach( $score as $single )
{
	if(     strspn($single,"优")) $score[$index] = 95;
	elseif( strspn($single,"良")) $score[$index] = 85;
	elseif( strspn($single,"中")) $score[$index] = 75;
	elseif( $single == "及格"  || $single=="合格"   ) $score[$index] = 65;
	elseif( $single == "不及格"|| $single=="不合格" ) $score[$index] = 55;
	$index++;
}
for( $i=0; $i<count($score); $i++ ) {
	if(     $score[$i]>=85 ) { $tmp=4.0; }
	elseif( $score[$i]>=70 ) { $tmp=3.0; }
	elseif( $score[$i]>=60 ) { $tmp=2.0; }
	else					 { $tmp=1.0; }
	$r_mol += $tmp * $credits[$i];
	$r_den += $credits[$i];
}
?>
