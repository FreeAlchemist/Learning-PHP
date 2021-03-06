<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
	<?php

	$filename=$_POST['filename'];
	$id=$_POST['id'];
	$del_elements=array();
	$contactnum=0;

	if (file_exists($filename)) {
	    $xml = simplexml_load_file($filename);
	    // print_r($xml);
	}
	else {
	    exit('Failed to open !'.$filename."!");
	}

	foreach ($xml as $key => $value) {
		if ($key=="contact") {
			$contactnum++;
		}
		
		if ($value['id']==$id) {
			if (!empty($_POST['delete'])) {
				$del_elements[]=$value;
				// print_r($xml);
				foreach ($del_elements as $key => $value) {
					// print_r($value);
					unset($value[0]);
				}
			}
			else{
				$value->fio->lastname=$_POST['lastname'];
				$value->fio->firstname=$_POST['firstname'];
				$value->fio->surname=$_POST['surname'];
				$value->fio->phone=$_POST['phone'];
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

	if (!empty($_POST['create'])) {
			$xml->addChild('contact');
			$contact=$xml->contact[$contactnum];
			$contact->addAttribute('id', $id);
			$contact->fio->lastname=$_POST['lastname'];
			$contact->fio->firstname=$_POST['firstname'];
			$contact->fio->surname=$_POST['surname'];
			$contact->phone=$_POST['phone'];
			$bdarr=explode("-",$_POST['birthdate']);
			$contact->birthdate->day=$bdarr[2];
			$contact->birthdate->month=$bdarr[1];
			$contact->birthdate->year=$bdarr[0];
			$contact->adress->country=$_POST['country'];
			$contact->adress->city=$_POST['city'];
		}
	$content=$xml->asXML();
	file_put_contents($filename, $content);
	header('Location:10.php');
	?>
</body>
</html>
