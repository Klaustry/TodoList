<?php

//namespace App;

//use App\Core\Router;

/**
 * Class Auth
 */
class Auth extends Controller
{

    public function index()
    {
        $notify = isset($_SESSION['notify']) ? $_SESSION['notify'] : '';
        $_SESSION['notify'] = '';
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/auth/login.php';
        require APP . 'view/_templates/footer.php';
    }

    public function login()
    {
        if (isset($_POST["login_action"])) 
            {
                var_dump($_POST);
                $login = trim($_POST['login']); 
                $password = md5(trim($_POST['password']));   
                if ($login == ADMIN_LOGIN && $password == ADMIN_PASSWORD) { 
                
                        $_SESSION['hash'] = SALT.ADMIN_PASSWORD;
                        $_SESSION['user'] = $login;
                        
                        $_SESSION['notify'] = 'Вы вошли как - Администратор!';
                        header('location: ' . URL . 'tasks/index/'.$_SESSION['page']);
                } else {
  
                $_SESSION['notify'] = 'Логин и/или пароль неверный. Попробуйте еще раз!';        
                header('location: ' . URL . 'auth/index');
                }
            }

             
        
    }
    
    public function logout()
    {
        $_SESSION['hash'] = '';
        $_SESSION['user'] = '';

        $_SESSION['notify'] = 'Вы вышли из системы!';

        header('location: ' . URL . 'tasks/index/'.$_SESSION['page']);
    }

}
