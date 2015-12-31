<!DOCTYPE html>
<html>
<head>
<meta charset="windows-cp1251">
</head>
<body>
	<?php
	print_r($_POST);
	echo "<hr>";
	$filename=$_POST['filename'];
	$id=$_POST['id'];
	$del_elements=array();
	$contactnum=0;
	if (file_exists($filename)) {
	    $xml = simplexml_load_file($filename);
	    // print_r($xml);
	} else {
	    exit('Failed to open !'.$filename."!");
	}
	foreach ($xml as $key => $value) {
		if ($value['id']==$id) {
			if (!empty($_POST['delete'])) {
				$del_elements[]=$value;
				print_r($xml);
				foreach ($del_elements as $key => $value) {
					print_r($value);
					unset($value[0]);
				}
			}
			else if (!empty($_POST['create'])) {
				// $xml->addChild("contact");
				if ($key=="contact") {
					$contactnum++;
					
				}
				// $xml->contact[]

			}
			else{
				$value->fio->lastname=$_POST['lastname'];
				$value->fio->firstname=$_POST['firstname'];
				$value->fio->surname=$_POST['surname'];
				$value->phone=$_POST['phone'];
				$ad=$value->adress;
				$ad->country=$_POST['country'];
				$ad->city=$_POST['city'];
				$bd=$value->birthdate;
				$bdarr=explode("-",$_POST['birthdate']);
				$bd->year=$bdarr[0];
				$bd->month=$bdarr[1];
				$bd->day=$bdarr[2];
			}
		}
	}
	echo $contactnum;
	
	// $content=$xml->asXML();
	// print_r($content);
	// file_put_contents($filename, $content);
	// header('Location:10.php');
	?>
</body>
