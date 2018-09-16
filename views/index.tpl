
<div class="title-1">Фильмотека</div>

<?php foreach($films as $key => $value){ ?>
	    
	  <div class="card mb-20">
	  	<div class="row">
	  		<?php if ( $films[$key]['photo'] != '') { ?>
	  		<div class="col-auto">
	  			<img height='auto' class='img-film' src="<?=HOST?>data/films/min/<?=$films[$key]['photo']?>" alt="<?php echo $films[$key]['title']?>">
	  		</div>
	  		<?php } ?>
	  		<div class="col">	
	  			<div class="card__header">
					<h4 class="title-4"><?php echo $films[$key]['title']?></h4>
					<div>
					
						<?php  
						if ( isset($_SESSION['user']) ) {
							if ( $_SESSION['user'] == 'admin' ) { 
					?>
							<a href="edit.php?id=<?=$films[$key]['id']?>" class="button button--edit">Редактировать</a>
					
							<a href="?action=delete&id=<?=$films[$key]['id']?>" class="button button--delete">Удалить</a>
							
					<?php  
							} 
						}
					?>
					</div>	
				</div>
			
				<div class="badge"><?php echo $films[$key]['genre']?></div>
				<div class="badge"><?php echo $films[$key]['year']?></div>
				<div class='mt-20'><a href="single.php?id=<?=$films[$key]['id']?>" class='button'>Подробнее</a></div></div>
	  	</div>
	

	</div>
		
<?php } ?>
