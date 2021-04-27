<?php

	class UtilisateursManager{

		public static function add(Utilisateurs $objet){
			$db = DbConnect::getDb();
			$objet->setMdpUtilisateur(crypter($objet->getMdpUtilisateur()));
			$requete = $db->prepare("INSERT INTO utilisateurs (pseudoUtilisateur,mdpUtilisateur,mailUtilisateur,nomUtilisateur,prenomUtilisateur,adresseUtilisateur,telUtilisateur,idRole,idPanier) VALUES (:pseudoUtilisateur,:mdpUtilisateur,:mailUtilisateur,:nomUtilisateur,:prenomUtilisateur,:adresseUtilisateur,:telUtilisateur,:idRole,:idPanier)");
			$requete->bindValue(":pseudoUtilisateur", $objet->getPseudoUtilisateur());
			$requete->bindValue(":mdpUtilisateur", $objet->getMdpUtilisateur());
			$requete->bindValue(":mailUtilisateur", $objet->getMailUtilisateur());
			$requete->bindValue(":nomUtilisateur", $objet->getNomUtilisateur());
			$requete->bindValue(":prenomUtilisateur", $objet->getPrenomUtilisateur());
			$requete->bindValue(":adresseUtilisateur", $objet->getAdresseUtilisateur());
			$requete->bindValue(":telUtilisateur", $objet->getTelUtilisateur());
			$requete->bindValue(":idRole", $objet->getIdRole());
			$requete->bindValue(":idPanier", $objet->getIdPanier());
			$requete->execute();
		}

		public static function update(Utilisateurs $objet){
			$db = DbConnect::getDb();
			$objet->setMdpUtilisateur(crypter($objet->getMdpUtilisateur()));
			$requete = $db->prepare("UPDATE utilisateurs SET pseudoUtilisateur=:pseudoUtilisateur,mdpUtilisateur=:mdpUtilisateur,mailUtilisateur=:mailUtilisateur,nomUtilisateur=:nomUtilisateur,prenomUtilisateur=:prenomUtilisateur,adresseUtilisateur=:adresseUtilisateur,telUtilisateur=:telUtilisateur,idRole=:idRole,idPanier=:idPanier WHERE idUtilisateur=:idUtilisateur");
			$requete->bindValue(":pseudoUtilisateur", $objet->getPseudoUtilisateur());
			$requete->bindValue(":mdpUtilisateur", $objet->getMdpUtilisateur());
			$requete->bindValue(":mailUtilisateur", $objet->getMailUtilisateur());
			$requete->bindValue(":nomUtilisateur", $objet->getNomUtilisateur());
			$requete->bindValue(":prenomUtilisateur", $objet->getPrenomUtilisateur());
			$requete->bindValue(":adresseUtilisateur", $objet->getAdresseUtilisateur());
			$requete->bindValue(":telUtilisateur", $objet->getTelUtilisateur());
			$requete->bindValue(":idRole", $objet->getIdRole());
			$requete->bindValue(":idPanier", $objet->getIdPanier());
			$requete->execute();
		}

		public static function delete(Utilisateurs $objet){
			$db = DbConnect::getDb();
			$db->exec("DELETE FROM utilisateurs WHERE idUtilisateur=".$objet->getIdUtilisateur());
		}

		public static function findById($id){
			$db = DbConnect::getDb();
			$id = (int) $id;
			$requete = $db->query("SELECT * FROM utilisateurs WHERE idUtilisateur =".$id);
			$resultats = $requete->fetch(PDO::FETCH_ASSOC);
			if ($resultats <> false){
				return new Utilisateurs($resultats);
			}
			else{
				return false;
			}
		}

		public static function getList(){
			$db = DbConnect::getDb();
			$liste = [];
			$requete = $db->query("SELECT * FROM utilisateurs");
			while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)){
				if ($donnees <> false){
					$liste[] = new Utilisateurs($donnees);
				}
			}return $liste;
		}

		public static function findByPseudo($pseudo){
            $db = DbConnect::getDb();
            if (!strstr($pseudo,";")){
                $requete = $db->query("SELECT * FROM utilisateurs WHERE pseudoUtilisateur ='" . $pseudo . "'");
                $resultats = $requete->fetch(PDO::FETCH_ASSOC);
                if ($resultats != false){
                    return new Utilisateurs($resultats);
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }

	}