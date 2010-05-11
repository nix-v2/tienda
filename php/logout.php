<?php session_start();
// Borramos toda la sesion
session_destroy();
echo 'Ha terminado la session <p><a href="../web/home.php">home</a></p>';
?>
<SCRIPT LANGUAGE="javascript">
location.href = "../web/home.php";
</SCRIPT>
