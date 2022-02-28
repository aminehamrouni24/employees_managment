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
			<h3 class="title"><f><?php echo ("<a href='cv.php?id=$id'>Générer mon CV </a>"); ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp
					<?php echo ("<a href='formulaire.php?id=$id'>Modifier mes informations</a>"); ?>  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<?php echo ("<a href='mdp.php?id=$id'>Modifier mon mot de passe </a>"); ?></f></h3><br>
<?php
$res=mysql_connect('localhost','root','');
$res2=mysql_select_db('gestemploye');
$id=$_GET['id'];
$t1=$_POST['t1'];
$t2=$_POST['t2'];
$t3=$_POST['t3'];
$jour=$_POST['jour'];
$mois=$_POST['mois'];
$annee=$_POST['annee'];
$t4=$_POST['t4'];
$t5=$_POST['t5'];
$t6=$_POST['t6'];
$t7=$_POST['t7'];
$t8=$_POST['t8'];


 

//$sexe=$_POST['sexe'];


$t9=$_POST['t9'];
$t10=$_POST['t10'];
$t11=$_POST['t11'];
$t12=$_POST['t12'];
$t13=$_POST['t13'];
$t14=$_POST['t14'];
$t15=$_POST['t15'];
$t16=$_POST['t16'];
$t17=$_POST['t17'];
$t18=$_POST['t18'];
$t19=$_POST['t19'];
$moisemb=$_POST['moisemb'];
$anneeemb=$_POST['anneeemb'];
$ppp=strlen($t5);

if($t1!="")
{	if($t2!="")
	{	if($t3!="")
		{	if($t4!="")
			{	if(($t5!="")&&($ppp==8))
				{	if($t6!="")
					{	if($t7!="")
						{	if($t11!="")						
							{	if($t12!="")
								{	if($t17!="")
									{	if($t18!="")
										{	if($t19!="")
											{	if(ISSET($_POST['sexe']))
												{$sexe=$_POST['sexe'];
													$langages="";
													if(isset($_POST['ch1'])){$langages=$_POST['ch1'];}													
													if(isset($_POST['ch2'])){$langages=$langages.' ' .$_POST['ch2'];}
													if(isset($_POST['ch3'])){$langages=$langages.' ' .$_POST['ch3'];}
													if(isset($_POST['ch4'])){$langages=$langages.' ' .$_POST['ch4'];}
													if(isset($_POST['ch5'])){$langages=$langages.' ' .$_POST['ch5'];}
													if($t15!=""){$langages=$langages.' ' .$t15;}
													
													$langues="";
													if(isset($_POST['ch6'])){$langues=$langues.' ' .$_POST['ch6'];}
													if(isset($_POST['ch7'])){$langues=$langues.' ' .$_POST['ch7'];}
													if(isset($_POST['ch8'])){$langues=$langues.' ' .$_POST['ch8'];}
													if(isset($_POST['ch9'])){$langues=$langues.' ' .$_POST['ch9'];}
													if(isset($_POST['ch10'])){$langues=$langues.' ' .$_POST['ch10'];}
													if($t16!=""){$langues=$langues.' ' .$t16;}												
													
													if(isset($_POST['situation'])){$situa=$_POST['situation'];}
												
													$reqaj="UPDATE employe SET  nom='$t1', prenom='$t2', adresse='$t3',
													 journ='$jour', moisn='$mois', anneen='$annee',
													 lieun='$t4', situation='$situa', cin='$t5', email='$t6', gsm='$t7', fixe='$t8', sexe='$sexe', periode='$t9',
													 exper='$t10', anneeeduc='$t11', diplome='$t12', anneeproj='$t13',
													proj='$t14', langages='$langages', langues='$langues',
													activite='$t17', moise='$moisemb', anneee='$anneeemb', depart='$t18', fonction='$t19'
													WHERE id  = '$id'"; 
													mysql_query ($reqaj);
													echo"<font color=green>";
													echo("Informations enregistrées avec succés");
													echo"</font>";
													
													$extensions = array('.png', '.gif', '.jpg', '.jpeg');
													$extension = strrchr($_FILES['avatar']['name'], '.');
													$fichier = basename($_FILES['avatar']['name']);
													if(isset($_FILES['avatar'])&&($fichier!=''))
													{ 
														$ccc=$id;
														$fichier=$ccc.$fichier;
														$dossier = 'imagescv/';     														
														if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
														{
															$erreur = '<br><br>NB: La photo doit être de  type png, gif, jpg, ou jpeg';
															echo($erreur);
														}
														else{
															
															$fill= mysql_fetch_array(mysql_query ("select nom from photocv where id='$id'"));
															if($fill[0]!=''){$filll='imagescv/'.$fill[0]; unlink($filll); }
																if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
																{																	
																	$reqajp="UPDATE photocv SET   nom='$fichier' where idemp='$id'";
																	mysql_query ($reqajp);																	
																}	    	 
															}
													}
													
													
													
													
													
												}
												else{echo"<font color=red>"; echo("ERREUR donnée invalide"); echo"</font>";}
											}
											else{echo"<font color=red>"; echo("ERREUR saisissez fonction"); echo"</font>";}
										}
										else{echo"<font color=red>"; echo("ERREUR saisissez département"); echo"</font>";}
									}
									else{echo"<font color=red>"; echo("ERREUR saisissez activités et loisirs"); echo"</font>";}
								}
								else{echo"<font color=red>"; echo("ERREUR saisissez année et/ou diplôme "); echo"</font>";}
							}
							else{echo"<font color=red>"; echo("ERREUR saisissez année et/ou diplôme "); echo"</font>";}
						}
						else{echo"<font color=red>"; echo("ERREUR saisissez votre téléphone mobile "); echo"</font>";}
					}
					else{echo"<font color=red>"; echo("ERREUR saisissez votre email "); echo"</font>";}
				}
				else{echo"<font color=red>"; echo("ERREUR saisissez votre CIN correctement"); echo"</font>";}
			}
			else{echo"<font color=red>"; echo("ERREUR saisissez votre lieu de naissance "); echo"</font>";}
		}
		else{echo"<font color=red>"; echo("ERREUR saisissez votre adresse"); echo"</font>";}
	}
	else{echo"<font color=red>"; echo("ERREUR saisissez votre prénom "); echo"</font>";}
}	
else
{
echo"<font color=red>";
echo("ERREUR saisissez votre nom ");
echo"</font>";
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