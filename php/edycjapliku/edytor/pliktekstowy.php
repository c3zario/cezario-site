<?php

$wiersz = file("../tekst.txt");


$l = 1;
		for($i = 0;$i<count($wiersz);$i++)
		{
			echo '<mark>'.$l.'</mark>'."."." ".$wiersz[$i]."<br>";
			$l++;
		}

		$z = count($wiersz);
		if($z > 0)
		echo 'Wybierz wiersz, który chcesz usunąć: 1 - '.count($wiersz);
		else echo 'plik jest pusty';

if(count($_POST)>0){
	ob_clean();


	$nr = $_POST['nr_wiersza'];
	
	if(is_numeric($nr)){
		$a = 1;
		$nr = $nr - $a;
		
		

		$nowy = [];
		for($i = 0;$i<count($wiersz);$i++)
			{
				if($i != $nr)
				{
					array_push($nowy, $wiersz[$i]);
				}
			}
			
		$l = 1;
		for($i = 0;$i<count($nowy);$i++)
		{
			echo '<mark>'.$l.'</mark>'."."." ".$nowy[$i]."<br>";
			$l++;
		}

		$z = count($nowy);
		if($z > 0)
		echo 'Wybierz wiersz, który chcesz usunąć: 1 - '.count($nowy);
		else echo 'plik jest pusty';

		file_put_contents("../tekst.txt", $nowy);
	} else {
			$l = 1;
			for($i = 0;$i<count($wiersz);$i++)
			{
				echo '<mark>'.$l.'</mark>'."."." ".$wiersz[$i]."<br>";
				$l++;
			}
			
			echo '<span>'.'Podana wartość nie jest liczbą!'.'</span>'.'<br>';
			$z = count($wiersz);
			if($z > 0)
			echo 'Wybierz wiersz, który chcesz usunąć: 1 - '.count($wiersz);
			else echo 'plik jest pusty';
		}
}
?>
<style>
	mark
	{
		font-weight: bold;
	}
	
	span
	{
		color: red;
	}
</style>

<form action="" method="post">
	<input type="text" name="nr_wiersza" values="Wytnij">
	<input type="submit">
</form>

<a href="../tekst.php">stwórz plik od nowa</a>
