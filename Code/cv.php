<body marginwidth="10" marginheight="80" topmargin="15" leftmargin="10">
<a href="javascript:window.print()">
<?php




$res=mysql_connect('localhost','root','');
$res2=mysql_select_db('gestemploye');
$id=$_GET['id'];

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
	$period=nl2br(htmlentities($periode[0]));
	
	
	$exper= mysql_fetch_array(mysql_query ("select exper from employe where id='$id'"));
	$experr=nl2br(htmlentities($exper[0]));
	
	$anneeeduc= mysql_fetch_array(mysql_query ("select anneeeduc from employe where id='$id'"));
	$anneduc=nl2br(htmlentities($anneeeduc[0]));
	$diplome= mysql_fetch_array(mysql_query ("select diplome from employe where id='$id'"));
	$diplom=nl2br(htmlentities($diplome[0]));
	
	$anneeproj= mysql_fetch_array(mysql_query ("select anneeproj from employe where id='$id'"));
	$anneproj=nl2br(htmlentities($anneeproj[0]));
	$proj= mysql_fetch_array(mysql_query ("select proj from employe where id='$id'"));
	$pro=nl2br(htmlentities($proj[0]));
	$situa= mysql_fetch_array(mysql_query ("select situation from employe where id='$id'"));
	
	$langages= mysql_fetch_array(mysql_query ("select langages from employe where id='$id'"));
	$langues= mysql_fetch_array(mysql_query ("select langues from employe where id='$id'"));
	
	$moise= mysql_fetch_array(mysql_query ("select moise from employe where id='$id'"));
	$anneee= mysql_fetch_array(mysql_query ("select anneee from employe where id='$id'"));
	$se= mysql_fetch_array(mysql_query ("select sexe from employe where id='$id'"));
	
	$activite= mysql_fetch_array(mysql_query ("select activite from employe where id='$id'"));
	$depart= mysql_fetch_array(mysql_query ("select depart from employe where id='$id'"));
	$fonction= mysql_fetch_array(mysql_query ("select fonction from employe where id='$id'"));
	$tof= mysql_fetch_array(mysql_query ("select nom from photocv where idemp='$id'"));
	$ttof='imagescv/'.$tof[0];
	


?>
	
<center>
<table border=1>
<td width="300px"><center><font size=6><b>Curriculum vitæ </b></font></center> </td>

</table><br>


</center>

<table width="600px"><td>
<b>Informations personnelles</b> <br><br>
Nom et prénom :  <?php echo($nom[0]); echo(' '.$prenom[0]); ?><br>
Adresse : <?php echo($adr[0]);?><br>
Date de naissance : <?php echo($jour[0]); echo(' '.$mois[0]); echo(' '.$anneen[0]);?><br>
Lieu de naissance : <?php echo($lieun[0]);?><br>
Situation : <?php 
					
					if($situa[0]=='divorce')
					{
					if($se[0]=='M')
						{echo('Divorcé');}
						else{echo('Divorcée');}
					}
					
					if($situa[0]=='marie')
					{
					if($se[0]=='M')
						{echo('Marié');}
						else{echo('Mariée');}
					}
					
					if($situa[0]=='celibataire')
					{
					if($se[0]=='M')
						{echo('Célibataire');}
						else{echo('Célibataire');}
					}




?><br>
CIN : <?php echo($cin[0]);?><br>
email : <?php echo($email[0]);?><br>
Téléphone mobile : <?php echo($gsm[0]);?><br>
<?php if ($fix[0]!=''){echo("Téléphone fixe : $fix[0] <br>");} ?>
</td><td style="text-align: right"><?php if($tof[0]!='') {echo("<img src='$ttof' width=105 height=120>");} ?></td></table>


<br><br></a>
<?php if(($period!='')&&($experr!='')){echo("<b>Expériences professionnelles et stages effectués</b><br><br>");}?><a href="javascript:window.print()"><?php
echo("<table ><tr><td ALIGN='top'> $anneee[0]</td><td>$fonction[0] dans l'entreprise CERT (Centre d'Etudes et de Recherche des Télécommunications)</td></tr>");
echo("<table><tr><td>$period</td><td>$experr</td></tr></table>");

?>
<br><br></a>
<b>Education</b><a href="javascript:window.print()">
<br><br>

<table>
<tr><td><?php echo($anneduc);  ?></td><td><?php echo($diplom);  ?></td></tr>
</table>



<br><br></a>
<?php if(($pro!='')&&($anneproj!='')){echo("<b>Projets académiques</b><br><br>");}?> <a href="javascript:window.print()"> <?php
echo("<table><tr><td>$anneproj</td><td>$pro</td></table>");

?>
<br><br></a>
<b>Compétences</b>

<br><br>
<?php if ($langages[0]!=''){echo("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<u>Langages :</u> &nbsp $langages[0] <br>");}?>
<?php if ($langues[0]!=''){echo("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<u>Langues :</u> &nbsp $langues[0] <br>");}?>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <u>Activités et loisirs :</u> <?php echo($activite[0]); ?>





</body>

