<?php
	session_start();
	
	$debug=True;

	
	if ($debug==True)
	{
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}

	require 'connections.php';

	/*******************************
	* Common Paths                 *
	********************************
	* Set Defaults                 *
	* Include DB config and others *
	********************************/
	$filepath_inc_ext = '.php';
	$path_common='common/';
	$GLOBALS['path_layout']='layout/'; 
    $GLOBALS['path_inc']=$path_common.'inc/';
	$filepath_functions=$GLOBALS['path_inc'].'functions';
	$GLOBALS['title']='<i class="fas fa-share"></i>CS313 Teach07 Login Form<br /><i class="fas fa-users"></i>';
	$GLOBALS['title_simple']='CS313 Teach07 Login Form';


	$GLOBALS['conn']=$db;

    // Critical Functions (Not saying the below are not)
	require_once $filepath_functions . '.login' . $filepath_inc_ext;
	
	// Functions: Generic
	if ($debug==True) { echo '<P>CHECK: '.$filepath_functions.$filepath_inc_ext.'</P>'; }
	if (file_exists($filepath_functions.$filepath_inc_ext)) {
		//Functions
		require_once $filepath_functions . $filepath_inc_ext;
	}
?>