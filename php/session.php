<?php 
session_start();
echo session_id();
session_destroy();
echo session_id();

?>
