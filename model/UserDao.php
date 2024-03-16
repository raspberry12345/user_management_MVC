<?php
    interface UserDao{
        function createUser(User $user);
        function readUser():array;
        function updateUser();
        function deleteUser();
    }

    class UserDaoImpl implements UserDao
{
    
    function createUser(User $user){
        require_once '../connectDb.php';
        $stmt = $pdo->prepare('INSERT INTO `users` (`firstname`, `lastname`, `age`) VALUES (:firstname, :lastname, :age)');
        $stmt->bindValue(':firstname', $user->getFirstname());
        $stmt->bindValue(':lastname', $user->getLastname());
        $stmt->bindValue(':age', $user->getAge());
        $stmt->execute(); 
    }

    function readUser(): array {
        require_once '../connectDb.php';
        $stmt = $pdo->query('SELECT * FROM `users`');
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $userContainer = [];
        
        for ($i=0; $i < count($users); $i++) { 
            array_push($userContainer, (object)[
                'id' => $users[$i]['id'],
                'firstname' => $users[$i]['firstname'],
                'lastname' => $users[$i]['lastname'],
                'age' => $users[$i]['age'],
            ]);
        }
        
        
        return $userContainer;
    }

    function updateUser(){

    }

    function deleteUser(){
        
    }
}

    

?>