<?php
	
	$uid = $_POST['uid'];
    $deviceId = $_POST['data'][0];
	$timestamp = $_POST['data'][2];
	$cassetteId = $_POST['data'][1];
	$failedState = $_POST['data'][3];
	$firstVoltage = $_POST['data'][4];
	$secondVoltage = $_POST['data'][5];
	$devicePower = $_POST['data'][6];
	$colorReading = $_POST['data'][7];
	$connectionFailRate = $_POST['data'][8];
	$failedReason = $_POST['data'][9];
   


	$timestamp_in_sec = $timestamp/1000;
	$date = date('Y-m-d', $timestamp_in_sec);
	$time = date('H:i:s', $timestamp_in_sec);

	include_once('../connect_db.php');
	$dbhandle = connect_to_db();

	$sensorId = mysql_real_escape_string($sensorId);	
    $deviceId = mysql_real_escape_string($deviceId);
    $cassetteId = mysql_real_escape_string($cassetteId);
    $failedReason = mysql_real_escape_string($failedReason);

	$sql = "INSERT INTO TestDetail (UserId,Date,Time,Timestamp,DeviceId,
    CassetteId, FailedState, FirstVoltage, SecondVoltage, DevicePower,
    ColorReading, ConnectionFailRate, FailedReason) VALUES 
    ('$uid','$date','$time',$timestamp,'{$deviceId}', '{$cassetteId}', $failedState,
    $firstVoltage, $secondVoltage, $devicePower, $colorReading, $connectionFailRate,
    '{$failedReason}')";
	$result = mysql_query($sql);
	if (!$result){
		echo $sql;
		die("invalid mysql query");
	}
	mysql_close($dbhandle);
	echo "upload success";
?>

