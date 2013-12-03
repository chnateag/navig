<?php

function genererLigne($dir, $file){
	$entry = $dir . $file;
	if($file != '..' AND $file != '.'){
		
		echo '<tr>';
		echo '<td>'. filetype($entry) . '</td>';
		echo '<td><a href="?value='.urlencode($entry).'" class="tablelink">'.$file.'</a></td>';
		echo '<td><a href="?ln='.$dir . $file.'"><button type="button" class="tablebtn" style="">Synchro</button></a></td>';
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
		echo '<td></td>';
		echo '<td><a href="?value='.urlencode($dossierSup).'">Remonter vers '.$dossierSup.'</a></td>';
		echo '<td></td>';
		echo '</tr>';
	}
        
}

?>