			<div class="title-3 mt-0">Укажите ваши данные</div>
			<form action="set-cookie.php" method="POST" enctype="multipart/form-data">
			
				<div class="form-group"><label class="label">Ваше имя<input class="input mt-10" name="user-name" type="text" placeholder="" /></label></div>
				<div class="form-group"><label class="label">Ваш город<input class="input mt-10" name="user-city" type="text" placeholder="" /></label></div>
				
				<input class="button" type="submit" name="user-submit" value="Coхранить" />
			</form>
			
			<form action="unset-cookie.php" method="POST" enctype="multipart/form-data" class='mt-20'>
				<input class="button" type="submit" name="user-unset" value="Удалить данные" />
			</form>
		</div>