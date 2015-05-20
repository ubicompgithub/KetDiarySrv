
<?php


$user_id = $_POST["USERID"];
#$join_date = $_POST["RESULT"];
#$is_dropout = $_POST["DATE"];
#$dropout_date = $_POST["TIMESLOT"];
#$ConnectionCheckTime = $_POST["ISFILLED"];
#$AppVersion = $_POST["CATAID"];

echo $user_id;

#$user_id = 'ket_default';
$join_date = date("Y-m-d");
$is_dropout = 0;
$dropout_date = NULL;
$ConnectionCheckTime =NULL;
$AppVersion = NULL;


// TODO: parameter checking

$db_link = @mysql_connect("localhost", "root", "ubicomp") or die("db open err");
$select_db = @mysql_select_db("drugfreediary");

if(!$select_db){
    die("db not open");
}else{
    if($user_id == -1)
        die("user_name not found");
    $sql_query = "INSERT INTO Patient(
         UserId, JoinDate, IsDropout) 
         VALUES('$user_id','$join_date',$is_dropout)";
    $result = mysql_query($sql_query);
    //echo $sql_query."<br>==";
    if($result == 1)
        echo "upload success";
    else
        //die('fail');
        echo "INSERT Fail";
}

//TODO Update Dropout, ConnectionCheckTime, AppVersion




mysql_close($db_link);
?>

