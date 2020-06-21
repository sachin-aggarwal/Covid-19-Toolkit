<?php 

if(count($errors)>0):?>

<div>
<h1>ERROR HAS OCCOURED:</h1>
<?php foreach($errors as $error):?>
<p><?php echo $error ?></p>
<?php endforeach ?>
</div>

<input type="button" onclick="location.href='sample.php';" value="Go to Home Page" />

<?php endif ?> 