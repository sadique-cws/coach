<?php 
include "../config.php";

session_destroy();

redirect("login.php");

?>