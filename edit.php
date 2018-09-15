	
<?php
	require('config.php');
	require('database.php');
	$link= db_connect();

	require('models/films.php');
   	$films=get_film($link, $_GET['id']);

	$resultInfo="";
	$sucsessResult='';
	$errorResult='';

	if(array_key_exists('updateFilm', $_POST)){
	if ($_POST['title']=='' ){
		$errors[]="<p>Необходимо ввести название фильма</p>";
	}
	if ($_POST['genre']=='' ){
		$errors[]="<p>Необходимо ввести жанр фильма</p>";
	}
	if ($_POST['year']=='' ){
		$errors[]="<p>Необходимо ввести год фильма</p>";
	}
		
	if(empty($errors)){
	    $result=film_update($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'], $_GET['id']);
		if($result){
			$sucsessResult= "<p>Фильм был успешно изменен</p>";
		} else{
			$errorResult =  "<p>Что то пошло не так( Поробуйте  еще раз!</p>";
			}
		}	
	}
		
	include('views/head.tpl');
	include('views/notification.tpl');
	include('views/edit-film.tpl');
	include('views/footer.tpl');
?>	