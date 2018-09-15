
<div class="title-1">Информация о фильме</div> 
	  <div class="card mb-20">
	  <div class="row">
	  	<div class="col-4">
	  		<img class='img-film' src="<?=HOST?>data/films/full/<?=$film['photo']?>" alt="<?php echo $film['title']?>">
	  	</div>
	  	<div class="col">
			<div class="card__header">
				<h4 class="title-4"><?php echo $film['title']?></h4>
				<div><a href="edit.php?id=<?=$film['id']?>" class="button button--edit">Редактировать</a>
				<a href="index.php?action=delete&id=<?=$film['id']?>" class="button button--delete">Удалить</a></div>	
			</div>

			<div class="badge"><?php echo $film['genre']?></div>
			<div class="badge"><?php echo $film['year']?></div>
			<div class="user-content">
				<p><?php echo $film['description']?></p>
			</div>
	  	</div>
	  </div>
	
	<!--	<div class='mt-20'><a href="single.php?id=<?=$films[$key]['id']?>" class='button'>Подробнее</a></div>-->

</div>
		