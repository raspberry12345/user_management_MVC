<?php
    interface UserDao{
        function createUser(User $user);
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
}

    

?>