<?php

	class CommandesManager{

		public static function add(Commandes $objet){
			$db = DbConnect::getDb();
			$requete = $db->prepare("INSERT INTO commandes (idCommande,idProduit,qteProduit,idUtilisateur) VALUES (:idCommande,:idProduit,:qteProduit,:idUtilisateur)");
			$requete->bindValue(":idCommande", $objet->getIdCommande());
			$requete->bindValue(":idProduit", $objet->getIdProduit());
			$requete->bindValue(":qteProduit", $objet->getQteProduit());
			$requete->bindValue(":idUtilisateur", $objet->getIdUtilisateur());
			$requete->execute();
		}

		public static function update(Commandes $objet){
			$db = DbConnect::getDb();
			$requete = $db->prepare("UPDATE commandes SET idCommande=:idCommande,idProduit=:idProduit,qteProduit=:qteProduit,idUtilisateur=:idUtilisateur WHERE idCommande=:idCommande");
			$requete->bindValue(":idCommande", $objet->getIdCommande());
			$requete->bindValue(":idProduit", $objet->getIdProduit());
			$requete->bindValue(":qteProduit", $objet->getQteProduit());
			$requete->bindValue(":idUtilisateur", $objet->getIdUtilisateur());
			$requete->execute();
		}

		public static function delete(Commandes $objet){
			$db = DbConnect::getDb();
			$db->exec("DELETE FROM commandes WHERE idCommande=".$objet->getIdCommande());
		}

		public static function findById($id){
			$db = DbConnect::getDb();
			$id = (int) $id;
			$requete = $db->query("SELECT * FROM commandes WHERE idCommande =".$id);
			$resultats = $requete->fetch(PDO::FETCH_ASSOC);
			if ($resultats <> false){
				return new Commandes($resultats);
			}
			else{
				return false;
			}
		}

		public static function getList(){
			$db = DbConnect::getDb();
			$liste = [];
			$requete = $db->query("SELECT * FROM commandes");
			while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)){
				if ($donnees <> false){
					$liste[] = new Commandes($donnees);
				}
			}return $liste;
		}

	}