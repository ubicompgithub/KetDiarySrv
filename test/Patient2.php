<?php

	// Get the user id
	$uid = $_POST['USERID'];
    
    $joinDate = date("Y-m-d");
	$joinDate = $_POST['userData'][0];
    $joinDate = date("Y-m-d");

	$DeviceId = "unknown";
	$DeviceId = $_POST['userData'][1];

	#$usedCounter = $_POST['userData'][2];
	$App = $_POST['userData'][3];

	include('../connect_db.php');
	$dbhandle = connect_to_db();

	$datetime = date("Y-m-d H:i:s");
    echo $uid."\n";

	$sql = "SELECT UserId FROM Patient WHERE UserId = '$uid' LIMIT 1";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	if ($row) {
		echo "update user\n";
		//$uidOld = $row['UserId'];
		//$devIdOld = $row['DeviceId'];
		//if ($devIdOld <> $sensorId){
		//	$sql = "UPDATE Alcoholic SET DeviceId = '$DeviceId' WHERE UserId = '$uidOld'";
		//	$result = mysql_query($sql);
		//	if (!$result)
		//		die('fail 0');
		//}
	}
	else{
		echo "add new user\n";
		$sql = "INSERT INTO Patient (UserId,JoinDate) VALUES ('$uid','$joinDate')";
		$result = mysql_query($sql);
		if (!$result)
			die('fail 1');
	}

	$sql = "UPDATE Patient SET ConnectionCheckTime = '".$datetime."', AppVersion = '".$App."' WHERE UserId= '".$uid."'";
	$result = mysql_query($sql);
	if (!$result)
		die('fail');


	mysql_close($dbhandle);
	echo "upload success";
	
?>

