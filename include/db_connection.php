<?php 
session_start();
$database='ecommerce';
$username='localhost';
$password='root';
$con=mysqli_connect("$username","$password","","$database");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/ecommerce/');

define('SITE_PATH','http://localhost/ecommerce/');
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/Product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/Product/');

?>