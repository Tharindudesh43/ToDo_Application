<?php 

class Tasks{
    public $connection;

    public function __construct(){
            $this->connection = mysqli_connect("localhost", "root", "", "todo_db");
            if(!$this->connection){
                die("Server error !");
            }
    }

    public function getSpecificUserDetails($copymail)
    {
        $tasks=null;
        $connection = mysqli_connect("localhost", "root", "", "todo_db");
        $query = "SELECT t1.`email`, t1.`gender`, t2.`id`, t2.`description` , t2.`date` FROM `todo_users` t1 INNER JOIN `todo_users_data` t2 ON t1.`email` = t2.`email` WHERE t2.`email` ='$copymail'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            //die("Fail to retrieve data !");
        }
        else{
            while ($row = mysqli_fetch_assoc($result)) {
                $tasks[] = $row;
            }
        return $tasks;
        }
    }

}
?>