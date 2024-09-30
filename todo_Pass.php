<?php
include('DatabaseConnection.php');

class Todo_list_pass{
    public $email;

    public $description;

    public $date;
    public $connection;

    public $id;

    // public function connectionETB($connection){
    //     $this->connection = $connection;
    // }

    public function setemail($email) {
        $this->email = $email;
    }
    public function settext($description) {  
        $this->description = $description;
    }

    public function setdate($date) {
        $this->date = $date;
    }
    public function insert_task(){  
        if (empty($this->email) || empty($this->description)) {
            echo '<script>alert("FILL ALL THE FIELDS")</script>';
            // die("All fields are required");
            //return header('location:Register.php?error="All fields are required!"');
        }
        $db = new DatabaseConnection("localhost", "root", "", "todo_db");
        $conn = $db->getConnection();
 
        $query = "insert into `todo_users_data` (`description` ,`email` , `date`) values ('$this->description','$this->email','$this->date')";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo '<script>alert("FAILED TO ADD Task")</script>';
            //return header('location:Register.php?error="Failed to add student!"');
        }
        //echo '<script>alert("Added SUCCESSFULL !")</script>';
       // return header('location:Register.php?success="Student added successfully!"');
    }

}
?>