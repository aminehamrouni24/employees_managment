<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
		<div id="logo">
			<p><font size="8"><b><i><a href="">   </a></i></b></font>
				 Gestion des Employés</p> 
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
	<?php $res=mysql_connect('localhost','root',''); $res2=mysql_select_db('gestemploye'); $id=$_GET['id']; $req = "select nom  FROM employe WHERE id  = '$id'"; $res=mysql_query ($req); $nom = mysql_fetch_array($res);   ?>
		<ul>
		
			<li><?php echo ("<a href='informations.php?id=$id'>Mes informations</a>"); ?> </li>
			<li>
			<?php 
				
					$id=$_GET['id'];
					$ntable='tache'.$id;

													$rid = "SELECT MAX(id) FROM $ntable ;"; 
													$chi = mysql_query($rid);
													$ra = mysql_fetch_array($chi);
		
													$roo = "SELECT date FROM $ntable where id='$ra[0]';"; 
													$rooo = mysql_query($roo);
													$rs = mysql_fetch_array($rooo);
													
													if($rs[0]=='1980-10-10')
													{
													echo ("<a href='taches.php?id=$id'>Mes tâches<br><font color='red'>vous avez des tâches</font> </a>"); 												
													}
													else
													{
													echo ("<a href='taches.php?id=$id'>Mes tâches </a>"); 
													}
			?>
			
			
			
			</li>
		
			<li><?php
				$id=$_GET['id'];
													$ntable='msg'.$id;

													$ridd = "SELECT MAX(id) FROM $ntable ;"; 
													$chid = mysql_query($ridd);
													$rap = mysql_fetch_array($chid);
		
													$rool = "SELECT date FROM $ntable where id='$rap[0]';"; 
													$roool = mysql_query($rool);
													$rsd = mysql_fetch_array($roool);
			
													if($rsd[0]=='1980-10-10')
													{
													echo ("<a href='messagerie.php?id=$id'>Messagerie <br><font color='red'>vous avez des messages</font> </a>"); 												
													}
													else
													{
													echo ("<a href='messagerie.php?id=$id'>Messagerie </a>"); 
													}			
			?></li>
			<li><?php echo ("<a href='actualite.php?id=$id'>Actualité</a>"); ?></li>
			<li><?php echo ("<a href='statistiques.php?id=$id'>Statistiques</a>"); ?></li>
			<li><a href="index.php">Déconnexion   </a><?php echo("<center><font color='green'> Bonjour, $nom[0]</font>");  ?></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="content">
<!--  DEBUT milieu -->
			<div class="post">

<f><h3 class="title"><center>			
<?php

echo ("<a href='afemp.php?id=$id'>Afficher les employés</a>");?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php
echo ("<a href='afstage.php?id=$id'>Afficher les stagiaires</a>");

?></f></h3></center>





			
<?php
$resss=mysql_query ("select nom from photocv");
$remp=mysql_query ("select id, nom, prenom, depart, fonction from employe");
echo("<table>");
 while($ligne = mysql_fetch_array($remp)){
 $rep=mysql_query ("select nom from photocv where idemp='$ligne[0]'");
	
	$repcv=mysql_fetch_array($rep);
	if($repcv[0]=='')
	{
	echo("<tr><td><img src='imagescv/nop.jpg' width=105 height=120></td>");	
	echo("<td>$ligne[1] $ligne[2] <br>DEPARTEMENT: $ligne[3]<br>FONCTION: $ligne[4] </td>");	
							if($id==1)
							{
							echo("<td><a href='cv.php?id=$ligne[0]'>Générer CV</a> </td>");	
							
							}
	
	
	echo("</tr>");
	}
	else{
	echo("<tr><td><img src='imagescv/$repcv[0]' width=105 height=120></td>");	
	echo("<td>$ligne[1] $ligne[2] <br>DEPARTEMENT: $ligne[3]<br>FONCTION: $ligne[4] </td>");	
										if($id==1)
							{
							echo("<td><a href='cv.php?id=$ligne[0]'>Générer CV</a> </td>");	
							
							}
										
										
										
	
	echo("</tr>");
	}
	
 



}
echo("</table>");
?>
  
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
<th><span class="linkcal"><a href="afemp.php?id=<?php echo $id; ?>&month=<?php echo $monthnb - 1; ?>&year=<?php echo $year; ?>"><<</a></span></th>
<th colspan="5" class="headcal"><?php echo($month.' '.$year); ?></th>
<th><span class="linkcal"><a href="afemp.php?id=<?php echo $id; ?>&month=<?php echo $monthnb + 1; ?>&year=<?php echo $year; ?>">>></a></span></th>
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


&nbsp
<ul><center><?php if ($id==1){echo("<li><a href='personnel.php?id=$id'>Gestion du personnel</a></li>"); }?><br>
<?php echo("<li><a href='afperso.php?id=$id'>Afficher tout le personnel</a></li>"); ?>
</center>
</ul>







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