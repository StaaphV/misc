<?php

	class Produits{

		/* ****************Attributs***************** */

		private $_idProduit;
		private $_nomProduit;
		private $_prixProduit;
		private $_imageProduit;
		private $_descProduit;
		private $_stockProduit;
		
		/* ****************Accesseurs***************** */
		
		public function setIdProduit($_idProduit){
			$this->_idProduit = $_idProduit;
		}

		public function getIdProduit(){
			return $this->_idProduit;
		}

		public function setNomProduit($_nomProduit){
			$this->_nomProduit = $_nomProduit;
		}

		public function getNomProduit(){
			return $this->_nomProduit;
		}

		public function setPrixProduit($_prixProduit){
			$this->_prixProduit = $_prixProduit;
		}

		public function getPrixProduit(){
			return $this->_prixProduit;
		}

		public function setImageProduit($_imageProduit){
			$this->_imageProduit = $_imageProduit;
		}

		public function getImageProduit(){
			return $this->_imageProduit;
		}

		public function setDescProduit($_descProduit){
			$this->_descProduit = $_descProduit;
		}

		public function getDescProduit(){
			return $this->_descProduit;
		}

		public function setStockProduit($_stockProduit){
			$this->_stockProduit = $_stockProduit;
		}

		public function getStockProduit(){
			return $this->_stockProduit;
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