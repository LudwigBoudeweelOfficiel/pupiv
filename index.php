<?php
session_start();
$_SESSION['user'];
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pupiv', 'root','', array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
    
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


// Heures
$heures = $bdd->query('SELECT * FROM heures ORDER BY Ordre ASC');

// Heures
$user = $bdd->query('SELECT * FROM users WHERE Identifiant="'.$_SESSION['user'].'"');
$duser = $user->fetch();

// Paramètres : semaine en cours
$semaineencours = $bdd->query('SELECT * FROM parametres WHERE NomParam="SemaineEnCours"');
$dsemaineencours = $semaineencours->fetch();
?>
<html>
	<head>
		<title>Reserver</title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	
	
	<body>
	
		<h1 class="hello">Bonjour <?php echo $duser['Prenom']?></h1>
		
		<div class="flex-container">
			<div onclick="window.location.href='salle.php?nomsalle=pupitre2&semaine=<?php echo $dsemaineencours['Valeur']?>'"><img src="ordi.png"/></br>pupitre 2</div>
			<div onclick="window.location.href='salle.php?nomsalle=pupitre1&semaine=<?php echo $dsemaineencours['Valeur']?>'"><img src="ordi.png"/></br> pupitre 1</div>
			<div onclick="window.location.href='salle.php?nomsalle=BIMGC&semaine=<?php echo $dsemaineencours['Valeur']?>'"><img src="ordi.png"/></br> BIM GC</div>
			<div onclick="window.location.href='salle.php?nomsalle=BIMFinition&semaine=<?php echo $dsemaineencours['Valeur']?>'"><img src="ordi.png"/></br> BIM Finition</div>
			<div onclick="window.location.href='salle.php?nomsalle=TOPO&semaine=<?php echo $dsemaineencours['Valeur']?>'"><img src="ordi.png"/></br> TOPO</div>
			<div onclick="window.location.href='salle.php?nomsalle=BureauEtude2&semaine=<?php echo $dsemaineencours['Valeur']?>'"><img src="ordi.png"/></br> Bureau Etude 2</div>
			<div onclick="window.location.href='salle.php?nomsalle=Annexe1ET&semaine=<?php echo $dsemaineencours['Valeur']?>'"><img src="ordi.png"/></br> Annexe 1er étage</div>
		</div>
		
		
		<h1 class="hello">Ou rechercher directement une disponibilité </h1>
		<p id="alert" style="text-align:center;font-size:22px;color:red"></p>
		<div class="flex-container">
			<label class="space"> pour </label>
			<input id="nbeleve" onchange="verif_qt()" class="space input" style="width:100px" type="number" />
			<label class="space"> élèves le</label>
			<input class="space input" type="date" />
			<button onclick="showHint()">Voir les disponibilités</button>
		</div>
		
		
		
		<p class="fflex-container" id="resultsearch">en attente d'une information...</p>
	
		<script>
		function showHint() {
        var str = "search";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("resultsearch").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "dispo.php?q=" + str, true);
        xmlhttp.send();
    }

		
		function verif_qt(){
			let qteleve = document.getElementById("nbeleve").value;
			if(qteleve>17){
				document.getElementById("alert").style.display ="block";
				document.getElementById("alert").innerHTML ="le nombre d'élèves ne peut dépasser 17";
			}
			else{
				document.getElementById("alert").style.display ="none";
			}
		}
		
		function abc(a){
			// let text = this.getAttribute("debut");
			let x = a.getAttribute("debut");
			let y = a.getAttribute("fin");
			document.getElementById("resultat").innerHTML = x+" "+y;
		}
		</script>
	
		<!--<section class="div_left">
		<?php
		while($dheures = $heures->fetch()){
		?>
			<section onclick="abc(this)" debut="<?php echo $dheures['De']?>" fin="<?php echo $dheures['A']?>" style="width:100%;height:50px;border:1px solid black;background-color:<?php echo $dheures['Background']?>;cursor:pointer" class="heure" >
				<p style="text-align:center"><?php echo $dheures['De']."-".$dheures['A']?></p>
			</section>
		<?php
		}
		?>
		<p id="resultat"></p>
		</section>-->
	
	</body>
</html>