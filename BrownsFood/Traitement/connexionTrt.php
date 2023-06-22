<?php
session_start();

//Connexion à la bdd
require_once('Connexion.php');
$bdd=connectDB();

	// si 'connexion' existe executer le code suivant.. 
	if (isset($_POST['login'])) {

		//if (isset($_POST['submit'])) {

		// Si 'login' et mdp sont différents de vide...
		if (!empty($_POST['USER']) AND !empty($_POST['MDP'])) {
			// assignation des variable login et mdp
			$login = htmlspecialchars($_POST['USER']);
			$mdp = htmlspecialchars($_POST['MDP']);
			echo "$login $mdp";
			// verification que le login et le mdp existent dans la table utilisateur
			$req = $bdd->prepare("SELECT USER FROM compte WHERE USER = ? AND MDP = ? ");
			$req->execute([$login, $mdp]);
			$res = $req->rowCount();
			if ($res == 1) {
 				//assignation de la variable de session utilisateur
 				$tab=$req ->fetch(PDO::FETCH_ASSOC);
 				$_SESSION['USER']=$tab['USER'];	
				if(isset($_SESSION['USER'])){
					header("Location:../index.php");
					var_dump($_SESSION["USER"]);
				}
				else{
					echo "User not set";
				}
				
			}
		
				else{
					//Si le login et mdp ne correspondent pas retour vers la page connexion
					//header("refresh: 2 url=connexion.php ");
					echo "<center><h1>Login ou mot de passe incorect !</h1></center>";
				}
			}
			
		//}
		// Si les input login et mdp sont vide retour vers la page connexion
		else{
			header("Location: ../index.php");
		}
	}


?>