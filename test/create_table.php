<?php
include_once('../connect_db.php');
$conn = connect_to_db();

$query = "CREATE TABLE IF NOT EXISTS Saliva(
    id         INT(11)     NOT NULL     AUTO_INCREMENT  PRIMARY KEY,
    CassetteId   VARCHAR(64) NOT NULL,
    IsUsed     TINYINT(1)  NOT NULL,
    UserId     VARCHAR(64)

)";

$query2 = "CREATE TABLE IF NOT EXISTS Patient(
    id                   INT(11)     NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
    UserId               VARCHAR(64) NOT NULL,
    JoinDate             DATE        NOT NULL,
    DeviceId             VARCHAR(64) NOT NULL,
    IsDropout            TINYINT(1)  NOT NULL   DEFAULT 0,
    DropoutDate          DATE        DEFAULT NULL,
    ConnectionCheckTime DATETIME    DEFAULT NULL,
    AppVersion           VARCHAR(12) DEFAULT NULL

)";

$query3 = "CREATE TABLE IF NOT EXISTS TestResult(
    id          INT(11)     NOT NULL    AUTO_INCREMENT PRIMARY KEY,
    UserId      VARCHAR(64) NOT NULL,
    Result      INT(2)      NOT NULL,
    DeviceID    VARCHAR(64) NOT NULL,
    Date        DATE        NOT NULL,
    Time        DATETIME    NOT NULL,
    Timestamp   BIGINT(20)  NOT NULL,
    IsPrime     TINYINT(1)  NOT NULL,
    IsFilled    TINYINT(1)  NOT NULL
)";

$query4 = "CREATE TABLE IF NOT EXISTS NoteAdd(
    id          INT(11)      NOT NULL     AUTO_INCREMENT   PRIMARY KEY,
    UserId      VARCHAR(64)  NOT NULL,
    IsAfterTest TINYINT(1)   NOT NULL,
    Date        DATE         NOT NULL,
    Time        DATETIME     NOT NULL,
    Timestamp   BIGINT(20)   NOT NULL,
    Timeslot    INT(2)       NOT NULL,
    Category    TINYINT(1)   NOT NULL,
    Type        INT(2)       NOT NULL,
    Items       INT(2)       NOT NULL,
    Impact      INT(2)       NOT NULL,
    Description VARCHAR(255)

)";

$query5 = "CREATE TABLE IF NOT EXISTS TestDetail(
    id                  INT(11)     NOT NULL    AUTO_INCREMENT   PRIMARY KEY,
    UserId              VARCHAR(64) NOT NULL,
    Date                DATE        NOT NULL,
    Time                DATETIME    NOT NULL,
    Timestamp           BIGINT(20)  NOT NULL,
    DeviceId            VARCHAR(64) NOT NULL,
    CassetteId          VARCHAR(64),
    FailedState         INT(2),
    FirstVoltage        INT(8),
    SecondVoltage       INT(8),
    DevicePower         INT(8),
    ColorReading        INT(8),
    ConnectionFailRate  INT(8),
    FailedReason        INT(2)

)";



#$result = mysql_query($sql);

if ( mysql_query($query, $conn) && mysql_query($query2, $conn) 
    && mysql_query($query3, $conn) && mysql_query($query4, $conn) && mysql_query($query5, $conn)) {
        echo "All Table created successfully\n";
} else {
        echo "Error creating table: " . mysql_error($conn)."\n";
}

mysql_close($conn);

?>
