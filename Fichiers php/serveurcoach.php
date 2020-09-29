<?php

include "fonctions.php";

print ("début%");

//Contrôle de réception de paramètres
if(isset($_REQUEST["operation"])){
	
	//Demande de récupération du dernier profil
	if($_REQUEST["operation"] == "enreg"){
		
		print ("Je passe dans enreg");
		
	}
}

?>