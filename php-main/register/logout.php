<?php
include './config.php';

session_start();
session_start();
session_destroy();
header('Location:./login.php');
?>