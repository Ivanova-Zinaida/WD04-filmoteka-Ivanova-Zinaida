<?php
// Getting all films from bd
	function films_all($link){
		/*$link=mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);*/
		$query="SELECT * FROM filmoteka";
		$films=array();
		$result=mysqli_query($link, $query);
		if($result=mysqli_query($link, $query)){
			while($row=mysqli_fetch_array($result)){
			$films[]=$row;
			}
		}
		return $films;
	}

	function add_film($link, $title, $genre, $year, $description){
			if(isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] !=''){
			$fileName= $_FILES["photo"]["name"];
			$fileTmpLoc=$_FILES["photo"]["tmp_name"];
			$fileType=$_FILES["photo"]["type"];
			$fileSize=$_FILES["photo"]["size"];
			$fileErrorMsg=$_FILES["photo"]["error"];
			$kaboom=explode('.', $fileName);
			$fileExt=end($kaboom);
			
			list($width, $height)=getimagesize($fileTmpLoc);
			if($width<10||$height <10){
				$errors[]="That image has no dimensions";
			}
			$db_file_name = rand(10000000, 99999999). "." .$fileExt;
			if($fileSize > 10485760) {
			$errors[] = 'Your image file was larger than 10mb';
			} else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileName) ) {
				$errors[] = 'Your image file was not jpg, jpeg, gif or png type';
			} else if ($fileErrorMsg == 1) {
				$errors[] = 'An unknown error occurred';
			}
			$photoFolderLocation = ROOT . 'data/films/full/';
			$photoFolderLocationMin = ROOT . 'data/films/min/';
			$uploadfile = $photoFolderLocation . $db_file_name;
			$moveResult = move_uploaded_file($fileTmpLoc, $uploadfile);

			if ($moveResult != true) {
				$errors[] = 'File upload failed';
			}

			require_once( ROOT . "/functions/image_resize_imagick.php");
			$target_file =  $photoFolderLocation . $db_file_name;
			$resized_file = $photoFolderLocationMin . $db_file_name;
			$wmax = 137;
			$hmax = 200;
			$img = createThumbnail($target_file, $wmax, $hmax);
			$img->writeImage($resized_file);
			
			}
		$query= "INSERT INTO `filmoteka`(`title`, `genre`, `year`, `description`, `photo`) VALUES(
		'".mysqli_real_escape_string($link, $title)."',
		'".mysqli_real_escape_string($link, $genre)."',
		'".mysqli_real_escape_string($link, $year)."',
		'".mysqli_real_escape_string($link, $description)."',
		'".mysqli_real_escape_string($link, $db_file_name) ."'
		
		)";
		
	
		if(mysqli_query($link, $query)){
			$result=true;
		}else{
			$result=false;
		}
		return $result;	
	}
	
// редактирование фильма
   function get_film($link, $id){
	   $query="SELECT * FROM `filmoteka` WHERE id = ' " . mysqli_real_escape_string($link, $id ) . "' LIMIT 1";
			$films=array();
			$result = mysqli_query($link, $query);
			if($result=mysqli_query($link, $query)){
				$films=mysqli_fetch_array($result);	
			}
	   return $films;
   }

	function film_update($link, $title, $genre, $year, $description, $id){
		if(isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] !=''){
			$fileName= $_FILES["photo"]["name"];
			$fileTmpLoc=$_FILES["photo"]["tmp_name"];
			$fileType=$_FILES["photo"]["type"];
			$fileSize=$_FILES["photo"]["size"];
			$fileErrorMsg=$_FILES["photo"]["error"];
			$kaboom=explode('.', $fileName);
			$fileExt=end($kaboom);
			
			list($width, $height)=getimagesize($fileTmpLoc);
			if($width<10||$height <10){
				$errors[]="That image has no dimensions";
			}
			$db_file_name = rand(10000000, 99999999). "." .$fileExt;
			if($fileSize > 10485760) {
			$errors[] = 'Your image file was larger than 10mb';
			} else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileName) ) {
				$errors[] = 'Your image file was not jpg, jpeg, gif or png type';
			} else if ($fileErrorMsg == 1) {
				$errors[] = 'An unknown error occurred';
			}
			$photoFolderLocation = ROOT . 'data/films/full/';
			$photoFolderLocationMin = ROOT . 'data/films/min/';
			$uploadfile = $photoFolderLocation . $db_file_name;
			$moveResult = move_uploaded_file($fileTmpLoc, $uploadfile);

			if ($moveResult != true) {
				$errors[] = 'File upload failed';
			}

			require_once( ROOT . "/functions/image_resize_imagick.php");
			$target_file =  $photoFolderLocation . $db_file_name;
			$resized_file = $photoFolderLocationMin . $db_file_name;
			$wmax = 137;
			$hmax = 200;
			$img = createThumbnail($target_file, $wmax, $hmax);
			$img->writeImage($resized_file);
			
			}
		
		$query= "UPDATE  `filmoteka` SET
		title = '". mysqli_real_escape_string($link, $title) ."', 
		genre = '". mysqli_real_escape_string($link, $genre) ."', 
		year = '". mysqli_real_escape_string($link, $year) ."' ,
		description = '". mysqli_real_escape_string($link, $description) ."',
		photo = '". mysqli_real_escape_string($link, $db_file_name) ."' 
		WHERE id = ".mysqli_real_escape_string($link, $id)." LIMIT 1";
		
		if(mysqli_query($link, $query)){
			$result=true;
		} else{
			$result = false;
			}
		return $result;
	}

// delete films
	function delete_film($link, $id ){
		$query = "DELETE FROM filmoteka WHERE id = ' " . mysqli_real_escape_string($link, $id) . "' LIMIT 1";
		mysqli_query($link, $query);
		if ( mysqli_affected_rows($link) > 0 ) {
		$result=true;
		} else{
			$result=true;
		}
		return $result;
	}

?>