<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "log";
$dbtab = "cues";
$dbtab2 = "post3";
$dbtab2 = "admins";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
$conn2 = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);