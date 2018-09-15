
<div class="title-1">Фильм <?php echo($films['title']);?> </div>
		
		<div class="panel-holder mt-40 mb-20">
			<div class="title-3 mt-0">Редактировать фильм</div>
			<form action="edit.php?id=<?=$films['id']?>" method="POST" enctype="multipart/form-data">
			
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
					
				</div>
				<div class="form-group"><label class="label">Описание фильма<textarea class="input mt-10 textarea" name="description"  placeholder="Введите описание фильма"><?php echo( $films['description'])?></textarea></label></div>
				<div class="mb-20"><input type="file" name='photo'></div>
				<input class="button" type="submit" name="updateFilm" value="Изменить информацию" />   
			</form>
		</div>