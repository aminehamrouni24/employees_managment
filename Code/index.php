﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Republic  
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20090910

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title> Gestion des Employes</title>

<link rel="shortcut icon" href="images/cert.jpg">
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header"> 

		<div id	="logo">
			<p><font size="8"><b><i></i></b></font>
				 Gestion des Employés</p> 
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="index.php">Connexion</a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="content">
<!--  DEBUT milieu -->
			<div class="post">
				<h2 class="title"><f>Bienvenue   </f></h2>
		         

Veuillez vous connecter:
<form name="f" action="verm.php" method="POST">&nbsp
<table>

<tr><td>Nom d'utilisateur: </td><td><input type="text" name="t1" /></td></tr>
<tr><td>Mot de passe: </td><td><input type="password" name="t2" /></td></tr>
<tr><td></td><td><input type="submit" value="Connexion"></td></tr></table>

</form>
<br><br><br>

  
				<div style="clear: both;">&nbsp;</div>
				<div class="entry">
				
				</div>
			</div>
<!--  FIN milieu -->
			
		<div style="clear: both;">&nbsp;</div>
		</div>
		
		<div id="sidebar">
			<ul>
				<li>
					<div>
					<form method="get" action="#">
<!--  DEBUT droite-->			<div id="search"> 
		<?php
//Creating general vars
$year = date("Y");
if(!isset($_GET['month'])) $monthnb = date("n");
else {
$monthnb = $_GET['month'];
$year = $_GET['year'];
if($monthnb <= 0) {
$monthnb = 12;
$year = $year - 1;
}
elseif($monthnb > 12) {
$monthnb = 1;
$year = $year + 1;
}
}
$day = date("w");
$nbdays = date("t", mktime(0,0,0,$monthnb,1,$year));
$firstday = date("w",mktime(0,0,0,$monthnb,1,$year));

//Replace the number of the day by its french name
$daytab[1] = 'Lu';
$daytab[2] = 'Ma';
$daytab[3] = 'Me';
$daytab[4] = 'Je';
$daytab[5] = 'Ve';
$daytab[6] = 'Sa';
$daytab[7] = 'Di';

//Build the calendar table
$calendar = array();
$z = (int)$firstday;
if($z == 0) $z =7;
for($i = 1; $i <= ($nbdays/5); $i++){
for($j = 1; $j <= 7 && $j-$z+1+(($i*7)-7) <= $nbdays; $j++){
if($j < $z && ($j-$z+1+(($i*7)-7)) <= 0){
$calendar[$i][$j] = null;
}
else {
$calendar[$i][$j] = $j-$z+1+(($i*7)-7);
}
}
}

//Replace the number of the month by its french name
switch($monthnb) {
case 1: $month = 'Janvier'; break;
case 2: $month = 'Février'; break;
case 3: $month = 'Mars'; break;
case 4: $month = 'Avril'; break;
case 5: $month = 'Mai'; break;
case 6: $month = 'Juin'; break;
case 7: $month = 'Juillet'; break;
case 8: $month = 'Août'; break;
case 9: $month = 'Septembre'; break;
case 10: $month = 'Octobre'; break;
case 11: $month = 'Novembre'; break;
case 12: $month = 'Décembre'; break;
}
?>			
<div id="calendrier">
<table>
<tr>
<th><span class="linkcal"><a href="index.php?month=<?php echo $monthnb - 1; ?>&year=<?php echo $year; ?>"><<</a></span></th>
<th colspan="5" class="headcal"><?php echo($month.' '.$year); ?></th>
<th><span class="linkcal"><a href="index.php?month=<?php echo $monthnb + 1; ?>&year=<?php echo $year; ?>">>></a></span></th>
</tr>
<?php
echo('<tr>');
for($i = 1; $i <= 7; $i++){
echo('<th>'.$daytab[$i].'</th>');
}
echo('</tr>');
for($i = 1; $i <= count($calendar); $i++) {
echo('<tr>');
for($j = 1; $j <= 7 && $j-$z+1+(($i*7)-7) <= $nbdays; $j++){
if($j-$z+1+(($i*7)-7) == date("j") && $monthnb == date("n") && $year == date("Y")) echo('<th class="current" bgcolor="#F7F2B2">'.$calendar[$i][$j].'</th>');
else echo('<th>'.$calendar[$i][$j].'</th>');
}
echo('</tr>');
}
?>
</table>











<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

</div>
</div>
<!--  FIN droite 			</div>  -->
					</form>
					</div>
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	</div>
	</div>
	<!-- end #page -->
</div>
	<div id="footer">

	</div>
	<!-- end #footer -->
</body>
</html>