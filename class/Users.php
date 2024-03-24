<?php

class User
    {
        private $firstname;
        private $lastname;
        private $age;
        private $id;
        
        function __construct(string $firstname,string $lastname,string $age, int $id=null)
        {
            if (is_null($id)) {
                # code...
                $this->firstname = $firstname;
                $this->lastname = $lastname;
                $this->age = $age;
            }else{
                $this->firstname = $firstname;
                $this->lastname = $lastname;
                $this->age = $age;
                $this->id = $id;
            }
           
            
        }

        function getId(){
            return $this->id;
        }
        function getFirstname(){
            return $this->firstname;
        }
        function getLastname(){
            return $this->lastname;
        }
        function getAge(){
            return $this->age;
        }
    }

?>