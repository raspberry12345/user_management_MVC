<?php

class User
    {
        private $firstname;
        private $lastname;
        private $age;
        
        function __construct(string $firstname,string $lastname,string $age)
        {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->age = $age;
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