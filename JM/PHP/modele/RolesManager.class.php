<?php

	class RolesManager{

		public static function add(Roles $objet){
			$db = DbConnect::getDb();
			$requete = $db->prepare("INSERT INTO roles (idRole,nomRole) VALUES (:idRole,:nomRole)");
			$requete->bindValue(":idRole", $objet->getIdRole());
			$requete->bindValue(":nomRole", $objet->getNomRole());
			$requete->execute();
		}

		public static function update(Roles $objet){
			$db = DbConnect::getDb();
			$requete = $db->prepare("UPDATE roles SET idRole=:idRole,nomRole=:nomRole WHERE idRole=:idRole");
			$requete->bindValue(":idRole", $objet->getIdRole());
			$requete->bindValue(":nomRole", $objet->getNomRole());
			$requete->execute();
		}

		public static function delete(Roles $objet){
			$db = DbConnect::getDb();
			$db->exec("DELETE FROM roles WHERE idRole=".$objet->getIdRole());
		}

		public static function findById($id){
			$db = DbConnect::getDb();
			$id = (int) $id;
			$requete = $db->query("SELECT * FROM roles WHERE idRole =".$id);
			$resultats = $requete->fetch(PDO::FETCH_ASSOC);
			if ($resultats <> false){
				return new Roles($resultats);
			}
			else{
				return false;
			}
		}

		public static function getList(){
			$db = DbConnect::getDb();
			$liste = [];
			$requete = $db->query("SELECT * FROM roles");
			while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)){
				if ($donnees <> false){
					$liste[] = new Roles($donnees);
				}
			}return $liste;
		}

	}