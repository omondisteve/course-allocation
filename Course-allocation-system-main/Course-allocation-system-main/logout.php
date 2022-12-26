<?php
session_start();
include_once("db-connect.php");
session_destroy();
header("location:index.php");

?>