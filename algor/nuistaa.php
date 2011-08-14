<?php
/*
 * 南京信息工程大学
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
for( $i=0; $i<count($score); $i++ ) {
	if(     $score[$i]>=90 ) { $tmp=4.0; }
	elseif( $score[$i]>=86 ) { $tmp=3.8; }
	elseif( $score[$i]>=83 ) { $tmp=3.5; }
	elseif( $score[$i]>=80 ) { $tmp=3.0; }
	elseif( $score[$i]>=76 ) { $tmp=2.8; }
	elseif( $score[$i]>=73 ) { $tmp=2.5; }
	elseif( $score[$i]>=70 ) { $tmp=2.0; }
	elseif( $score[$i]>=66 ) { $tmp=1.8; }
	elseif( $score[$i]>=63 ) { $tmp=1.5; }
	elseif( $score[$i]>=60 ) { $tmp=1.0; }
	else { continue; }
	$r_mol += $tmp * $credits[$i];
	$r_den += $credits[$i];
}
?>
