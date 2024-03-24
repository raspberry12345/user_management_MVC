<?php
    interface UserDao{
        function createUser(User $user);
        function readUser():array;
        function updateUser(User $userUpdate);
        function deleteUser(int $userId);
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

    function updateUser(User $userUpdate){
        require_once '../connectDb.php';
        $stmt = $pdo->prepare('SELECT * FROM `users` Where `id`=:userId');
        $stmt->bindValue(':userId', $userUpdate->getId());
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //check if input is empty string take value from db
        if ($userUpdate->getFirstname() === "") {
            $firstname = $user[0]['firstname'];
        }else{
            $firstname = $userUpdate->getFirstname();
        }
        if ($userUpdate->getLastname() === "") {
            $lastname = $user[0]['lastname'];
        }else{
            $lastname = $userUpdate->getLastname();
        }
        if ($userUpdate->getAge() === "") {
            $age = $user[0]['age'];
        }else{
            $age = $userUpdate->getAge();
        }

        $sqlQuery = "UPDATE users SET `firstname`= :firstname, `lastname`= :lastname, `age`= :age WHERE `id`= :userId";
    
   
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':lastname', $lastname);
        $stmt->bindValue(':age', $age);
        $stmt->bindValue(':userId', $userUpdate->getId());
            
            $stmt->execute();

    }

    function deleteUser(int $userId){
        require_once '../connectDb.php';
        
        $stmt = $pdo->prepare('DELETE FROM `users` WHERE `id`=:userId');
        $stmt->bindValue(':userId', $userId);
        $stmt->execute();
        
    }
}

    

?>