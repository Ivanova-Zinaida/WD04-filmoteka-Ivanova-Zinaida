<?php   
	require('config.php');
	require('database.php');
	
	$link= db_connect();
	require('models/films.php');
	require('functions/login-functions.php');
	if ( @$_GET['action'] == 'delete') {
	 $result = delete_film($link, $_GET['id']);
	if ($result){
	$resultInfo = "<p>Фильм был удален!</p>";
		}	
	}

	$resultInfo="";
	$sucsessResult='';
	$errorResult='';
	$errors='';

	$film = get_film($link, $_GET['id']);

	include('views/head.tpl');
    include('views/notification.tpl');
	include('views/film-single.tpl');
	include('views/footer.tpl');

?>

	