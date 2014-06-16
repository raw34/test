<?php 

$input = $_GET['param'];
echo "<div>". $input ."</div>";

//正常
//http://www.a.com/xss.php?param=test

//恶意
//http://www.a.com/xss.php?param=<script>alert(/xss/)</script>
