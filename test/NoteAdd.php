<?php
	
	$uid = $_POST['USERID'];
    $isAfterTest = $_POST['ISAFTERTEST'];
	$timestamp = $_POST['data'][0];
    
    $recordDate = $_POST['RECORDDATE'];
    $recordTimeslot = $_POST['RECORDTIMESLOT'];
	$category = $_POST['CATEGORY'];
	$type = $_POST['TYPE'];
	$items = $_POST['ITEMS'];
	$impact = $_POST['IMPACT'];
    $description = $_POST['DESCRIPTION'];

	$timestamp_in_sec = $timestamp/1000;
	$date = date('Y-m-d', $timestamp_in_sec);
	$time = date('H:i:s', $timestamp_in_sec);



	include_once('../connect_db.php');
	$dbhandle = connect_to_db();

	$description = mysql_real_escape_string($description); //prevent SQL query error
    
    	
	$sql = "INSERT INTO NoteAdd (UserId,IsAfterTest,Date,Time,Timestamp,
    RecordDate,RecordTimeslot,Category,Type,Items,Impact,Description) 
    VALUES ('$uid',$isAfterTest,'$date','$time',$timestamp,'$recordDate',$recordTimeslot,$category,$type,$items,$impact,'{$description}')";
	$result = mysql_query($sql);
	if (!$result){
		echo $sql;
		die("invalid mysql query");
	}
	mysql_close($dbhandle);
	echo "upload success";
?>

