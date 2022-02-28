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
			<p><font size="8"><b><i></i></b></font>
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
<h3 class="title"><center>			
<?php

echo ("<a href='gestemp.php?id=$id'>Gestion des employés</a>");?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php
echo ("<a href='geststagiaire.php?id=$id'>Gestion des stagiaires</a>");

?> </h3></center>

			<?php

$id=$_GET['id'];
$ne=$_POST['t1'];
$pe=$_POST['t2'];

if(($ne!='')&&($pe!=''))
{
	$re="INSERT INTO employe values (NULL,'$ne','$ne','$ne','$pe','','','','','','','','','','','','','','','','','','','','','','','','')";
	if(mysql_query($re))
	{
	$ridd = "SELECT MAX(id) FROM employe ;"; 
		$chid = mysql_query($ridd);
		$rap = mysql_fetch_array($chid);
		$ntm='msg'.$rap[0];
		$ntt='tache'.$rap[0];
	
	
		
$con = mysql_connect('localhost','root','');		
mysql_select_db('gestemploye',$con);

$sql = "CREATE TABLE $ntm
(
id int(255) PRIMARY KEY auto_increment,

idexp int(255),
date date,
heure timestamp,
nom varchar(1000),
msg varchar(1000)
)";
if(mysql_query($sql))
{

		
$con = mysql_connect('localhost','root','');		
mysql_select_db('gestemploye',$con);

$sqll = "CREATE TABLE $ntt
(
id int(255) PRIMARY KEY auto_increment,

idexp int(255),
date date,
heure timestamp,
nom varchar(1000),
com varchar(1000),
dfin varchar(1000),
fich varchar(1000),
type varchar(1000)
)";
if(mysql_query($sqll))
	$reqnp="SELECT nom, prenom FROM employe where id='$rap[0]'";
$lig = mysql_query($reqnp);
$ligg = mysql_fetch_array($lig);
$np=$ligg[0].' '.$ligg[1];
	$text='Un employé a été ajouté sous le nom de '.$np;
	$re="INSERT INTO actualite values (NULL,'$id',CURRENT_DATE,date('d-m-Y H:i:s'),'Administrateur','$text','')";
		mysql_query($re);
		$reqajp="INSERT INTO photocv values (NULL,'$rap[0]','')";
																	mysql_query ($reqajp);											
		
		
		
	echo("Un employé a été ajouté. <br><br> Nom d'utilisateur: <font color=green>$ne</font> <br> Mot de passe: <font color=green>$ne</font>");
	
}	
	
	
	}
	
	



		

}
else
{
echo("<font color=red>Erreur champ(s) vide(s)</font>");
}

			

?>		         


<br><br><br><br><br><br><br><br><br><br><br><br><br>

  
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
<th><span class="linkcal"><a href="#"><<</a></span></th>
<th colspan="5" class="headcal"><?php echo($month.' '.$year); ?></th>
<th><span class="linkcal"><a href="#">>></a></span></th>
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