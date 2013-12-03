<link rel="stylesheet" type="text/css" href="style.css"/>

<?php
include('function.php');


if(isset($_GET['value'])){ 
	$dir = urldecode($_GET['value']);
	if (is_dir($dir)){
		$dir = $dir."/";
	}
	echo $dir;
}
else{
	$dir = "./";
	// $dir = ".";
}

echo '<br /><br />';

echo '<table style="border: 1px solid black;">';
echo '<tr><th class="libelle centpx">nom</th><th class="libelle centpx">type</th><th class="libelle centpx">ouvrir</th></tr>';
// Ouvre un dossier bien connu, et liste tous les fichiers
if (is_dir($dir)){
	
	remonterDossier($dir);
	
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			genererLigne($dir, $file);
	   }
        closedir($dh);
    }
}
echo '</table>';
?>