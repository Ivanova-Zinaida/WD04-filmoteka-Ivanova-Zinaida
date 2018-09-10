<?php   
	$link=mysqli_connect('127.0.0.1:3306', 'root', '', 'WD04-filmoteka-Ivanova-Zinaida');
 
	if(mysqli_connect_error()){
		die("Ошибка подключения к базе данных");	
	}


	$resultInfo="";
	$sucsessResult='';
	$errorResult='';
	$errors= array();

// delete errors

if ( @$_GET['action'] == 'delete') {
	$query = "DELETE FROM filmoteka WHERE id = ' " . mysqli_real_escape_string($link, $_GET['id'] ) . "' LIMIT 1";

	mysqli_query($link, $query);

	if ( mysqli_affected_rows($link) > 0 ) {
	 	$resultInfo = "<p>Фильм был удален!</p>";
	 } 
}
	 //

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
		$query= "UPDATE  `filmoteka` SET
			title = '". mysqli_real_escape_string($link, $_POST['title']) ."', 
			genre = '". mysqli_real_escape_string($link, $_POST['genre']) ."', 
			year = '". mysqli_real_escape_string($link, $_POST['year']) ."' 
			WHERE id = ".mysqli_real_escape_string($link, $_GET['id'])." LIMIT 1";

			
			if(mysqli_query($link, $query)){
				$sucsessResult= "<p>Фильм был успешно изменен</p>";
			} else{
				$errorResult =  "<p>Что то пошло не так( Поробуйте  еще раз!</p>";
			}
		}	
	}

	// редактирование фильма

			$query="SELECT * FROM `filmoteka` WHERE id = ' " . mysqli_real_escape_string($link, $_GET['id'] ) . "' LIMIT 1";
			$films=array();
			$result = mysqli_query($link, $query);
			if($result=mysqli_query($link, $query)){
				$films=mysqli_fetch_array($result);	
			}
	     ?>
<!-- Разные миксины по одному, которые понадобятся. Для логотипа, бейджа, и т.д.-->
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<title>Редактирование фильмов</title>
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"/><![endif]-->
	<meta name="keywords" content="" />
	<meta name="description" content="" /><!-- build:cssVendor css/vendor.css -->
	<link rel="stylesheet" href="libs/normalize-css/normalize.css" />
	<link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css" />
	<link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css" /><!-- endbuild -->
	<!-- build:cssCustom css/main.css -->
	<link rel="stylesheet" href="./css/main.css" /><!-- endbuild -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
	<!--[if lt IE 9]><script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
</head>

<body class="index-page">
	<div class="container user-content section-page">
  
  
	  <?php if($sucsessResult !=''){?>
	  		<div class="notify--success notify"><?=$sucsessResult?></div>
	  <?php } ?>
	   <?php if($errorResult !=''){?>
	  		<div class="notify--error notify"><?=$errorResult?></div>
	  <?php } ?>
	  	<?php if ($resultInfo != '') { ?> 
		<div class="info-notification"><?=$resultInfo?></div>
	    <?php } ?>
		
		<div class="title-1">Фильм <?php echo($films['title']);?> </div>
		
		<div class="panel-holder mt-40 mb-20">
			<div class="title-3 mt-0">Редактировать фильм</div>
			<form action="edit.php?id=<?=$films['id']?>" method="POST">
			
				<?php 	
					if(!empty($errors)){
						foreach ($errors as $key=> $value){
							echo "	<div class='notify notify--error mb-20'>$value</div>";
						}
					}
				?>
				<div class="form-group"><label class="label  ">Название фильма<input class="input mt-10" name="title" type="text" placeholder="Такси 2" value="<?php echo($films['title']);?>"/></label></div>
				<div class="row">
					<div class="col">
						<div class="form-group"><label class="label">Жанр<input class="input mt-10" name="genre" type="text" placeholder="комедия" value="<?php  echo($films['genre'])?>"/></label></div>
					</div>
					<div class="col">
						<div class="form-group"><label class="label">Год<input class="input mt-10" name="year" type="text" placeholder="2000" value="<?php echo( $films['year'])?>"/></label></div>   
					</div>
				</div><input class="button" type="submit" name="updateFilm" value="Изменить информацию" />   
			</form>
		</div>
		<div class='ml20'><a href="index.php" class="button">Вернуться на главную </a></div>
	</div><!-- build:jsLibs js/libs.js -->
	<script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
	<!-- build:jsVendor js/vendor.js -->
	<script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIr67yxxPmnF-xb4JVokCVGgLbPtuqxiA"></script><!-- endbuild -->
	<!-- build:jsMain js/main.js -->
	<script src="js/main.js"></script><!-- endbuild -->
	<script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>

</html>