<?php

	class Utilisateurs{

		/* ****************Attributs***************** */

		private $_idUtilisateur;
		private $_pseudoUtilisateur;
		private $_mdpUtilisateur;
		private $_mailUtilisateur;
		private $_nomUtilisateur;
		private $_prenomUtilisateur;
		private $_adresseUtilisateur;
		private $_telUtilisateur;
		private $_idRole;
		
		/* ****************Accesseurs***************** */

		public function setIdUtilisateur($idUtilisateur){
			$this->_idUtilisateur = $idUtilisateur;
		}

		public function getIdUtilisateur(){
			return $this->_idUtilisateur;
		}

		public function setPseudoUtilisateur($_pseudoUtilisateur){
			$this->_pseudoUtilisateur = $_pseudoUtilisateur;
		}

		public function getPseudoUtilisateur(){
			return $this->_pseudoUtilisateur;
		}

		public function setMdpUtilisateur($_mdpUtilisateur){
			$this->_mdpUtilisateur = $_mdpUtilisateur;
		}

		public function getMdpUtilisateur(){
			return $this->_mdpUtilisateur;
		}

		public function setMailUtilisateur($_mailUtilisateur){
			$this->_mailUtilisateur = $_mailUtilisateur;
		}

		public function getMailUtilisateur(){
			return $this->_mailUtilisateur;
		}

		public function setNomUtilisateur($_nomUtilisateur){
			$this->_nomUtilisateur = $_nomUtilisateur;
		}

		public function getNomUtilisateur(){
			return $this->_nomUtilisateur;
		}

		public function setPrenomUtilisateur($_prenomUtilisateur){
			$this->_prenomUtilisateur = $_prenomUtilisateur;
		}

		public function getPrenomUtilisateur(){
			return $this->_prenomUtilisateur;
		}

		public function setAdresseUtilisateur($_adresseUtilisateur){
			$this->_adresseUtilisateur = $_adresseUtilisateur;
		}

		public function getAdresseUtilisateur(){
			return $this->_adresseUtilisateur;
		}

		public function setTelUtilisateur($_telUtilisateur){
			$this->_telUtilisateur = $_telUtilisateur;
		}

		public function getTelUtilisateur(){
			return $this->_telUtilisateur;
		}

		public function setIdRole($_idRole){
			$this->_idRole = $_idRole;
		}

		public function getIdRole(){
			return $this->_idRole;
		}

		/* ****************Constructeur***************** */

		public function __construct(array $options = []){
        if (!empty($options)){
            $this->hydrate($options);
        }
        }

        public function hydrate($data){
            foreach ($data as $key => $value){
                $methode = "set" . ucfirst($key);
                if (is_callable(([$this, $methode]))){
                    $this->$methode($value);
                }
            }
        }
        
        /* ****************Autres Méthodes***************** */
        
        /**
         * Transforme l'objet en chaine de caractères
         *
         * @return String
         */
        public function toString(){
            return "";
        }

        /**
         * Renvoi vrai si l'objet en paramètre est égal à l'objet appelant
         *
         * @param [type] $obj
         * @return bool
         */
        public function equalsTo($obj){
            return true;
        }

        /**
         * Compare 2 objets
         * Renvoi 1 si le 1er est >
         *        0 si ils sont égaux
         *        -1 si le 1er est <
         *
         * @param [type] $obj1
         * @param [type] $obj2
         * @return void
         */

        public static function compareTo($obj1, $obj2){
            return 0;
        }
        


	}

?>