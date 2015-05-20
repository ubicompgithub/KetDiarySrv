<?php
	
	$uid = $_POST['USERID'];
    $result=$_POST['RESULT'];
    $deviceId=$_POST['DEVICEID'];
    $cassetteId=$_POST['CASSETTEID'];
	
	$timestamp = $_POST['data'][0];
	$isPrime = $_POST['data'][4];
    $isFilled= $_POST['ISFILLED'];
    
    //for upload photo 
    /*
	$uploadDest = '../patients/' . $uid . '/' . $timestamp;
	if (!file_exists($uploadDest)) {
		if (!mkdir($uploadDest, 0777, true)) {
			die("Failed to create directory: " . $uploadDest);
		}
	}

	$len = count($_FILES['file']['name']);
	if ($len > 0) {
		for ($i=0; $i < $len; $i++) {
			$tmpName = $_FILES['file']['tmp_name'][$i];
			if (is_uploaded_file($tmpName)) {
				$fname = basename($_FILES['file']['name'][$i]);
				if (!move_uploaded_file($tmpName, $uploadDest . "/" . $fname)) {
					die("Fail to move the files");
				}
			} else {
				die("No upload file exists");
			}
		}
	} else {
		die("No upload file");
	}
    */
	
	include_once('../connect_db.php');
	$dbhandle = connect_to_db();

	$timestamp_in_sec = $timestamp/1000;	
	$date = date('Y-m-d', $timestamp_in_sec);
	$time = date('H:i:s', $timestamp_in_sec);
	$hr = intval(date('H', $timestamp_in_sec));

    /*
	$datafile = $uploadDest.'/'.$timestamp.'.txt';
	$geofile = $uploadDest.'/'.'geo.txt';
	$detailfile = $uploadDest.'/detection_detail.txt';
	$imgfilesob = $uploadDest.'/'.'IMG_'.$timestamp.'_1.sob';
	$imgfile = $uploadDest.'/'.'IMG_'.$timestamp.'_1.jpg';
	$imgfilesob2 = $uploadDest.'/'.'IMG_'.$timestamp.'_2.sob';
	$imgfile2 = $uploadDest.'/'.'IMG_'.$timestamp.'_2.jpg';
	$imgfilesob3 = $uploadDest.'/'.'IMG_'.$timestamp.'_3.sob';
	$imgfile3 = $uploadDest.'/'.'IMG_'.$timestamp.'_3.jpg';


	if (file_exists($imgfilesob))	
		rename($imgfilesob,$imgfile);
	if (file_exists($imgfilesob2))	
		rename($imgfilesob2,$imgfile2);
	if (file_exists($imgfilesob3))	
		rename($imgfilesob3,$imgfile3);

	if (file_exists($imgfile)&&file_exists($imgfile2)&&file_exists($imgfile3)){
	}else{
		die('no snapshots');
	}

	if (!file_exists($detailfile)){
		die('no detail file');
	}*/

	$sql = "INSERT INTO TestResult (UserId,Result,DeviceId,
    CassetteId,Date,Time,Timestamp,isPrime,isFilled) 
    VALUES ('$uid',$result,'$deviceId', '$cassetteId','$date','$time',
    $timestamp,$isPrime,$isFilled)";
		$result = mysql_query($sql);
		echo "\n$sql\n";
		if (!$result)
			die ('invalid query');
	}
	
	mysql_close($dbhandle);

	echo 'upload success';
?>
