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
<f><h3 class="title"><center>			
<?php

echo ("<a href='gestemp.php?id=$id'>Gestion des employés</a>");?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php
echo ("<a href='geststagiaire.php?id=$id'>Gestion des stagiaires</a>");

?></f></h3></center>

<table>			
<?php
echo("<form name='p' action='ajstageb.php?id=$id' method='POST'"); 
?>
<tr><td>Nom: <font color=green>*</font></td><td><input type="text" name="t1"></td></tr>
<tr><td>Prénom: <font color=green>*</font></td><td><input type="text" name="t2"></td></tr>
<tr><td>Adresse: <font color=green>*</font></td><td><input type="text" name="t3"></td></tr>
<tr><td>Date de naissance: <font color=green>*</font></td><td>
<select name='jour'>
	<option value='1'>1</option>
	<option value='2'>2</option>   
	<option value='3'>3</option>
	<option value='4'>4</option>
	<option value='5'>5</option>
	<option value='6'>6</option>
	<option value='7'>7</option>
	<option value='8'>8</option>
	<option value='9'>9</option>
	<option value='10'>10</option>
	<option value='11'>11</option>
	<option value='12'>12</option>
	<option value='13'>13</option>
	<option value='14'>14</option>
	<option value='15'>15</option>
	<option value='16'>16</option>
	<option value='17'>17</option>
	<option value='18'>18</option>
	<option value='19'>19</option>
	<option value='20'>20</option>
	<option value='21'>21</option>
	<option value='22'>22</option>
	<option value='23'>23</option>
	<option value='24'>24</option>
	<option value='25'>25</option>
	<option value='26'>26</option>
	<option value='27'>27</option>
	<option value='28'>28</option>
	<option value='29'>29</option>
	<option value='30'>30</option>
	<option value='31'>31</option>
</select>

<select name='mois'>
	<option value='Janvier'>Janvier</option>
	<option value='Fevrier'>Février</option>
	<option value='Mars' >Mars</option>
	<option value='Avril'>Avril</option>
	<option value='Mai'  >Mai</option>
	<option value='Juin' >Juin</option>
	<option value='Juillet'>Juillet</option>
	<option value='Aout'  >Août</option>
	<option value='Septembre'>Septembre</option>
	<option value='Octobre'  >Octobre</option>
	<option value='Novembre' >Novembre</option>
	<option value='Decembre' >Décembre</option>

</select>

<select name='annee'>
<option value='1981' >1981</option>
<option value='1982' >1982</option>
<option value='1983' >1983</option>
<option value='1984' >1984</option>
<option value='1985' >1985</option>
<option value='1986' >1986</option>
<option value='1987' >1987</option>
<option value='1988' >1988</option>
<option value='1989' >1989</option>
<option value='1990' >1990</option>
<option value='1991' >1991</option>
<option value='1992' >1992</option>


</select></td></tr>
<tr><td>Lieu de naissance: <font color=green>*</font></td><td> <input type="text" name="t4"></td></tr>

<tr><td>Situation: <font color=green>*</font></td><td> 
<select name='situation'>

<option value='celibataire' >Célibataire</option>
<option value='fiance' >Fiancé(e)</option>
<option value='marie' >Marié(e)</option>
<option value='divorce'>Divorcé(e)</option>
</select>




</td></tr>
<tr><td>CIN: <font color=green>*</font></td><td><input type="text" name="t5" ></td></tr>
<tr><td>email: <font color=green>*</font></td><td><input type="text" name="t6"  ></td></tr>
<tr><td>téléphone mobile: <font color=green>*</font></td><td><input type="text" name="t7" >	fixe:<input type="text" name="t8" ></td></tr>
<tr><td>Sexe: <font color=green>*</font></td><td>
	
Homme  <INPUT type=radio name="sexe" value="M" >
Femme <INPUT type=radio name="sexe" value="F" > 
</td></tr>

<tr><td>Nom de l'institut / université: <font color=green>*</font></td><td> <input type="text" name="t10"></td></tr>
<tr><td>Sujet du PFE ou SFE:</td><td> <input type="text" name="t11" style="width:343px;"></td></tr>
<tr><td>Date début stage: <font color=green>*</font></td><td> <input type="text" name="t12"></td></tr>
<tr><td>Période du stage: <font color=green>*</font></td><td> <input type="text" name="t13"></td></tr>
<tr><td></td>         <td><br><input type=submit value="ajouter stagiaire"></td></tr>
</table>

</form>


  
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
<th><span class="linkcal"><a href="ajstage.php?id=<?php echo $id; ?>&month=<?php echo $monthnb - 1; ?>&year=<?php echo $year; ?>"><<</a></span></th>
<th colspan="5" class="headcal"><?php echo($month.' '.$year); ?></th>
<th><span class="linkcal"><a href="ajstage.php?id=<?php echo $id; ?>&month=<?php echo $monthnb + 1; ?>&year=<?php echo $year; ?>">>></a></span></th>
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