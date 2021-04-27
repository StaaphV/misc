<?php

	class CategoriesManager{

		public static function add(Categories $objet){
			$db = DbConnect::getDb();
			$requete = $db->prepare("INSERT INTO categories (idCategorie,nomCategorie) VALUES (:idCategorie,:nomCategorie)");
			$requete->bindValue(":idCategorie", $objet->getIdCategorie());
			$requete->bindValue(":nomCategorie", $objet->getNomCategorie());
			$requete->execute();
		}

		public static function update(Categories $objet){
			$db = DbConnect::getDb();
			$requete = $db->prepare("UPDATE categories SET idCategorie=:idCategorie,nomCategorie=:nomCategorie WHERE idCategorie=:idCategorie");
			$requete->bindValue(":idCategorie", $objet->getIdCategorie());
			$requete->bindValue(":nomCategorie", $objet->getNomCategorie());
			$requete->execute();
		}

		public static function delete(Categories $objet){
			$db = DbConnect::getDb();
			$db->exec("DELETE FROM categories WHERE idCategorie=".$objet->getIdCategorie());
		}

		public static function findById($id){
			$db = DbConnect::getDb();
			$id = (int) $id;
			$requete = $db->query("SELECT * FROM categories WHERE idCategorie =".$id);
			$resultats = $requete->fetch(PDO::FETCH_ASSOC);
			if ($resultats <> false){
				return new Categories($resultats);
			}
			else{
				return false;
			}
		}

		public static function getList(){
			$db = DbConnect::getDb();
			$liste = [];
			$requete = $db->query("SELECT * FROM categories");
			while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)){
				if ($donnees <> false){
					$liste[] = new Categories($donnees);
				}
			}return $liste;
		}

	}