<?php
session_start();
session_destroy();
unset($_POST);
header('location: index.php');
exit;
