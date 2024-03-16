<?php
    
    require_once '../model/UserDao.php';
    require_once '../class/Users.php';
    //create user
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        
        $newModel = new UserDaoImpl();
        // be sure the interface is used
        if ($newModel instanceof UserDao) {
            $newUser = new User($_POST['firstname'],$_POST['lastname'],$_POST['age']);
            //Database transaction
            $newModel->createUser($newUser);
        }

        
        
             
    }

    //read user
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['operations'] === 'read') {
        $newModel = new UserDaoImpl();
        // be sure the interface is used
        if ($newModel instanceof UserDao) {
            //Database transaction
            $listOfUsers = $newModel->readUser();
            header("Content-Type: application/json");
            echo json_encode($listOfUsers);
        }
    }

    //update user
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['operations'] === 'update') {
        
    }

    //delete user
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['operations'] === 'delete') {
        
    }
?>