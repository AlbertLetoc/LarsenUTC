<?php
include_once ('./incl/UserInfo.class.php'); 

class UserController {
    public function loginAction() {
        if (isset($_SESSION['user'])) require_once 'index.php';
        else
        {
            $user = CAS::authenticate();
            if ($user != -1)
            {
                $_SESSION['user'] = $user;
                $_SESSION['ticket'] = $_GET['ticket'];
                $_SESSION['role'] = UserInfo::getRole($_SESSION['user']['cas:user'],"larsen");
                header('Location: ./');
            }
            else CAS::login();
        }
    }
    
    public function logoutAction() {
	    session_destroy();
        CAS::logout();
    }
}