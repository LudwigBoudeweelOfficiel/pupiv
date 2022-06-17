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
$user = $bdd->query('SELECT * FROM users WHERE Identifiant="'.$_SESSION['user'].'"');
$duser = $user->fetch();

// Recherches des creneaux
$creneau = $bdd->query('SELECT * FROM heures');
while($dcreneau = $creneau->fetch()){
	$heuredebut = $dcreneau['De'];
	$heurefin = $dcreneau['A'];
		// Voir si disponible
		// Compter si = 1
		// Et rechercher aussi selon les salles
		
		
		$salles = $bdd->query('SELECT * FROM salles');
		while($dsalles = $salles->fetch()){
			$lasalle = $dsalles['NomSalle'];
			$existcreneau = $bdd->query('SELECT count(*) as "dispo" FROM reservations WHERE Debut="'.$heuredebut.'" AND Fin="'.$heurefin.'" AND salle="'.$lasalle.'"');
			$dexistcreneau = $existcreneau->fetch();
		
		
			// Si la valeur dispo est 0 = aucune réservation, donc afficher
			// Si la valeur dispo est à 1 = une résservation est en cours
			if($dexistcreneau['dispo']=="0"){
				// echo "hd = ".$heuredebut;
				// echo "hf = ".$heurefin;
				// echo "libre de : ".$dcreneau['De']." à ".$dcreneau['A'];
				// echo "</br>";
			?>
				<section style="cursor:pointer;border-radius:15px;background-color:#01d28e;margin:15px;width:50%;height:auto;padding:15px;background-color:#01d28e;margin-left:auto;margin-right:auto;text-align:center;display:block">
					<h3>créneau libre de <?php echo $dcreneau['De']." à ".$dcreneau['A'] ?></h3>
					<p>salle <?php echo $lasalle ?></p>
				</section>
			<?php
		}
		}
}
?>