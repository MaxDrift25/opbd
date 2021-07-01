<?php
    setcookie("login", "", time() - 60*60*24, '/');
    setcookie("admin", "", time() - 60*60*24, '/'); 
    header("Refresh:2");
    header("Location: glavnoe_menu_logged.php");
?>