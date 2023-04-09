<?php
define('HOST','localhost');
define('USER','root');
define('DB','sepatu_paa');
define('PASS','');
$db = new mysqli(HOST,USER,PASS,DB) 
or die('Connetion error to the database');