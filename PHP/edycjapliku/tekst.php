<?php
	if(count($_POST)>0){
		file_put_contents("tekst.txt", $_POST['textarea']);
		echo '<a href="edytor/pliktekstowy.php">usuń wiersze</a>';
	}
	else echo 'wprowadź dane';
?>

<form action="" method="post">
	<textarea name="textarea"></textarea>
	<input type="submit">
</form>