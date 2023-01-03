<?php
session_start();
session_destroy();
session_unset();
session_write_close();
unset($_POST);
header('location: index.php');
exit;
