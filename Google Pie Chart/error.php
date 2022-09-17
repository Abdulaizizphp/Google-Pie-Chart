
<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
	<div class="alert">
  <span class="closebtn">&times;</span>  
  <strong><img src="icons8-error-24.png"></strong> <br/><?php echo $error ?>
</div>
  	  <p></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>