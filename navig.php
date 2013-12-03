<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Gestion Download</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<!--<link href="css/style.css" rel="stylesheet">-->

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<div class="container">

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

echo '<table class="table table-hover table-condensed table-striped">';
echo '<tbody>';
echo '<thead>';
echo '<tr>';
echo '<th>type</th>';
echo '<th>nom</th>';
echo '<th>synchro</th>';
echo '</tr>';
echo '</thead>';
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
echo '</tbody>';
echo '</table>';
?>
</div>
</body>
</html>