

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
			
			<li class="current_page_item"><?php echo ("<a href='informations.php?id=$id'>Mes informations</a>"); ?> </li>
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
					<?php echo ("<a href='mdp.php?id=$id'>Modifier mon mot de passe </a>"); ?></f></h3>
<br>

<html>
<?php
$res=mysql_connect('localhost','root','');
$res2=mysql_select_db('gestemploye');


	$rnom="select nom from employe where id='$id'";
	$resnom=mysql_query ($rnom);
	$nom = mysql_fetch_array($resnom);
	
	
	$rs="select sexe from employe where id='$id'";
	$resexe=mysql_query ($rs);
	$sexe= mysql_fetch_array($resexe);
	
	$rp="select prenom from employe where id='$id'";
	$repre=mysql_query ($rp);
	$prenom= mysql_fetch_array($repre);
	
	$radr="select adresse from employe where id='$id'";
	$readr=mysql_query ($radr);
	$adr= mysql_fetch_array($readr);
	
	
	
	$jour= mysql_fetch_array(mysql_query ("select journ from employe where id='$id'"));
	
	$mois= mysql_fetch_array(mysql_query ("select moisn from employe where id='$id'"));
	
	$anneen= mysql_fetch_array(mysql_query ("select anneen from employe where id='$id'"));
	
	$lieun= mysql_fetch_array(mysql_query ("select lieun from employe where id='$id'"));
	$cin= mysql_fetch_array(mysql_query ("select cin from employe where id='$id'"));
	$email= mysql_fetch_array(mysql_query ("select email from employe where id='$id'"));
	$gsm= mysql_fetch_array(mysql_query ("select gsm from employe where id='$id'"));
	$fix= mysql_fetch_array(mysql_query ("select fixe from employe where id='$id'"));
	
	$periode= mysql_fetch_array(mysql_query ("select periode from employe where id='$id'"));
	$exper= mysql_fetch_array(mysql_query ("select exper from employe where id='$id'"));
	
	$anneeeduc= mysql_fetch_array(mysql_query ("select anneeeduc from employe where id='$id'"));
	$diplome= mysql_fetch_array(mysql_query ("select diplome from employe where id='$id'"));
	$anneeproj= mysql_fetch_array(mysql_query ("select anneeproj from employe where id='$id'"));
	$proj= mysql_fetch_array(mysql_query ("select proj from employe where id='$id'"));
	
	$langages= mysql_fetch_array(mysql_query ("select langages from employe where id='$id'"));
	$langues= mysql_fetch_array(mysql_query ("select langues from employe where id='$id'"));
	
	$moise= mysql_fetch_array(mysql_query ("select moise from employe where id='$id'"));
	$anneee= mysql_fetch_array(mysql_query ("select anneee from employe where id='$id'"));
	
	$activite= mysql_fetch_array(mysql_query ("select activite from employe where id='$id'"));
	$depart= mysql_fetch_array(mysql_query ("select depart from employe where id='$id'"));
	$fonction= mysql_fetch_array(mysql_query ("select fonction from employe where id='$id'"));
	$situa= mysql_fetch_array(mysql_query ("select situation from employe where id='$id'"));
	$ddd=nl2br(htmlentities($periode[0]));
	
	



	   
 echo("<form name='F1' action='ajform.php?id=$id' method='POST' enctype='multipart/form-data'>"); ?>
<center><u><b>Informations personnelles</b></u></center><br><br>
<table>

<tr><td>Nom: <font color=green>*</font></td><td><input type="text" name="t1" value=<?php echo($nom[0]);?> ></td></tr>
<tr><td>Prénom: <font color=green>*</font></td><td><input type="text" name="t2" value=<?php echo($prenom[0]);?>></td></tr>
<tr><td>Adresse: <font color=green>*</font></td><td><input type="text" name="t3" value=<?php echo($adr[0]);?>></td></tr>
<tr><td>Date de naissance: <font color=green>*</font></td><td>
<select name='jour'>
	<option value='1' <?php if($jour[0]==1){echo "selected=\"selected\"";} ?> >1</option>
	<option value='2' <?php if($jour[0]==2){echo "selected=\"selected\"";} ?> >2</option>   
	<option value='3' <?php if($jour[0]==3){echo "selected=\"selected\"";} ?> >3</option>
	<option value='4' <?php if($jour[0]==4){echo "selected=\"selected\"";} ?> >4</option>
	<option value='5' <?php if($jour[0]==5){echo "selected=\"selected\"";} ?> >5</option>
	<option value='6' <?php if($jour[0]==6){echo "selected=\"selected\"";} ?> >6</option>
	<option value='7' <?php if($jour[0]==7){echo "selected=\"selected\"";} ?> >7</option>
	<option value='8' <?php if($jour[0]==8){echo "selected=\"selected\"";} ?> >8</option>
	<option value='9' <?php if($jour[0]==9){echo "selected=\"selected\"";} ?> >9</option>
	<option value='10' <?php if($jour[0]==10){echo "selected=\"selected\"";} ?> >10</option>
	<option value='11' <?php if($jour[0]==11){echo "selected=\"selected\"";} ?> >11</option>
	<option value='12' <?php if($jour[0]==12){echo "selected=\"selected\"";} ?> >12</option>
	<option value='13' <?php if($jour[0]==13){echo "selected=\"selected\"";} ?> >13</option>
	<option value='14' <?php if($jour[0]==14){echo "selected=\"selected\"";} ?> >14</option>
	<option value='15' <?php if($jour[0]==15){echo "selected=\"selected\"";} ?> >15</option>
	<option value='16' <?php if($jour[0]==16){echo "selected=\"selected\"";} ?> >16</option>
	<option value='17' <?php if($jour[0]==17){echo "selected=\"selected\"";} ?> >17</option>
	<option value='18' <?php if($jour[0]==18){echo "selected=\"selected\"";} ?> >18</option>
	<option value='19' <?php if($jour[0]==19){echo "selected=\"selected\"";} ?> >19</option>
	<option value='20' <?php if($jour[0]==20){echo "selected=\"selected\"";} ?> >20</option>
	<option value='21' <?php if($jour[0]==21){echo "selected=\"selected\"";} ?> >21</option>
	<option value='22' <?php if($jour[0]==22){echo "selected=\"selected\"";} ?> >22</option>
	<option value='23' <?php if($jour[0]==23){echo "selected=\"selected\"";} ?> >23</option>
	<option value='24' <?php if($jour[0]==24){echo "selected=\"selected\"";} ?> >24</option>
	<option value='25' <?php if($jour[0]==25){echo "selected=\"selected\"";} ?> >25</option>
	<option value='26' <?php if($jour[0]==26){echo "selected=\"selected\"";} ?> >26</option>
	<option value='27' <?php if($jour[0]==27){echo "selected=\"selected\"";} ?> >27</option>
	<option value='28' <?php if($jour[0]==28){echo "selected=\"selected\"";} ?> >28</option>
	<option value='29' <?php if($jour[0]==29){echo "selected=\"selected\"";} ?> >29</option>
	<option value='30' <?php if($jour[0]==30){echo "selected=\"selected\"";} ?> >30</option>
	<option value='31' <?php if($jour[0]==31){echo "selected=\"selected\"";} ?> >31</option>
</select>

<select name='mois'>
	<option value='Janvier' <?php if($mois[0]=='Janvier'){echo "selected=\"selected\"";} ?> >Janvier</option>
	<option value='Fevrier' <?php if($mois[0]=='Fevrier'){echo "selected=\"selected\"";} ?>>Février</option>
	<option value='Mars' <?php if($mois[0]=='Mars'){echo "selected=\"selected\"";} ?>>Mars</option>
	<option value='Avril' <?php if($mois[0]=='Avril'){echo "selected=\"selected\"";} ?>>Avril</option>
	<option value='Mai'  <?php if($mois[0]=='Mai'){echo "selected=\"selected\"";} ?>>Mai</option>
	<option value='Juin' <?php if($mois[0]=='Juin'){echo "selected=\"selected\"";} ?>>Juin</option>
	<option value='Juillet' <?php if($mois[0]=='Juillet'){echo "selected=\"selected\"";} ?>>Juillet</option>
	<option value='Aout'  <?php if($mois[0]=='Aout'){echo "selected=\"selected\"";} ?>>Août</option>
	<option value='Septembre' <?php if($mois[0]=='Septembre'){echo "selected=\"selected\"";} ?>>Septembre</option>
	<option value='Octobre'  <?php if($mois[0]=='Octobre'){echo "selected=\"selected\"";} ?>>Octobre</option>
	<option value='Novembre'  <?php if($mois[0]=='Novembre'){echo "selected=\"selected\"";} ?>>Novembre</option>
	<option value='Decembre'  <?php if($mois[0]=='Decembre'){echo "selected=\"selected\"";} ?>>Décembre</option>

</select>

<select name='annee'>
<option value='1950' <?php if($anneen[0]==1950){echo "selected=\"selected\"";} ?> >1950</option>
<option value='1951'  <?php if($anneen[0]==1951){echo "selected=\"selected\"";} ?> >1951</option>
<option value='1952' <?php if($anneen[0]==1952){echo "selected=\"selected\"";} ?> >1952</option>
<option value='1953' <?php if($anneen[0]==1953){echo "selected=\"selected\"";} ?>>1953</option>
<option value='1954' <?php if($anneen[0]==1954){echo "selected=\"selected\"";} ?>>1954</option>
<option value='1955' <?php if($anneen[0]==1955){echo "selected=\"selected\"";} ?>>1955</option>
<option value='1956' <?php if($anneen[0]==1956){echo "selected=\"selected\"";} ?>>1956</option>
<option value='1957' <?php if($anneen[0]==1957){echo "selected=\"selected\"";} ?>>1957</option>
<option value='1958' <?php if($anneen[0]==1958){echo "selected=\"selected\"";} ?>>1958</option>
<option value='1959' <?php if($anneen[0]==1959){echo "selected=\"selected\"";} ?>>1959</option>
<option value='1960' <?php if($anneen[0]==1960){echo "selected=\"selected\"";} ?>>1960</option>
<option value='1961' <?php if($anneen[0]==1961){echo "selected=\"selected\"";} ?>>1961</option>
<option value='1962' <?php if($anneen[0]==1962){echo "selected=\"selected\"";} ?>>1962</option>
<option value='1963' <?php if($anneen[0]==1963){echo "selected=\"selected\"";} ?>>1963</option>
<option value='1964' <?php if($anneen[0]==1964){echo "selected=\"selected\"";} ?>>1964</option>
<option value='1965' <?php if($anneen[0]==1965){echo "selected=\"selected\"";} ?>>1965</option>
<option value='1966' <?php if($anneen[0]==1966){echo "selected=\"selected\"";} ?>>1966</option>
<option value='1967' <?php if($anneen[0]==1967){echo "selected=\"selected\"";} ?>>1967</option>
<option value='1968' <?php if($anneen[0]==1968){echo "selected=\"selected\"";} ?>>1968</option>
<option value='1969' <?php if($anneen[0]==1969){echo "selected=\"selected\"";} ?>>1969</option>
<option value='1970' <?php if($anneen[0]==1970){echo "selected=\"selected\"";} ?>>1970</option>
<option value='1971' <?php if($anneen[0]==1971){echo "selected=\"selected\"";} ?>>1971</option>
<option value='1972' <?php if($anneen[0]==1972){echo "selected=\"selected\"";} ?>>1972</option>
<option value='1973' <?php if($anneen[0]==1973){echo "selected=\"selected\"";} ?>>1973</option>
<option value='1974' <?php if($anneen[0]==1974){echo "selected=\"selected\"";} ?>>1974</option>
<option value='1975' <?php if($anneen[0]==1975){echo "selected=\"selected\"";} ?>>1975</option>
<option value='1976' <?php if($anneen[0]==1976){echo "selected=\"selected\"";} ?>>1976</option>
<option value='1977' <?php if($anneen[0]==1977){echo "selected=\"selected\"";} ?>>1977</option>
<option value='1978' <?php if($anneen[0]==1978){echo "selected=\"selected\"";} ?>>1978</option>
<option value='1979' <?php if($anneen[0]==1979){echo "selected=\"selected\"";} ?>>1979</option>
<option value='1980' <?php if($anneen[0]==1980){echo "selected=\"selected\"";} ?>>1980</option>
<option value='1981' <?php if($anneen[0]==1981){echo "selected=\"selected\"";} ?>>1981</option>
<option value='1982' <?php if($anneen[0]==1982){echo "selected=\"selected\"";} ?>>1982</option>
<option value='1983' <?php if($anneen[0]==1983){echo "selected=\"selected\"";} ?>>1983</option>
<option value='1984' <?php if($anneen[0]==1984){echo "selected=\"selected\"";} ?>>1984</option>
<option value='1985' <?php if($anneen[0]==1985){echo "selected=\"selected\"";} ?>>1985</option>
<option value='1986' <?php if($anneen[0]==1986){echo "selected=\"selected\"";} ?>>1986</option>
<option value='1987' <?php if($anneen[0]==1987){echo "selected=\"selected\"";} ?>>1987</option>
<option value='1988' <?php if($anneen[0]==1988){echo "selected=\"selected\"";} ?>>1988</option>
<option value='1989' <?php if($anneen[0]==1989){echo "selected=\"selected\"";} ?>>1989</option>
<option value='1990' <?php if($anneen[0]==1990){echo "selected=\"selected\"";} ?>>1990</option>
<option value='1991' <?php if($anneen[0]==1991){echo "selected=\"selected\"";} ?>>1991</option>
<option value='1992' <?php if($anneen[0]==1992){echo "selected=\"selected\"";} ?>>1992</option>


</select></td></tr>
<tr><td>Lieu de naissance: <font color=green>*</font></td><td> <input type="text" name="t4"  value=<?php echo($lieun[0]);?>></td></tr>

<tr><td>Situation: <font color=green>*</font></td><td> 
<select name='situation'>

<option value='celibataire' <?php if($situa[0]=='celibataire'){echo "selected=\"selected\"";} ?>>Célibataire</option>
<option value='fiance' <?php if($situa[0]=='fiance'){echo "selected=\"selected\"";} ?>>Fiancé(e)</option>
<option value='marie' <?php if($situa[0]=='marie'){echo "selected=\"selected\"";} ?>>Marié(e)</option>
<option value='divorce' <?php if($situa[0]=='divorce'){echo "selected=\"selected\"";} ?>>Divorcé(e)</option>

</select>




</td></tr>
<tr><td>CIN: <font color=green>*</font></td><td><input type="text" name="t5" value=<?php echo($cin[0]);?> ></td></tr>
<tr><td>email: <font color=green>*</font></td><td><input type="text" name="t6"  value=<?php echo($email[0]);?> ></td></tr>
<tr><td>téléphone mobile: <font color=green>*</font></td><td><input type="text" name="t7" value=<?php echo($gsm[0]);?>>	fixe:<input type="text" name="t8" value=<?php echo($fix[0]);?>></td></tr>
<tr><td>Sexe: <font color=green>*</font></td><td>
	
Homme  <INPUT type=radio name="sexe" value="M" <?php  if($sexe[0]=='M'){echo "checked=\"checked\"";}?> >
Femme <INPUT type=radio name="sexe" value="F" <?php if($sexe[0]=='F'){echo "checked=\"checked\"";}?> > 
</td></tr>
</table>
<br><br><br><br>

<center><u><b>Expériences professionnelles et stages effectués</b></u></center><br>
<table>
<tr><td><center>Période</center></td><td><center>Expérience et stage</center></td></tr>
<tr><td><TEXTAREA name="t9" rows=10 COLS=20 > <?php echo($periode[0]);?> </TEXTAREA> </td><td><TEXTAREA name="t10" rows=10 COLS=40> <?php echo($exper[0]);?> </TEXTAREA> </td></tr>
</table>

<br><br><br><br>
<center><u><b>Education <font color=green>*</font></b></u></center><br>
<table>
<tr><td><center>Année</center></td><td><center>diplômes</center></td></tr>
<tr><td><TEXTAREA name="t11" rows=10 COLS=20 > <?php echo($anneeeduc[0]);?> </TEXTAREA> </td><td><TEXTAREA name="t12" rows=10 COLS=40>  <?php echo($diplome[0]);?> </TEXTAREA> </td></tr>
</table>

<br><br><br><br>
<center><u><b>Projets académiques</b></u></center><br>
<table>
<tr><td><center>Année</center></td><td><center>Projets</center></td></tr>
<tr><td><TEXTAREA name="t13" rows=10 COLS=20><?php echo($anneeproj[0]);?></TEXTAREA> </td><td><TEXTAREA name="t14" rows=10 COLS=40><?php echo($proj[0]);?></TEXTAREA> </td></tr>
</table>

<br><br><br><br>
<center><u><b>Compétences</b></u></center><br>
<table>
<tr><td>Langages:</td><td>C<input type="checkbox"name="ch1" value="C"> &nbsp&nbsp&nbsp
						  C++<input type="checkbox"name="ch2" value="C++">&nbsp&nbsp&nbsp		  
						  C#<input type="checkbox"name="ch3" value="C#">&nbsp&nbsp&nbsp		  
						  Java<input type="checkbox"name="ch4" value="Java">&nbsp&nbsp&nbsp
						  VB<input type="checkbox"name="ch5" value="VB"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td> autres: <TEXTAREA name="t15" rows=1 COLS=25><?php echo($langages[0]);?></TEXTAREA></td></tr>
<tr><td>Langues:</td><td>arabe<input type="checkbox"name="ch6" value="arabe">&nbsp&nbsp&nbsp
						anglais<input type="checkbox"name="ch7" value="anglais">&nbsp&nbsp&nbsp
						français<input type="checkbox"name="ch8" value="français">&nbsp&nbsp&nbsp
						espagnol<input type="checkbox"name="ch9" value="espagnol">&nbsp&nbsp&nbsp
						italien<input type="checkbox"name="ch10" value="italien">&nbsp&nbsp&nbsp </td><td> autres: <TEXTAREA name="t16" rows=3 COLS=25><?php echo($langues[0]);?></TEXTAREA></td></tr>
</table>



<table>
<tr><td>Activités  et loisirs: <font color=green>*</font></td><td><TEXTAREA name="t17" rows=10 COLS=40><?php echo($activite[0]);?></TEXTAREA></td></tr></table>

<br><br><br><br>
<center><u><b>Informations liées à l'entreprise CERT </b></u></center><br>
<table>
<tr><td>Date d'embauche: <font color=green>*</font></td><td><select name="moisemb">
	
	<option value='Janvier' <?php if($moise[0]=='Janvier'){echo "selected=\"selected\"";} ?> >Janvier</option>
	<option value='Fevrier' <?php if($moise[0]=='Fevrier'){echo "selected=\"selected\"";} ?>>Février</option>
	<option value='Mars' <?php if($moise[0]=='Mars'){echo "selected=\"selected\"";} ?>>Mars</option>
	<option value='Avril' <?php if($moise[0]=='Avril'){echo "selected=\"selected\"";} ?>>Avril</option>
	<option value='Mai'  <?php if($moise[0]=='Mai'){echo "selected=\"selected\"";} ?>>Mai</option>
	<option value='Juin' <?php if($moise[0]=='Juin'){echo "selected=\"selected\"";} ?>>Juin</option>
	<option value='Juillet' <?php if($moise[0]=='Juillet'){echo "selected=\"selected\"";} ?>>Juillet</option>
	<option value='Aout'  <?php if($moise[0]=='Aout'){echo "selected=\"selected\"";} ?>>Août</option>
	<option value='Septembre' <?php if($moise[0]=='Septembre'){echo "selected=\"selected\"";} ?>>Septembre</option>
	<option value='Octobre'  <?php if($moise[0]=='Octobre'){echo "selected=\"selected\"";} ?>>Octobre</option>
	<option value='Novembre'  <?php if($moise[0]=='Novembre'){echo "selected=\"selected\"";} ?>>Novembre</option>
	<option value='Decembre'  <?php if($moise[0]=='Decembre'){echo "selected=\"selected\"";} ?>>Décembre</option>
</select>
<select name='anneeemb'>
<option value='1990' <?php if($anneee[0]==1990){echo "selected=\"selected\"";} ?>>1990</option>
<option value='1991' <?php if($anneee[0]==1991){echo "selected=\"selected\"";} ?>>1991</option>
<option value='1992' <?php if($anneee[0]==1992){echo "selected=\"selected\"";} ?>>1992</option>
<option value='1993' <?php if($anneee[0]==1993){echo "selected=\"selected\"";} ?>>1993</option>
<option value='1994' <?php if($anneee[0]==1994){echo "selected=\"selected\"";} ?>>1994</option>
<option value='1995' <?php if($anneee[0]==1995){echo "selected=\"selected\"";} ?>>1995</option>
<option value='1996' <?php if($anneee[0]==1996){echo "selected=\"selected\"";} ?>>1996</option>
<option value='1997'<?php if($anneee[0]==1997){echo "selected=\"selected\"";} ?>>1997</option>
<option value='1998' <?php if($anneee[0]==1998){echo "selected=\"selected\"";} ?>>1998</option>
<option value='1999' <?php if($anneee[0]==1999){echo "selected=\"selected\"";} ?>>1999</option>
<option value='2000'<?php if($anneee[0]==2000){echo "selected=\"selected\"";} ?>>2000</option>
<option value='2001' <?php if($anneee[0]==2001){echo "selected=\"selected\"";} ?>>2001</option>
<option value='2002' <?php if($anneee[0]==2002){echo "selected=\"selected\"";} ?>>2002</option>
<option value='2003' <?php if($anneee[0]==2003){echo "selected=\"selected\"";} ?>>2003</option>
<option value='2004' <?php if($anneee[0]==2004){echo "selected=\"selected\"";} ?>>2004</option>
<option value='2005' <?php if($anneee[0]==2005){echo "selected=\"selected\"";} ?>>2005</option>
<option value='2006' <?php if($anneee[0]==2006){echo "selected=\"selected\"";} ?>>2006</option>
<option value='2007' <?php if($anneee[0]==2007){echo "selected=\"selected\"";} ?>>2007</option>
<option value='2008' <?php if($anneee[0]==2008){echo "selected=\"selected\"";} ?>>2008</option>
<option value='2009' <?php if($anneee[0]==2009){echo "selected=\"selected\"";} ?>>2009</option>
<option value='2010' <?php if($anneee[0]==2010){echo "selected=\"selected\"";} ?>>2010</option>
<option value='2011' <?php if($anneee[0]==2011){echo "selected=\"selected\"";} ?>>2011</option>
<option value='2012' <?php if($anneee[0]==2012){echo "selected=\"selected\"";} ?>>2012</option>
</select>



</td></tr>
<tr><td>Département: <font color=green>*</font></td><td>
<select name='t18'>

<option value='informatique' <?php if($depart[0]=='informatique'){echo "selected=\"selected\"";} ?>>Informatique</option>
<option value='technique' <?php if($depart[0]=='technique'){echo "selected=\"selected\"";} ?>>Technique</option>
<option value='comptabilite' <?php if($depart[0]=='comptabilite'){echo "selected=\"selected\"";} ?>>Comptabilité</option>
<option value='finance' <?php if($depart[0]=='finance'){echo "selected=\"selected\"";} ?>>Finance</option>
<option value='commercial' <?php if($depart[0]=='commercial'){echo "selected=\"selected\"";} ?>>Commercial</option>

</select>





</td></tr>
<tr><td>Fonction: <font color=green>*</font></td><td><TEXTAREA name="t19" rows=1 COLS=30><?php echo($fonction[0]);?></TEXTAREA></td></tr>
</table>
<br>

<table><tr><td>Insérer une photo pour le CV : </td><td>    	 <input type="file" name="avatar" >
<input type="hidden" name="MAX_FILE_SIZE" value="100000"></td></tr></table>
  
<br><br>

<center><INPUT type="submit" value="Enregistrer"></center>
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
<th><span class="linkcal"><a href="formulaire.php?id=<?php echo $id; ?>&month=<?php echo $monthnb - 1; ?>&year=<?php echo $year; ?>"><<</a></span></th>
<th colspan="5" class="headcal"><?php echo($month.' '.$year); ?></th>
<th><span class="linkcal"><a href="formulaire.php?id=<?php echo $id; ?>&month=<?php echo $monthnb + 1; ?>&year=<?php echo $year; ?>">>></a></span></th>
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
	<!-- end #footer --><br><br><br>
</body>
</html>