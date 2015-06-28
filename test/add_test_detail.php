
<?php

function getUserIDbyUsername($_user_name){
    $sql_str = "SELECT user_id FROM Patient WHERE" + 
        "user_name='" + $_user_name + "'";
    $result = mysql_query($sql_query);
    return 0;
    return mysql_fetch_field($result, 0)->user_id;
}

$user_name = $_POST["USERNAME"];
$result = $_POST["RESULT"];
$test_date = $_POST["DATE"];
$test_timeslot = $_POST["TIMESLOT"];
$is_filled = $_POST["ISFILLED"];
$catagory_id = $_POST["CATAID"];
$type_id = $_POST["TYPEID"];
$reason_id = $_POST["REASONID"];
$description = $_POST["DESCRIPTION"];
// TODO: parameter checking

$db_link = @mysql_connect("localhost", "root", "ubicomp") or die("db open err");
$select_db = @mysql_select_db("ketdiary");

if(!$select_db){
    die("db not open");
}else{
    $user_id = getUserIDbyUsername($user_name);
    if($user_id == -1)
        die("user_name not found");
    $sql_query = "INSERT INTO TestResult". 
        "(user_id, result, test_date, test_timeslot,".
        " is_filled, catagory_id, type_id, reason_id,".
        " description) VALUES ". 
        "(".$user_id.",".$result.",'".$test_date."',".$test_timeslot.
        ",".$is_filled.",".$catagory_id.",".$type_id.",".$reason_id.
        ",'".$description."')";
    $result = mysql_query($sql_query);
    //echo $sql_query."<br>==";
    if($result == 1)
        echo "upload success";
}
mysql_close($db_link);
?>

