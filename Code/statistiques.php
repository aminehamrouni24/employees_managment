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
			<li class="current_page_item"><?php echo ("<a href='statistiques.php?id=$id'>Statistiques</a>"); ?></li>
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
<h3 class="title"><f><?php echo ("<center><a href='statistiques.php?id=$id'>Diagrammes en cercles </a>"); ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp
						<?php echo ("<a href='statistiquesb.php?id=$id'>Diagrammes en barres</a></center>"); ?>
					</f></h3>
<br>


<!-- SEXE -->
<?php
include ("src/jpgraph.php");
include ("src/jpgraph_pie.php");
$nbh= mysql_fetch_array(mysql_query ("SELECT COUNT(sexe) FROM employe where sexe='M'"));
$nbf= mysql_fetch_array(mysql_query ("SELECT COUNT(sexe) FROM employe where sexe='F'"));
$data = array($nbf[0],$nbh[0]);
$graph = new PieGraph(400,200,"auto");
$graph->SetShadow();
$graph->title->Set("Hommes/Femmes");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.4);
$p1->SetLegends(array("Femmes","Hommes"));
$tabcolor=array('#E9967A','#7CFC00');
$p1->SetSliceColors($tabcolor);
$graph->Add($p1);
$fil="graphiques/graphhfc.jpg";
unlink($fil);
$graph->Stroke("graphiques/graphhfc.jpg");
echo("<center><img src=graphiques/graphhfc.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme des employés Hommes/Femmes</font></u></center>");
?>
<br><br><br><br>

<!-- SITUATIONS -->
<?php
$xx= mysql_fetch_array(mysql_query ("SELECT COUNT(situation) FROM employe where situation='celibataire'"));
$yy= mysql_fetch_array(mysql_query ("SELECT COUNT(situation) FROM employe where situation='marie'"));
$zz= mysql_fetch_array(mysql_query ("SELECT COUNT(situation) FROM employe where situation='divorce'"));
$uu= mysql_fetch_array(mysql_query ("SELECT COUNT(situation) FROM employe where situation='fiance'"));


$data = array($xx[0],$yy[0],$zz[0],$uu[0]);
$graph = new PieGraph(400,200,"auto");
$graph->SetShadow();
$graph->title->Set("Situations");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.35);
$p1->SetLegends(array("CELIBATAIRES","MARIES","DIVORCES","FIANCES"));
$tabcolor=array('blue','#7CFC00','#E9967A','#FF1493');
$p1->SetSliceColors($tabcolor);
$graph->Add($p1);
$fils="graphiques/graphsc.jpg";
unlink($fils);
$graph->Stroke("graphiques/graphsc.jpg");
echo("<center><img src=graphiques/graphsc.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les situation des employés</font></u></center>");
?>
<br><br><br><br>
<!-- DEPARTEMENT-->
<?php
$xinf= mysql_fetch_array(mysql_query ("SELECT COUNT(depart) FROM employe where depart='informatique'"));
$xtech= mysql_fetch_array(mysql_query ("SELECT COUNT(depart) FROM employe where depart='technique'"));
$xcomp= mysql_fetch_array(mysql_query ("SELECT COUNT(depart) FROM employe where depart='comptabilite'"));
$xfin= mysql_fetch_array(mysql_query ("SELECT COUNT(depart) FROM employe where depart='finance'"));
$xcom= mysql_fetch_array(mysql_query ("SELECT COUNT(depart) FROM employe where depart='commercial'"));

$data = array($xinf[0],$xtech[0],$xcomp[0],$xfin[0],$xcom[0]);
$graph = new PieGraph(400,200,"auto");
$graph->SetShadow();
$graph->title->Set("DEPARTEMENTS");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.25);
$p1->SetCenter(0.3);
$p1->SetLegends(array("INFORMATIQUE","TECHNIQUE","COMPTABILITE","FINANCE","COMMERCIAL"));
$tabcolor=array('#8FBC8F','#00CED1','orange','#9400D3','#B22222');
$p1->SetSliceColors($tabcolor);
$graph->Add($p1);
$fils="graphiques/graphdc.jpg";
unlink($fils);
$graph->Stroke("graphiques/graphdc.jpg");
echo("<center><img src=graphiques/graphdc.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les départements des employés</font></u></center>");
?>

<br><br><br><br>
<!-- DATE EMBAUCHE-->
<?php
$x2000= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2000'"));
$x2001= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2001'"));
$x2002= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2002'"));
$x2003= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2003'"));
$x2004= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2004'"));
$x2005= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2005'"));
$x2006= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2006'"));
$x2007= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2007'"));
$x2008= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2008'"));
$x2009= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2009'"));
$x2010= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2010'"));
$x2011= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2011'"));
$x2012= mysql_fetch_array(mysql_query ("SELECT COUNT(anneee) FROM employe where anneee='2012'"));

$data = array($x2002[0],$x2003[0],$x2004[0],$x2005[0],$x2006[0],$x2007[0],$x2008[0],$x2009[0],$x2010[0],$x2011[0],$x2012[0]);
$graph = new PieGraph(400,300,"auto");
$graph->SetShadow();
$graph->title->Set("DATES D'EMBAUCHES");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.25);
$p1->SetCenter(0.35);
$p1->SetLegends(array("2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012",));
$tabcolor=array('#DC143C','#00FFFF','#FF00FF','#008B8B','#B8860B','#A9A9A9','#006400','#8B008B','#556B2F','#FF8C00','#E9967A');
$p1->SetSliceColors($tabcolor);
$graph->Add($p1);
$fials="graphiques/graphdec.jpg";
unlink($fials);
$graph->Stroke("graphiques/graphdec.jpg");
echo("<center><img src=graphiques/graphdec.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les dates d'embauches des employés</font></u></center>");
?>


<br><br><br><br>
<!-- OPERATEURS -->
<?php
$tunis=0;
$tele=0;
$orange=0;

$remp=mysql_query ("select id,gsm from employe");
 while($ligne = mysql_fetch_array($remp)){
 $tes=$ligne[1];
 if($tes!=''){
if($tes[0]=='5') {$orange=$orange+1;}
if($tes[0]=='2') {$tunis=$tunis+1;}
if($tes[0]=='9') {$tele=$tele+1;} }}
$data = array($tunis,$tele,$orange);
$graph = new PieGraph(400,200,"auto");
$graph->SetShadow();
$graph->title->Set("OPERATEURS");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.4);
$p1->SetLegends(array("TUNISIANA","T.TELECOM","ORANGE"));
$tabcolor=array('red','blue','orange');
$p1->SetSliceColors($tabcolor);
$graph->Add($p1);
$feils="graphiques/graphgc.jpg";
unlink($feils);
$graph->Stroke("graphiques/graphgc.jpg");
echo("<center><img src=graphiques/graphgc.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les opérateurs téléphoniques des employés</font></u></center>");
?>

<br><br><br><br>
<!-- EMPLOYE/EX EMP-->
<?php
$xemp= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM employe"));
$xex= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM employearchive"));
$data = array($xemp[0],$xex[0]);
$graph = new PieGraph(400,200,"auto");
$graph->SetShadow();
$graph->title->Set("EMPLOYES/EX EMPLOYES");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.3);
$p1->SetLegends(array("EMPLOYES CERT","Ex EMPLOYES"));
$tabcolor=array('green','yellow');
$p1->SetSliceColors($tabcolor);
$graph->Add($p1);
$firls="graphiques/graphexc.jpg";
unlink($firls);
$graph->Stroke("graphiques/graphexc.jpg");
echo("<center><img src=graphiques/graphexc.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les employés CERT et les anciens employés</font></u></center>");
?>

<br><br><br><br>
<!-- EMPLOYE/STAGIAIRES-->
<?php
$xemp= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM employe"));
$xex= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM stagiaire"));
$data = array($xemp[0],$xex[0]);
$graph = new PieGraph(400,200,"auto");
$graph->SetShadow();
$graph->title->Set("EMPLOYES/STAGIAIRES");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.3);
$p1->SetLegends(array("EMPLOYES CERT","STAGIAIRES"));
$tabcolor=array('green','yellow');
$p1->SetSliceColors($tabcolor);
$graph->Add($p1);
$filsr="graphiques/graphestc.jpg";
unlink($filsr);
$graph->Stroke("graphiques/graphestc.jpg");
echo("<center><img src=graphiques/graphestc.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les employés CERT et les stagiaires</font></u></center>");
?>

		         
<br><br><br><br>
<!-- STAGIAIRES/EX STAGIAIRES-->
<?php
$xemp= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM stagiaire"));
$xex= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM stagiairearchive"));
$data = array($xemp[0],$xex[0]);
$graph = new PieGraph(400,200,"auto");
$graph->SetShadow();
$graph->title->Set("STAGIAIRES/EX STAGIAIRES");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.3);
$p1->SetLegends(array("STAGIAIRES CERT","EX STAGIAIRES"));
$tabcolor=array('green','yellow');
$p1->SetSliceColors($tabcolor);
$graph->Add($p1);
$file="graphiques/graphestxc.jpg";
if(($xemp[0]!=0)||($xex[0]!=0))
{unlink($file);
$graph->Stroke("graphiques/graphestxc.jpg");
echo("<center><img src=graphiques/graphestxc.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les stagiaires CERT et les anciens stagiaires</font></u></center>");}
?>

<br><br><br><br>
<!-- EMPLOYES/EX EMPLOYES/EX STAGIAIRES-->
<?php
$xemp= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM employe"));
$xempx= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM employearchive"));
$xex= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM stagiairearchive"));
$data = array($xemp[0],$xempx[0],$xex[0]);
$graph = new PieGraph(400,200,"auto");
$graph->SetShadow();
$graph->title->Set("EMPLOYE/EX EPLOYES/EX STAGIAIRES");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.3);
$p1->SetLegends(array("EMPLOYES CERT","EX EMPLOYE","EX STAGIAIRES"));
$tabcolor=array('green','yellow','navy');
$p1->SetSliceColors($tabcolor);
$graph->Add($p1);
$filse="graphiques/graphestrrxc.jpg";
unlink($filse);
$graph->Stroke("graphiques/graphestrrxc.jpg");
echo("<center><img src=graphiques/graphestrrxc.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les employés CERT les anciens employés et les anciens stagiaires</font></u></center>");
?>



<br><br><br><br>
<!-- RAISONS EMPLOYES-->
<?php
$nb= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM employearchive"));
if($nb[0]>0)
{
$xdem= mysql_fetch_array(mysql_query ("SELECT COUNT(raison) FROM employearchive where raison='demission'"));
$xret= mysql_fetch_array(mysql_query ("SELECT COUNT(raison) FROM employearchive where raison='retraite'"));
$xren= mysql_fetch_array(mysql_query ("SELECT COUNT(raison) FROM employearchive where raison='renvoi'"));
$xdec= mysql_fetch_array(mysql_query ("SELECT COUNT(raison) FROM employearchive where raison='deces'"));
$data = array($xdem[0],$xret[0],$xren[0],$xdec[0]);
$graph = new PieGraph(400,200,"auto");
$graph->SetShadow();
$graph->title->Set("RAISON DEPART EMPLOYES");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.3);
$p1->SetLegends(array("DEMISSION","RETRAITE","RENVOI","DECES"));
$tabcolor=array('green','yellow','navy','red');
$p1->SetSliceColors($tabcolor);
$graph->Add($p1);
$filse="graphiques/graphestrrxffc.jpg";
unlink($filse);
$graph->Stroke("graphiques/graphestrrxffc.jpg");
echo("<center><img src=graphiques/graphestrrxffc.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les raisons de départ des employés CERT</font></u></center>");
}
?>







<br><br><br><br>

<!-- SITUATIONS stagiaires -->
<?php
$cxx= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM stagiaire"));
$xx= mysql_fetch_array(mysql_query ("SELECT COUNT(situation) FROM stagiaire where situation='celibataire'"));
$yy= mysql_fetch_array(mysql_query ("SELECT COUNT(situation) FROM stagiaire where situation='marie'"));
$zz= mysql_fetch_array(mysql_query ("SELECT COUNT(situation) FROM stagiaire where situation='divorce'"));
$uu= mysql_fetch_array(mysql_query ("SELECT COUNT(situation) FROM stagiaire where situation='fiance'"));


$data = array($xx[0],$yy[0],$zz[0],$uu[0]);
$graph = new PieGraph(400,200,"auto");
$graph->SetShadow();
$graph->title->Set("Situations");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.35);
$p1->SetLegends(array("CELIBATAIRES","MARIES","DIVORCES","FIANCES"));
$tabcolor=array('blue','#7CFC00','#E9967A','#FF1493');
$p1->SetSliceColors($tabcolor);
$graph->Add($p1);
$filstz="graphiques/graphsitusc.jpg";
if($cxx[0]!=0)
{
unlink($filstz);
$graph->Stroke("graphiques/graphsitusc.jpg");
echo("<center><img src=graphiques/graphsitusc.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les situation des stagiaires</font></u></center>");
}
?>

<br><br><br><br>

<!-- SEXE SATGIAIRE-->
<?php
$xxemp= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM stagiaire"));
$nbh= mysql_fetch_array(mysql_query ("SELECT COUNT(sexe) FROM stagiaire where sexe='M'"));
$nbf= mysql_fetch_array(mysql_query ("SELECT COUNT(sexe) FROM stagiaire where sexe='F'"));
$data = array($nbf[0],$nbh[0]);
$graph = new PieGraph(400,200,"auto");
$graph->SetShadow();
$graph->title->Set("Hommes/Femmes");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.4);
$p1->SetLegends(array("Femmes","Hommes"));
$tabcolor=array('#E9967A','#7CFC00');
$p1->SetSliceColors($tabcolor);
$graph->Add($p1);
$filrrr="graphiques/graphsesc.jpg";
if($xxemp[0]!=0){
unlink($filrrr);
$graph->Stroke("graphiques/graphsesc.jpg");
echo("<center><img src=graphiques/graphsesc.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme des stagiaires Hommes/Femmes</font></u></center>");}
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
<th><span class="linkcal"><a href="informations.php?id=<?php echo $id; ?>&month=<?php echo $monthnb - 1; ?>&year=<?php echo $year; ?>"><<</a></span></th>
<th colspan="5" class="headcal"><?php echo($month.' '.$year); ?></th>
<th><span class="linkcal"><a href="informations.php?id=<?php echo $id; ?>&month=<?php echo $monthnb + 1; ?>&year=<?php echo $year; ?>">>></a></span></th>
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