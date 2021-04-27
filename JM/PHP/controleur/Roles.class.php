<?php

	class Roles{

		/* ****************Attributs***************** */

		private $_idRole;
		private $_nomRole;
		
		/* ****************Accesseurs***************** */
		
		public function setIdRole($_idRole){
			$this->_idRole = $_idRole;
		}

		public function getIdRole(){
			return $this->_idRole;
		}

		public function setNomRole($_nomRole){
			$this->_nomRole = $_nomRole;
		}

		public function getNomRole(){
			return $this->_nomRole;
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