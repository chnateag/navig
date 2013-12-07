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


<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Gestion Download</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
      <!--<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
          <li class="divider"></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>-->
    </ul>
    <!--<form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>-->
    <!--<ul class="nav navbar-nav navbar-right">
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
    </ul>-->
  </div><!-- /.navbar-collapse -->
</nav>

<div style="margin-top:60px;"></div> <!-- header de 46 px -->

<?php
include('function.inc.php');


if(isset($_GET['value'])){ 
	$dir = urldecode($_GET['value']);
	if (is_dir($dir)){
		$dir = $dir."/";
	}
	// echo $dir;
}
else{
	$dir = "dl/";
	// $dir = ".";
}


breadcrumb($dir);


echo '<br /><br />'."\n";

echo '<table class="table table-hover table-condensed table-striped">'."\n";
echo '<tbody>'."\n";
echo '<thead>'."\n";
echo '<tr>'."\n";
// echo '<th>type</th>'."\n";
echo '<th>nom</th>'."\n";
echo '<th><span style="float:right;">synchro</span></th>'."\n";
echo '</tr>'."\n";
echo '</thead>'."\n";
$i = 0;
// Ouvre un dossier bien connu, et liste tous les fichiers
if (is_dir($dir)){
	
	remonterDossier($dir);
	
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			genererLigne($dir, $file);
			$arrayContent[$i][0] = $dir; // on teste de tout rentrer dans un array pour trier comme on veut
			$arrayContent[$i][1] = $file;
			$i++;
	   }
        closedir($dh);
    }
}
echo '</tbody>'."\n";
echo '</table>'."\n";

echo '<br />';
echo '<br />';
echo '<br />';

echo '<pre>';
echo print_r($arrayContent);
echo '</pre>';
echo 'test';
?>
</div>
</body>
</html>