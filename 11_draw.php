<?php

 if (!empty($_GET['getx'])) {
 		$x=$_GET['getx'];

 		 if (!empty($_GET['getk'])) {
 		 	$k=$_GET['getk'];
 		 }
 		 else {$k=1;}
 		$y=$x*$k;
 		$k2=$k+1;
 		$x2=$x*$k2;
		$y2=$x2*$k;
		$canvas = imagecreatetruecolor(400, 400);
		$green = imagecolorallocate($canvas, 132, 135, 28);
		$coral = imagecolorallocate($canvas, 240, 80, 60);
		imageline($canvas, $x, $y, $x2, $y2, $green);
		imagestring($canvas, 5, 0, 0, "Y=KX", $coral);
		imagestring($canvas, 5, 0, 15, "k=".$k."; x=".$x."; y=".$k."*".$x."=".$y, $coral);
		imagestring($canvas, 5, 0, 30, "k2=".$k2."; x2=".$k2."*".$x."=".$x2."; y2=".$k."*".$x2."=".$y2, $coral);
		header('Content-Type: image/png');
		imagepng($canvas);
		imagedestroy($canvas);
	}
	else{
		echo "No x";
		header('Location:11.php');
	}
?>
