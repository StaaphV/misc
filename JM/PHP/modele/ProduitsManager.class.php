<?php

	class ProduitsManager{

		public static function add(Produits $objet){
			$db = DbConnect::getDb();
			$requete = $db->prepare("INSERT INTO produits (idProduit,nomProduit,prixProduit,imageProduit,descProduit,stockProduit) VALUES (:idProduit,:nomProduit,:prixProduit,:imageProduit,:descProduit,:stockProduit)");
			$requete->bindValue(":idProduit", $objet->getIdProduit());
			$requete->bindValue(":nomProduit", $objet->getNomProduit());
			$requete->bindValue(":prixProduit", $objet->getPrixProduit());
			$requete->bindValue(":imageProduit", $objet->getImageProduit());
			$requete->bindValue(":descProduit", $objet->getDescProduit());
			$requete->bindValue(":stockProduit", $objet->getStockProduit());
			$requete->execute();
		}

		public static function update(Produits $objet){
			$db = DbConnect::getDb();
			$requete = $db->prepare("UPDATE produits SET idProduit=:idProduit,nomProduit=:nomProduit,prixProduit=:prixProduit,imageProduit=:imageProduit,descProduit=:descProduit,stockProduit=:stockProduit WHERE idProduit=:idProduit");
			$requete->bindValue(":idProduit", $objet->getIdProduit());
			$requete->bindValue(":nomProduit", $objet->getNomProduit());
			$requete->bindValue(":prixProduit", $objet->getPrixProduit());
			$requete->bindValue(":imageProduit", $objet->getImageProduit());
			$requete->bindValue(":descProduit", $objet->getDescProduit());
			$requete->bindValue(":stockProduit", $objet->getStockProduit());
			$requete->execute();
		}

		public static function delete(Produits $objet){
			$db = DbConnect::getDb();
			$db->exec("DELETE FROM produits WHERE idProduit=".$objet->getIdProduit());
		}

		public static function findById($id){
			$db = DbConnect::getDb();
			$id = (int) $id;
			$requete = $db->query("SELECT * FROM produits WHERE idProduit =".$id);
			$resultats = $requete->fetch(PDO::FETCH_ASSOC);
			if ($resultats <> false){
				return new Produits($resultats);
			}
			else{
				return false;
			}
		}

		public static function getList(){
			$db = DbConnect::getDb();
			$liste = [];
			$requete = $db->query("SELECT * FROM produits");
			while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)){
				if ($donnees <> false){
					$liste[] = new Produits($donnees);
				}
			}return $liste;
		}

	}