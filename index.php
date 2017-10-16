<?php
//Config files
require 'core/config.php';

if(isset($_GET['p'])){
    $p = $_GET['p'];
}
else{
    $p = 'register';
}

//Data processing
require "core/processing.php";

//Header
if($p === "register" || $p === "confirmation-inscription"){
	require "includes/header-register.php";
}
else{
	require 'includes/header.php';
}

//Ob_start
ob_start();
if($p === 'home'){
	if($_SESSION['connected'] === true){
    	require '/content/home.php';
    }
}elseif($p === 'register'){
    require '/content/register.php';
}
else{
	require '/content/' . $p . '.php';
}
$content = ob_get_clean();

//Template
require '/content/templates/default.php';