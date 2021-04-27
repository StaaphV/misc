<?php

	class PaniersManager{

		public static function add(Paniers $objet){
			$db = DbConnect::getDb();
			$requete = $db->prepare("INSERT INTO paniers (idPanier,idProduit,qteProduit) VALUES (:idPanier,:idProduit,:qteProduit)");
			$requete->bindValue(":idPanier", $objet->getIdPanier());
			$requete->bindValue(":idProduit", $objet->getIdProduit());
			$requete->bindValue(":qteProduit", $objet->getQteProduit());
			$requete->execute();
		}

		public static function update(Paniers $objet){
			$db = DbConnect::getDb();
			$requete = $db->prepare("UPDATE paniers SET idPanier=:idPanier,idProduit=:idProduit,qteProduit=:qteProduit WHERE idPanier=:idPanier");
			$requete->bindValue(":idPanier", $objet->getIdPanier());
			$requete->bindValue(":idProduit", $objet->getIdProduit());
			$requete->bindValue(":qteProduit", $objet->getQteProduit());
			$requete->execute();
		}

		public static function delete(Paniers $objet){
			$db = DbConnect::getDb();
			$db->exec("DELETE FROM paniers WHERE idPanier=".$objet->getIdPanier());
		}

		public static function findById($id){
			$db = DbConnect::getDb();
			$id = (int) $id;
			$requete = $db->query("SELECT * FROM paniers WHERE idPanier =".$id);
			$resultats = $requete->fetch(PDO::FETCH_ASSOC);
			if ($resultats <> false){
				return new Paniers($resultats);
			}
			else{
				return false;
			}
		}

		public static function getList(){
			$db = DbConnect::getDb();
			$liste = [];
			$requete = $db->query("SELECT * FROM paniers");
			while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)){
				if ($donnees <> false){
					$liste[] = new Paniers($donnees);
				}
			}return $liste;
		}

	}