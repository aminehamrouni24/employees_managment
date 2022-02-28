<html>
<head>
<title>
</title>
<?php
function verif($x,$y)
{
	if (($x=="")&&($y==""))
	{
	header('Location: erreur.php?v=0');
	}
	else
	{
		$requet="SELECT * FROM employe";
		$result = mysql_query($requet);  
		$test="false";
		while(($test=="false")&&($ligne = mysql_fetch_array($result)))
			{
				if(($x==$ligne[2])&&($y==$ligne[3]))
				{
					echo('bienvenue '.$ligne[1]);
					$test="true";
					
				    header('Location: inde.php?id='.$ligne[0].'');
				}
			}
		if($test=="false")
		{
			header('Location: erreur.php?v=1');
		}
	}
	
	



}
?>
</head>
<body>

<?php

$res=mysql_connect('localhost','root','');
$res2=mysql_select_db('gestemploye');
$x=$_POST['t1'];
$y=$_POST['t2'];
verif($x,$y);
?>


</body>
</html>