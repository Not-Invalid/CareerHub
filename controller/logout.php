<?php
session_start();
session_destroy();
header("location: ../partials/login.php");
?>