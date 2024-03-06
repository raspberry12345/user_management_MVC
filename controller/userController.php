<?php
    require_once '../connectDb.php';
    require_once '../classes/User.php';
    //create user
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newUser = new User($_POST['firstname'],$_POST['lastname'],$_POST['age']);
        $stmt = $pdo->prepare('INSERT INTO `users` (`firstname`, `lastname`, `age`) VALUES (:firstname, :lastname, :age)');
        $stmt->bindValue(':firstname', $newUser->getFirstname());
        $stmt->bindValue(':lastname', $newUser->getLastname());
        $stmt->bindValue(':age', $newUser->getAge());
        $stmt->execute();      
    }

    //read user
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo $_POST['firstname'];
    }

    //update user
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo $_POST['firstname'];
    }

    //delete user
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo $_POST['firstname'];
    }
?>