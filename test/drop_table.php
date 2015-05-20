<?php

include_once('../connect_db.php');
$conn = connect_to_db();

$query = "DROP TABLE IF EXIST Cassette, Patient, TestResult, NoteAdd, TestDetail";


if(mysql_query($query, $conn))
    echo "Drop Table success\n";
else
    echo "Error Drop Table\n";

mysql_close($conn);


?>
