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
			<li></li>
			<li><?php echo ("<a href='informations.php?id=$id'>Mes informations</a>"); ?> </li>
			
			<li class="current_page_item">
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
													echo ("<a href='taches.php?id=$id'>Mes tâches<br><font color='#808000'>vous avez des tâches</font> </a>"); 												
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
			<div class="post"><center>
<h3 class="title"><f><?php 

$id=$_GET['id'];
$ntable='tache'.$id;

$ridd = "SELECT MAX(id) FROM $ntable ;"; 
		$chid = mysql_query($ridd);
		$rap = mysql_fetch_array($chid);
		
		$rool = "SELECT date FROM $ntable where id='$rap[0]';"; 
		$roool = mysql_query($rool);
		$rsd = mysql_fetch_array($roool);
			
			if($rsd[0]=='1980-10-10')
			{
			echo ("<a href='aftaches.php?id=$id'><font color=red>Voir mes tâches</font></a>"); 
			
		    
			}
			else
			{
			echo ("<a href='aftaches.php?id=$id'>Voir mes tâches</a>"); 
			}


?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<?php echo ("<a href='envtaches.php?id=$id'>Envoyer ou rendre une tâche</a>"); ?>  
					</f></h3></center>
<br>


<?php 
$id=$_GET['id'];
$extensions = array('.png', '.gif', '.jpg', '.jpeg','.mp4','.mp3','.flv','.avi','.mp2','.jpeg','.docx','.pdf','.doc','.txt','.xls','.pptx','.exe','.zip','.rar','.php','.html','.htm','.css','.sql','.ppt','.dat','.rtf');
$extension = strrchr($_FILES['avatar']['name'], '.');
$dossier = 'taches/'; 
$com=nl2br(htmlentities($_POST['t1']));
$fichier = basename($_FILES['avatar']['name']);
$t2=$_POST['t2'];
$iddest=$_POST['nomdest'];
$type=$_POST['type'];

$reqnp="SELECT nom, prenom FROM employe where id='$id'";
$lig = mysql_query($reqnp);
$ligg = mysql_fetch_array($lig);
$np=$ligg[0].' '.$ligg[1];
$ntable='tache'.$iddest;
$r="SELECT nom, prenom FROM employe where id='$iddest'";
$l = mysql_query($r);
$ndest = mysql_fetch_array($l);






if(($iddest==0)||($type==0))
{
echo("<font color=red>Erreur dans la sélection du destinataire ou du type </font>");
}    
else
	{
	if($type==1){$type="A faire";}
if($type==2){$type="Travail achevé";}
	
	
	$re="INSERT INTO $ntable values (NULL,'$id','1980/10/10',date('d-m-Y H:i:s'),'$np','$com','$t2','$fichier','$type')";
		mysql_query($re);
		if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		{
		echo("<font color=green>Tâche envoyé au destinataire $ndest[0] $ndest[1]</font>");
		}
		else
			{
			echo("<font color=green>Tâche envoyé au destinataire $ndest[0] $ndest[1] <br> NB: Aucun fichier envoyé</font>");
			}
		
		
		
	}



 ?>

			
			
			

		         


<br><br><br>
<br><br><br><br><br><br><br><br><br>
<br>
  
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
<th><span class="linkcal"><a href='#'><<</a></span></th>
<th colspan="5" class="headcal"><?php echo($month.' '.$year); ?></th>
<th><span class="linkcal"><a href='#'>>></a></span></th>
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