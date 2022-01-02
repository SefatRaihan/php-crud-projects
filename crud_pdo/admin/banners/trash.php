<?php
include_once( $_SERVER['DOCUMENT_ROOT'].'/crud/config.php');

use App\Banner;

$_banner = new Banner();
$_banner->trash();