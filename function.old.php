<?php

function genererLigne($dir, $file){
	$entry = $dir . $file;
	if($file != '..' AND $file != '.'){
		echo '<tr>';
		echo '<td class="libelle">'.$file.' </td>';
		echo '<td class="libelle">'. filetype($entry) . '</td>';
		echo '<td class="libelle"><a href="?value='.urlencode($entry).'"><input type="button" value="'.$dir . $file.'"/></a></td>';
		echo '</tr>';
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
		echo '<tr>';
		echo '<td class="libelle">Remonter</td>';
		echo '<td class="libelle"></td>';
		echo '<td class="libelle"><a href="?value='.urlencode($dossierSup).'"><input type="button" value="'.$dossierSup.'"/></a></td>';
		echo '</tr>';
	}
        
}

?>