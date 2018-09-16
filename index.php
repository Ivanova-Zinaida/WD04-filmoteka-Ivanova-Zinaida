<?php   
	require('config.php');
	require('database.php');
	$link= db_connect();
	require('models/films.php');
	require('functions/login-functions.php');
	$resultInfo="";
	$sucsessResult='';
	$errorResult='';

	if ( @$_GET['action'] == 'delete') {
	 $result = delete_film($link, $_GET['id']);
	if ($result){
	$resultInfo = "<p>Фильм был удален!</p>";
		}	
	}

    $films = films_all($link);

	include('views/head.tpl');
	include('views/notification.tpl');
	include('views/index.tpl');
	include('views/footer.tpl');

?>

	