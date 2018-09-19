<?php
	require('config.php');
	require('database.php');
	
	$link= db_connect();

	require('models/films.php');
	require('functions/login-functions.php');
    $films = films_all($link);

	$resultInfo="";
	$sucsessResult='';
	$errorResult='';
	$errors='';

	if(array_key_exists('newFilm', $_POST)){
		if ($_POST['title']=='' ){
			$errors[]="<p>Необходимо ввести название фильма</p>";
		}
		if ($_POST['genre']=='' ){
			$errors[]="<p>Необходимо ввести жанр фильма</p>";
		}
		if ($_POST['year']=='' ){
			$errors[]="<p>Необходимо год фильма</p>";
		}
		if(empty($errors)){
			$result=add_film($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);
			
			if($result){
				$sucsessResult = "<p>Фильм был успешно добавлен</p>";
			}else{
				$errorResult =  "<p>Что то пошло не так( Поробуйте добавить фильм еще раз!</p>";
			}
		}
		
		
	}

	include('views/head.tpl');
	include('views/notification.tpl');
	include('views/new-film.tpl');
	include('views/footer.tpl');
?>
	