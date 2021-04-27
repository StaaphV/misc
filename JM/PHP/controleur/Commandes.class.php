<?php

	class Commandes{

		/* ****************Attributs***************** */

		private $_idCommande;
		private $_idProduit;
		private $_qteProduit;
		private $_idUtilisateur;
		
		/* ****************Accesseurs***************** */
		
		public function setIdCommande($_idCommande){
			$this->_idCommande = $_idCommande;
		}

		public function getIdCommande(){
			return $this->_idCommande;
		}

		public function setIdProduit($_idProduit){
			$this->_idProduit = $_idProduit;
		}

		public function getIdProduit(){
			return $this->_idProduit;
		}

		public function setQteProduit($_qteProduit){
			$this->_qteProduit = $_qteProduit;
		}

		public function getQteProduit(){
			return $this->_qteProduit;
		}

		public function setIdUtilisateur($_idUtilisateur){
			$this->_idUtilisateur = $_idUtilisateur;
		}

		public function getIdUtilisateur(){
			return $this->_idUtilisateur;
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