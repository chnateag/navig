<?php

function genererLigne($dir, $file){
	$entry = $dir . $file;
	if($file != '..' AND $file != '.'){
		
		echo '<div class="row hover bar">';
		echo '<div class="col-lg-1">'. filetype($entry) . '</div>';
		echo '<div class="col-lg-9">'.$file.' </div>';
		echo '<div class="col-lg-2"><a href="?value='.urlencode($entry).'"><input type="button" value="'.$dir . $file.'"/></a></div>';
		echo '</div>';
	}
        
}

function remonterDossier($dir){
	$entry = $dir;
	if($dir != "./"){
		$arbo = explode("/",$entry);
		// echo 'dir : '.$dir.'<br />';
		$nombreClé = count($arbo)-2; // moins un dossier pour remonter + 1 compté par le explode apres le dernier slash
		$i=0;
		$dossierSup = "";
		foreach($arbo as $key => $value){
			if($i < $nombreClé){ if($dossierSup == ""){ $dossierSup = $dossierSup.$value;} else { $dossierSup = $dossierSup."/".$value;}}
			$i++;
		}
		// echo 'dossierSup : '.$dossierSup.'<br/>';;
		// echo '<br />arbo : ';
		// foreach($arbo as $key => $part){ echo $part.';';}
		// echo '<br />';echo '<br />';
		echo '<div class="row hover">';
		echo '<div class="col-lg-1"></div>';
		echo '<div class="col-lg-9">Remonter</div>';
		echo '<div class="col-lg-2"><a href="?value='.urlencode($dossierSup).'"><input type="button" value="'.$dossierSup.'"/></a></div>';
		echo '</div>';
	}
        
}

?>