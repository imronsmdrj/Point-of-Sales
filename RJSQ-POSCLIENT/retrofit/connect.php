<?php 

define('hostname','localhost');
define('username', 'root');
define('password', '');
define('database', 'rjsq_pos');

$conn = mysqli_connect(hostname, username, password, database) or die('Unable to connect');
