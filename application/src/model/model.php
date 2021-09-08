<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all tasks from database
     */
    public function getAllTasks($offset, $limit, $sort_name, $sort_dir)
    {
        $sql = "SELECT id, name, email, task, is_done, is_admin_update FROM tasks ORDER BY $sort_name $sort_dir LIMIT $limit OFFSET $offset";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * 
     */
    public function addTask($name, $email, $task, $is_done)
    {
        $sql = "INSERT INTO tasks (name, email, task, is_done) VALUES (:name, :email, :task , :is_done)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':email' => $email, ':task' => $task, ':is_done' => $is_done);

        $query->execute($parameters);
    }

    /**
     * 
     */
    public function deleteTask($task_id)
    {
        $sql = "DELETE FROM tasks WHERE id = :task_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':task_id' => $task_id);


        $query->execute($parameters);
    }

    /**
     * Get 
     */
    public function getTask($task_id)
    {
        $sql = "SELECT id, name, email, task, is_done, is_admin_update FROM tasks WHERE id = :task_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':task_id' => $task_id);

        
        $query->execute($parameters);

        return $query->fetch();
    }

    
    public function updateTask($task, $task_id, $is_admin_update, $is_done)
    {
        $sql = "UPDATE tasks SET task = :task, is_admin_update = :is_admin_update, is_done = :is_done WHERE id = :task_id";
        $query = $this->db->prepare($sql);
        $parameters = array( ':task' => $task, ':task_id' => $task_id, ':is_admin_update' => $is_admin_update, ':is_done' => $is_done);

        $query->execute($parameters);
    }

    /**
    *
     */
    public function getAmountOfTasks()
    {
        $sql = "SELECT COUNT(id) AS amount_of_tasks FROM tasks";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_tasks;
    }
}
