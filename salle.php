<?php
ini_set("display_errors",1);
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
$aff_sem_restante = $dsemaineencours['Valeur']-1;
?>
<html>
	<head>
		<title>Reserver</title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	
	
	<body>
	
		<h1 class="hello">SALLE <?php echo $_GET['nomsalle']?></h1>
		
		<div class="flex-containersemaine">
		<?php
		// Semaines
		$semaines = $bdd->query('SELECT * FROM semaines WHERE NumSemaine>"'.$aff_sem_restante.'"');
		while($dsemaines = $semaines->fetch()){
		?>
			<div onclick="window.location.href='salle.php?nomsalle=<?php echo $_GET['nomsalle']?>&semaine=<?php echo $dsemaines['NumSemaine']?>'"><?php echo $dsemaines['NumSemaine']?></div>
		<?php
		}
		?>
		</div>
		
		
		
		
		<!-- Affichage du tableau -->
		
		<!-- recherche de la date -->
		<?php
		// Semaines
		$affdate = $bdd->query('SELECT * FROM semaines WHERE NumSemaine = "'.$_GET['semaine'].'"');
		$daffdate = $affdate->fetch();
		$day = 0 ;
		while($day < 5){
		?>
		<div class="flex-containersemaine">
			<div>
			<?php
				$jour = $daffdate['Du']; // Notre date par default
				$dec = date('Y-m-d', strtotime($jour. ' + '.$day.' days'));
				echo date('d', strtotime($jour. ' + '.$day.' days')); // On ajoute 1 jour
			?>
			</div>
			
			<!-- Créneaux -->
			<?php
		// Recherches des creneaux
$creneau = $bdd->query('SELECT * FROM heures');
while($dcreneau = $creneau->fetch()){
	$heuredebut = $dcreneau['De'];
	$heurefin = $dcreneau['A'];
		// Voir si disponible
		// Compter si = 1
		// Et rechercher aussi selon les salles


			$existcreneau = $bdd->query('SELECT count(*) as "dispo" FROM reservations WHERE Date = "'.$dec.'" AND Debut="'.$heuredebut.'" AND Fin="'.$heurefin.'" AND salle="'.$_GET['nomsalle'].'"');
			$dexistcreneau = $existcreneau->fetch();
			
			$existcreneau2 = $bdd->query('SELECT * FROM reservations WHERE Date = "'.$dec.'" AND Debut="'.$heuredebut.'" AND Fin="'.$heurefin.'" AND salle="'.$_GET['nomsalle'].'"');
			$dexistcreneau2 = $existcreneau2->fetch();
		
		
			
			
			// Si la valeur dispo est 0 = aucune réservation, donc afficher
			// Si la valeur dispo est à 1 = une résservation est en cours
			if($dexistcreneau['dispo']=="0"){
			?>
				<div style="background-color:#01d28e"><?php echo $heuredebut?></div>
			<?php
			?>
			
			<?php
			}
			
			if($dexistcreneau['dispo']=="1"){
			?>
				<div onclick="alert('salle occupée/reservée (<?php echo $heuredebut." ".$heurefin ?>) : <?php echo $dexistcreneau2['Prof']?>')" style="background-color:#ECAEAE"><?php echo $heuredebut?></div>
			<?php
			?>
			
			<?php
			}
}
		?>
		</div>
		<?php
		$day = $day+1;
		}
		?>
		
		
		
		
		
		
		

	
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