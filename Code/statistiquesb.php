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






			
			
			
			
<?php
$nbh= mysql_fetch_array(mysql_query ("SELECT COUNT(sexe) FROM employe where sexe='M'"));
$nbf= mysql_fetch_array(mysql_query ("SELECT COUNT(sexe) FROM employe where sexe='F'"));
include ("src/jpgraph.php");
include ("src/jpgraph_bar.php");

// We need some data
$datay=array($nbf[0],$nbh[0]);
$datax=array("Femmes","Hommes");
// Setup the graph. 
$graph = new Graph(300,150,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(30,15,25,25);

$graph->title->Set('Hommes/Femmes');
$graph->title->SetColor('darkred');

// Setup font for axis
$graph->xaxis->SetFont(FF_FONT1);
$graph->yaxis->SetFont(FF_FONT1);
$graph->xaxis->SetTickLabels($datax);
// Create the bar pot
$bplot = new BarPlot($datay);

$bplot->SetWidth(0.6);

// Setup color for gradient fill style 
//$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);
$bplot->SetFillColor(array("pink","blue"));
$bplot->SetShadow();
// Set color for the frame of each bar
$bplot->SetColor("navy");
$graph->Add($bplot);
$fil="graphiques/graphhfb.jpg";
unlink($fil);
// Finally send the graph to the browser
$graph->Stroke("graphiques/graphhfb.jpg");

echo("<center><img src=graphiques/graphhfb.jpg width=400></center>");
echo("<center><u><font color=black>Diagramme des employés Hommes/Femmes</font></u></center>");
?>

<br><br><br><br>

<!-- SITUATIONS -->
<?php
$xx= mysql_fetch_array(mysql_query ("SELECT COUNT(situation) FROM employe where situation='celibataire'"));
$yy= mysql_fetch_array(mysql_query ("SELECT COUNT(situation) FROM employe where situation='marie'"));
$zz= mysql_fetch_array(mysql_query ("SELECT COUNT(situation) FROM employe where situation='divorce'"));
$uu= mysql_fetch_array(mysql_query ("SELECT COUNT(situation) FROM employe where situation='fiance'"));


$datay = array($xx[0],$yy[0],$zz[0],$uu[0]);

$datax=array("Celibataire","marie","divorce","fiance");
// Setup the graph. 
$graph = new Graph(350,150,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(30,15,25,25);

$graph->title->Set('Situations');
$graph->title->SetColor('darkred');

// Setup font for axis
$graph->xaxis->SetFont(FF_FONT1);
$graph->yaxis->SetFont(FF_FONT1);

$graph->xaxis->SetTickLabels($datax);
// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.6);

// Setup color for gradient fill style 
$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);

// Set color for the frame of each bar
$bplot->SetColor("navy");
$graph->Add($bplot);
$fils="graphiques/graphsb.jpg";
unlink($fils);
$graph->Stroke("graphiques/graphsb.jpg");
echo("<center><img src=graphiques/graphsb.jpg width=500></center>");
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

$datay = array($xinf[0],$xtech[0],$xcomp[0],$xfin[0],$xcom[0]);
$datax=array("informatique","technique","comptabilite","finance","commercial");
// Setup the graph. 
$graph = new Graph(350,150,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(30,15,25,25);

$graph->title->Set('DEPARTEMENTS');
$graph->title->SetColor('darkred');

// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,7);
$graph->yaxis->SetFont(FF_FONT1);

$graph->xaxis->SetTickLabels($datax);
// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.6);

// Setup color for gradient fill style 
$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);

// Set color for the frame of each bar
$bplot->SetColor("navy");
$graph->Add($bplot);
$fils="graphiques/graphdb.jpg";
unlink($fils);
$graph->Stroke("graphiques/graphdb.jpg");
echo("<center><img src=graphiques/graphdb.jpg width=500></center>");
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




$datay = array($x2002[0],$x2003[0],$x2004[0],$x2005[0],$x2006[0],$x2007[0],$x2008[0],$x2009[0],$x2010[0],$x2011[0],$x2012[0]);
$datax=array("2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012");
// Setup the graph. 
$graph = new Graph(400,150,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(30,15,25,25);

$graph->title->Set("DATES D'EMBAUCHES");
$graph->title->SetColor('darkred');

// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,7);
$graph->yaxis->SetFont(FF_FONT1);

$graph->xaxis->SetTickLabels($datax);
// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.6);

// Setup color for gradient fill style 
$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);

// Set color for the frame of each bar
$bplot->SetColor("navy");
$graph->Add($bplot);


//$tabcolor=array('#DC143C','#00FFFF','#FF00FF','#008B8B','#B8860B','#A9A9A9','#006400','#8B008B','#556B2F','#FF8C00','#E9967A');
$fials="graphiques/graphdeb.jpg";
unlink($fials);
$graph->Stroke("graphiques/graphdeb.jpg");
echo("<center><img src=graphiques/graphdeb.jpg width=500></center>");
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

$datay = array($tunis,$tele,$orange);
$datax=array("TUNISIANA","T.TELECOM","ORANGE");
// Setup the graph. 
$graph = new Graph(350,150,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(30,15,25,25);

$graph->title->Set('OPERATEURS');
$graph->title->SetColor('darkred');

// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,7);
$graph->yaxis->SetFont(FF_FONT1);

$graph->xaxis->SetTickLabels($datax);
// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.6);

// Setup color for gradient fill style 
//$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);
$bplot->SetFillColor(array("red","blue","orange"));
$bplot->SetShadow();
// Set color for the frame of each bar
$bplot->SetColor("navy");
$graph->Add($bplot);


$feils="graphiques/graphgb.jpg";
unlink($feils);
$graph->Stroke("graphiques/graphgb.jpg");
echo("<center><img src=graphiques/graphgb.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les opérateurs téléphoniques des employés</font></u></center>");
?>


<br><br><br><br>
<!-- EMPLOYE/EX EMP-->
<?php
$xemp= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM employe"));
$xex= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM employearchive"));
$datay = array($xemp[0],$xex[0]);


$datax=array("EMPLOYES","EX EMPLOYES");
// Setup the graph. 
$graph = new Graph(350,150,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(30,15,25,25);

$graph->title->Set("EMPLOYES/EX EMPLOYES");
$graph->title->SetColor('darkred');

// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,7);
$graph->yaxis->SetFont(FF_FONT1);

$graph->xaxis->SetTickLabels($datax);
// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.4);

// Setup color for gradient fill style 
$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);


// Set color for the frame of each bar
$bplot->SetColor("navy");
$graph->Add($bplot);









$firls="graphiques/graphexb.jpg";
unlink($firls);
$graph->Stroke("graphiques/graphexb.jpg");
echo("<center><img src=graphiques/graphexb.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les employés CERT et les anciens employés</font></u></center>");
?>
<br><br><br><br>

<!-- EMPLOYE/STAGIAIRES-->
<?php
$xemp= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM employe"));
$xex= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM stagiaire"));
$datay = array($xemp[0],$xex[0]);



$datax=array("EMPLOYES","STAGIAIRES");
// Setup the graph. 
$graph = new Graph(350,150,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(30,15,25,25);

$graph->title->Set("EMPLOYES/STAGIAIRES");
$graph->title->SetColor('darkred');

// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,7);
$graph->yaxis->SetFont(FF_FONT1);

$graph->xaxis->SetTickLabels($datax);
// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.4);

// Setup color for gradient fill style 
$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);


// Set color for the frame of each bar
$bplot->SetColor("navy");
$graph->Add($bplot);

$filsr="graphiques/graphestb.jpg";
unlink($filsr);
$graph->Stroke("graphiques/graphestb.jpg");
echo("<center><img src=graphiques/graphestb.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les employés CERT et les stagiaires</font></u></center>");
?>

		         
<br><br><br><br>
<!-- STAGIAIRES/EX STAGIAIRES-->
<?php
$xemp= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM stagiaire"));
$xex= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM stagiairearchive"));




$datay = array($xemp[0],$xex[0]);


$datax=array("STAGIAIRES","EX STAGIAIRES");
// Setup the graph. 
$graph = new Graph(350,150,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(30,15,25,25);

$graph->title->Set("STAGIAIRES/EX STAGIAIRES");
$graph->title->SetColor('darkred');

// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,7);
$graph->yaxis->SetFont(FF_FONT1);

$graph->xaxis->SetTickLabels($datax);
// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.4);

// Setup color for gradient fill style 
$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);


// Set color for the frame of each bar
$bplot->SetColor("navy");
$graph->Add($bplot);




$file="graphiques/graphestxb.jpg";
if(($xemp[0]!=0)||($xex[0]!=0))
{unlink($file);
$graph->Stroke("graphiques/graphestxb.jpg");
echo("<center><img src=graphiques/graphestxb.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les stagiaires CERT et les anciens stagiaires</font></u></center>");}
?>



<br><br><br><br>
<!-- EMPLOYES/EX EMPLOYES/EX STAGIAIRES-->
<?php
$xemp= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM employe"));
$xempx= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM employearchive"));
$xex= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM stagiairearchive"));
$datay = array($xemp[0],$xempx[0],$xex[0]);




$datax=array("EMPLOYES","EX EMPLOYES","EX STAGIAIRES");
// Setup the graph. 
$graph = new Graph(350,150,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(30,15,25,25);

$graph->title->Set("EMPLOYE/EX EPLOYES/EX STAGIAIRES");
$graph->title->SetColor('darkred');

// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,7);
$graph->yaxis->SetFont(FF_FONT1);

$graph->xaxis->SetTickLabels($datax);
// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.4);

// Setup color for gradient fill style 
$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);


// Set color for the frame of each bar
$bplot->SetColor("navy");
$graph->Add($bplot);


$filse="graphiques/graphestrrxb.jpg";
unlink($filse);
$graph->Stroke("graphiques/graphestrrxb.jpg");
echo("<center><img src=graphiques/graphestrrxb.jpg width=500></center>");
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
$datay = array($xdem[0],$xret[0],$xren[0],$xdec[0]);

$datax=array("DEMISSION","RETRAITE","RENVOI","DECES");
// Setup the graph. 
$graph = new Graph(350,150,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(30,15,25,25);

$graph->title->Set("RAISON DEPART EMPLOYES");
$graph->title->SetColor('darkred');
// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,7);
$graph->yaxis->SetFont(FF_FONT1);
$graph->xaxis->SetTickLabels($datax);
// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.4);
// Setup color for gradient fill style 
$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);
// Set color for the frame of each bar
$bplot->SetColor("navy");
$graph->Add($bplot);

$filse="graphiques/graphestrrxffb.jpg";
unlink($filse);
$graph->Stroke("graphiques/graphestrrxffb.jpg");
echo("<center><img src=graphiques/graphestrrxffb.jpg width=500></center>");
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


$datay = array($xx[0],$yy[0],$zz[0],$uu[0]);
$datax=array("CELIBATAIRES","MARIES","DIVORCES","FIANCES");
// Setup the graph. 
$graph = new Graph(350,150,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(30,15,25,25);

$graph->title->Set("Situations");
$graph->title->SetColor('darkred');
// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,7);
$graph->yaxis->SetFont(FF_FONT1);
$graph->xaxis->SetTickLabels($datax);
// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.4);
// Setup color for gradient fill style 
$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);
// Set color for the frame of each bar
$bplot->SetColor("navy");
$graph->Add($bplot);

$filstz="graphiques/graphsitusb.jpg";
if($cxx[0]!=0)
{
unlink($filstz);
$graph->Stroke("graphiques/graphsitusb.jpg");
echo("<center><img src=graphiques/graphsitusb.jpg width=500></center>");
echo("<center><u><font color=black>Diagramme représentant les situation des stagiaires</font></u></center>");
}
?>

<br><br><br><br>

<!-- SEXE SATGIAIRE-->
<?php
$xxemp= mysql_fetch_array(mysql_query ("SELECT COUNT(id) FROM stagiaire"));
$nbh= mysql_fetch_array(mysql_query ("SELECT COUNT(sexe) FROM stagiaire where sexe='M'"));
$nbf= mysql_fetch_array(mysql_query ("SELECT COUNT(sexe) FROM stagiaire where sexe='F'"));
$datay = array($nbf[0],$nbh[0]);


$datax=array("Femmes","Hommes");
// Setup the graph. 
$graph = new Graph(350,150,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(30,15,25,25);

$graph->title->Set("Hommes/Femmes");
$graph->title->SetColor('darkred');
// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,7);
$graph->yaxis->SetFont(FF_FONT1);
$graph->xaxis->SetTickLabels($datax);
// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.4);
// Setup color for gradient fill style 
//$bplot->SetFillGradient("navy","lightsteelblue",GRAD_MIDVER);
// Set color for the frame of each bar
$bplot->SetFillColor(array("pink","blue"));
$bplot->SetShadow();
$bplot->SetColor("navy");
$graph->Add($bplot);


$filrrr="graphiques/graphsesb.jpg";
if($xxemp[0]!=0){
unlink($filrrr);
$graph->Stroke("graphiques/graphsesb.jpg");
echo("<center><img src=graphiques/graphsesb.jpg width=500></center>");
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