
<h1>Добавить новый фильм</h1>
	<div class="panel-holder mt-30 mb-40">
			<div class="title-3 mt-0">Добавить фильм</div>
			<form action="new.php" method="POST" enctype="multipart/form-data">
			
				<?php 	
					if(!empty($errors)){
						foreach ($errors as $key => $value){
							echo "	<div class='notify notify--error mb-20'>$value</div>";
						}
					}
				?>
				
				<div class="form-group"><label class="label">Название фильма<input class="input mt-10" name="title" type="text" placeholder="Такси 2" /></label></div>
				<div class="row">   
					<div class="col">
						<div class="form-group"><label class="label">Жанр<input class="input mt-10" name="genre" type="text" placeholder="комедия" /></label></div>
					</div>
					<div class="col">
						<div class="form-group"><label class="label">Год<input class="input mt-10" name="year" type="text" placeholder="2000" /></label></div>
					</div>
				</div>					
				<div class="form-group"><label class="label">Описание фильма<textarea class="input mt-10 textarea" name="description" t placeholder="Введите описание фильма"></textarea></label></div>
				<div class="mb-20"><input type="file" name='photo'></div>
					
				<input class="button" type="submit" name="newFilm" value="Добавить" />
			</form>
		</div>
	</div><!-- build:jsLibs js/libs.js -->