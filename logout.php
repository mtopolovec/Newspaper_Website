<?php

session_start();

//unset($_SESSION['$username']);

//Gasi kompletno sve parametre koje smo napravili sa $_SESSION!!!
session_destroy();

header('Location: index.php');

?>