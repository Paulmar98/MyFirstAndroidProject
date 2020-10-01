<?php 

include "fonctions.php";

if(isset($_REQUEST["operation"])){
	
	if($_REQUEST["operation"] == "dernier"){
		
		//print ("Je passe dans dernier%");
		
		try {
			
			print ("dernier%");
			
			$cnx = connexionPDO();
			$req = $cnx->prepare("select * from profil order by datemesure desc");
			$req->execute();
			
			if($ligne = $req->fetch(PDO::FETCH_ASSOC)){
				
				print(json_encode($ligne));
			}
			
			else {
				print ("pas de profil");
			}
			
			
		}catch (PDOException $e) {
			
			print "Erreur !%".$e->getMessage();
			die();			
		}
	}
	
	if($_REQUEST["operation"] == "enreg"){
		
		print ("enreg%");
		
		try{			
			
			//Recuperation des donnees en post
			$lesdonnees = $_REQUEST["lesdonnees"];
			$donnee = json_decode($lesdonnees);
			$datemesure = $donnee[0];
			$poids = $donnee[1];
			$taille = $donnee[2];
			$age = $donnee[3];
			$sexe = $donnee[4];
			
			//Insertion dans la base de donnée
			
			$cnx = connexionPDO();
			
			$larequette = "insert into profil (datemesure, poids, taille, age, sexe)";
			//$larequette .= "values (\"$datemesure\", $poids, $taille, $age, $sexe)";
			$larequette .= "values (NOW(), $poids, $taille, $age, $sexe)";
			
			print ($larequette);
			
			$req = $cnx->prepare($larequette);
			$req->execute();
			
			print ("FIN");
		
		}catch (PDOException $e) {
			
			print "Erreur !%".$e->getMessage();
			die();
			
		}
	}
	
}

?>
