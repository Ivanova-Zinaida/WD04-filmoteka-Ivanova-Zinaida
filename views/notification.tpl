
    <?php if( $sucsessResult!=''){
		echo "<div class='notify--success notify'> $sucsessResult</div>";
	 }
	 ?>
	 
    <?php if( $errorResult!=''){
		echo "<div class='notify--error notify'> $errorResult</div>";
	 }
	 ?>
	 	 
    <?php if( $resultInfo!=''){
		echo "<div class='info-notification'> $resultInfo</div>";
	 }
	 ?>
	