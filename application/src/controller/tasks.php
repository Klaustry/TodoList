<?php

/**
 *
 */
class Tasks extends Controller
{

    public $current_page = 1;
    
    public $sort = array();
    
    public function index($current_page=0)
    {
        $pages = $this->model->getAmountOfTasks() / RECORDS_PER_PAGE;

        $sort_name = isset($_SESSION['sort_name']) ? $_SESSION['sort_name'] : 'id';
        $sort_dir = isset($_SESSION['sort_dir']) ? $_SESSION['sort_dir'] : 'ASC';

        $tasks = $this->model->getAllTasks($current_page *  RECORDS_PER_PAGE, RECORDS_PER_PAGE, $sort_name, $sort_dir);

        $saved_page = (isset($_SESSION['page']) && $_SESSION['page'] < $pages) 
                    ? $_SESSION['page'] = $current_page : $_SESSION['page'] = 0;
        
        $logged = $this->authCheck();
        
        $notify = isset($_SESSION['notify']) ? $_SESSION['notify'] : '';
        $_SESSION['notify'] = '';
        //var_dump($notify);

        require APP . 'view/_templates/header.php';
        require APP . 'view/tasks/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addTask()
    {
        
        
        // if we have POST data to create a new task entry
        if (isset($_POST["submit_add_task"])) {
        
            $is_done = ($_POST["is_done"]) ? true : false;

            $this->model->addTask($_POST["name"], $_POST["email"], $_POST["task"], $is_done);
        }

        $_SESSION['notify'] = 'Запись успешно добавлена!';
        
        $count = $this->model->getAmountOfTasks();
        
        $last_page = floor ($count / RECORDS_PER_PAGE);
        if($count % RECORDS_PER_PAGE == 0) $last_page--;
    
        header('location: ' . URL . 'tasks/index/'.$last_page);
        

    }

    public function editTask($task_id)
    {
        // if we have an id of a task that should be edited
        if (isset($task_id)) {
            // do get in model/model.php
            $task = $this->model->getTask($task_id);

            require APP . 'view/_templates/header.php';
            require APP . 'view/tasks/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {

            // redirect
            header('location: ' . URL . 'tasks/index/'.$_SESSION['page']);
        }
    }
    
    public function updateTask()
    {
        if ($this->authCheck()){

            if (isset($_POST["submit_update_task"])) {
                
                $is_admin_update = ($_POST["old_task"] != $_POST["task"] || $_POST["is_admin_update"]) ? true : false;
                $is_done = ($_POST["is_done"]) ? true : false; 

                $this->model->updateTask($_POST["task"], $_POST['task_id'], $is_admin_update, $is_done);
                
                $_SESSION['notify'] = 'Запись успешно изменена администратором!';
                header('location: ' . URL . 'tasks/index/'.$_SESSION['page']);
            }

        
        } else
        header('location: ' . URL . 'auth/index');
    }

    public function authCheck()
    {
         return (isset($_SESSION['hash']) == SALT.ADMIN_PASSWORD) ? $_SESSION['user'] : false;
    }

    public function sort($params)
    {
        $name = ''; 
        $dir = '';
        switch ($params) {
            case '1':
                $name = 'name';
                 $dir = 'asc';
                break;
            case '2':
                $name = 'name';
                $dir = 'desc';
                break;    
            case '3':
                $name = 'email';
                $dir = 'asc';
                break;
            case '4':
                $name = 'email';
                $dir = 'desc';
                break; 
            case '3':
                $name = 'task';
                $dir = 'asc';
                break;
            case '4':
                $name = 'task';
                $dir = 'desc';
                break; 
                default:
                $name = 'id';
                $dir = 'asc';
                break;
        }

        $_SESSION['sort_name'] = $name;
        $_SESSION['sort_dir'] = $dir;
         
        
        header('location: ' . URL . 'tasks/index/'.$_SESSION['page']);
        
    }


}
