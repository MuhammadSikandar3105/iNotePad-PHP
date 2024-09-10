<?php
session_start();
// destroy session on logout
session_destroy();

include("index.php");
?>