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

	echo "start contactnum:";
	echo $contactnum;
	echo "<hr>";

	if (file_exists($filename)) {
	    $xml = simplexml_load_file($filename);
	    print_r($xml);
	} else {
	    exit('Failed to open !'.$filename."!");
	}

	foreach ($xml as $key => $value) {
		if ($key=="contact") {
			$contactnum++;

			echo "<hr>contactnum changed to: ";
			echo $contactnum;
			echo "<hr>";
		}
		
		if ($value['id']==$id) {
			if (!empty($_POST['delete'])) {
				$del_elements[]=$value;
				print_r($xml);
				foreach ($del_elements as $key => $value) {
					print_r($value);
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
			echo "need to add new contact as child[";
			echo $contactnum;
			echo "]";
			$xml->addChild('contact');
			$contact=$xml->contact[$contactnum];

			echo "<hr>Added new contant: <br>";
			print_r($contact);

			$contact->addAttribute('id', $id);
			echo "<hr>Added contant id: <br>";
			echo($contact['id']);

			$contact->fio->lastname=$_POST['lastname'];
			// $contact->fio->lastname=iconv("UTF-8","cp1251",($_POST['lastname']));
			echo "<hr>Added lastname: <br>";
			echo($contact->fio->lastname);

			$contact->fio->firstname=$_POST['firstname'];
			echo "<hr>Added firstname: <br>";
			echo($contact->fio->firstname);

			$contact->fio->surname=$_POST['surname'];
			echo "<hr>Added surname: <br>";
			echo($contact->fio->surname);

			$contact->phone=$_POST['phone'];
			echo "<hr>Added phone: <br>";
			echo($contact->phone);

			$contact->adress->country=$_POST['country'];
			$contact->adress->city=$_POST['city'];
			echo "<hr>Added country: <br>";
			echo($contact->adress->country);
			echo "<hr>Added city: <br>";
			echo($contact->adress->city);

			$bdarr=explode("-",$_POST['birthdate']);
			$contact->birthdate->year=$bdarr[0];
			$contact->birthdate->month=$bdarr[1];
			$contact->birthdate->day=$bdarr[2];
			echo "<hr>Added birthdate: <br>";
			echo ($contact->birthdate->year.'-'.$contact->birthdate->month.'-'.$contact->birthdate->day);
		}

	// echo "<hr>xml[0]:<br>";
	// print_r($xml->contact[0]);
	// echo "<hr>xml[1]:<br>";
	// print_r($xml->contact[1]);
	// echo "<hr>xml[contactnum]:<br>";
	// print_r($xml->contact[$contactnum]);
	echo "<hr>";
	print_r($xml);
	$content=$xml->asXML();
	// print_r($content);
	echo $content;
	// file_put_contents($filename, $content);
	// header('Location:10.php');
	?>
</body>
</html>
