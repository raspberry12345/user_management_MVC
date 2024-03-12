<?php
    
    require_once '../model/UserDao.php';
    require_once '../class/Users.php';
    //create user
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $newUser = new User($_POST['firstname'],$_POST['lastname'],$_POST['age']);
        $newModel = new UserDaoImpl();

        //Database transaction
        $newModel->createUser($newUser);
             
    }

    //read user
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $newModel = new UserDaoImpl();

        //Database transaction
        $listOfUsers = $newModel->readUser();
        header("Content-Type: application/json");
        echo json_encode($listOfUsers);
    }

    //update user
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        
    }

    //delete user
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        
    }
?>