<?php

function genererLigne($dir, $file){
	$entry = $dir . $file;
	if($file != '..' AND $file != '.'){
		
		echo '<tr>'."\n";
		// echo ."\n";
		echo '<td>',afficherIcone($entry),'<a href="?value='.urlencode($entry).'" class="tablelink">'.$file.'</a></td>'."\n";
		echo '<td><a href="?ln='.$dir . $file.'"><button type="button" class="tablebtn" style="">Synchro</button></a></td>'."\n";
		echo '</tr>'."\n\n";
	}
        
}
function remonterDossier($dir){
	$entry = $dir;
	if($dir != "dl/"){
		$arbo = explode("/",$entry);
		// echo 'dir : '.$dir.'<br />'."\n";
		$nombreClé = count($arbo)-2; // moins un dossier pour remonter + 1 compté par le explode apres le dernier slash
		$i=0;
		$dossierSup = "";
		foreach($arbo as $key => $value){
			if($i < $nombreClé){ if($dossierSup == ""){ $dossierSup = $dossierSup.$value;} else { $dossierSup = $dossierSup."/".$value;}}
			$i++;
		}
		// echo 'dossierSup : '.$dossierSup.'<br/>'."\n";;
		// echo '<br />arbo : '."\n";
		// foreach($arbo as $key => $part){ echo $part.'."\n";'."\n";}
		// echo '<br />'."\n";echo '<br />'."\n";
		echo '<tr>'."\n";
		// echo '<td></td>'."\n";
		echo '<td><img src="img/folder-parent.png" class="tableimg"/><a href="?value='.urlencode($dossierSup).'" class="tablelink">Remonter vers '.$dossierSup.'</a></td>'."\n";
		echo '<td></td>'."\n";
		echo '</tr>'."\n";
	}
        
}

function afficherIcone($entry){
	include('extension.php');
	if(is_dir($entry)){
		echo '<img src="img/folder.png" class="tableimg"/>';	// Afficher l'icone de dossier
	}
	else{
		$explodeExtension = explode(".",$entry);
		$nombreExplode = count($explodeExtension)-1;
		if(is_array($arrayExtension)){
			$find_ext=false;
			foreach($arrayExtension as $key => $ext){ // parcours des groupes d'extension 
					// echo '${$key} : Array | $key : '.$key.'<br />';
						// print_r(${$key});
				if(is_array(${$key})){
					foreach(${$key} as $type => $temp){ // parcours des extensions dans les array groupes (video = mkv, avi, mp4)
						
						if($temp == $explodeExtension[$nombreExplode]){
							echo '<img src="img/'.$arrayExtension[$key].'.png" class="tableimg"/>';
							$find_ext=true;
						}
						
					}
				}
				else{
					echo '$key vide';
				}
			}
			if(empty($find_ext)){
				echo '<img src="img/default.png" class="tableimg"';
			}
		}
		else{
			echo 'arrayExtension vide';
		}
		// if(isset($find_ext[$key])){
			// echo '<td><img src="img/default.png" style="width:16px;"/></td>'."\n";
		// }
	} 

}



function breadcrumb($arbo){
	$arrayArbo = explode("/",$arbo);
	$count = count($arrayArbo) -1;
	// echo $count;
	$dir = "";
	echo '<ol class="breadcrumb">';
	for($i = 0;$i < $count; $i++){
		if($dir == ""){
			$dir = $arrayArbo[$i];
		}
		else{
			$dir = $dir . "/" . $arrayArbo[$i];
		}
		echo '<li><a href="?value='.urlencode($dir).'"';
		if($i == $count-1) echo ' class="active"';
		echo '>'.$arrayArbo[$i].'</a></li>';
	}
	echo '</ol>'."\n";

}
?>