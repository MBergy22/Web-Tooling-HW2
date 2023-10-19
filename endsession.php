// End session for logout
<?php

session_start();
session_destroy(); 
header("Location: index.php"); 
exit();


header("Location: index.php");
exit();
?>
