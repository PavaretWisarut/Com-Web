<?php
include "db_connect.php";
session_destroy();
header("location: index.php");
?>