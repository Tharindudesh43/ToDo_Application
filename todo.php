<?php
require("todo_Pass.php");
class Todo_list{
    
    private $id;
    private $email;
    private $name;   

    private $password;
    private $gender;
    private $connection;

    private $desc;
    
    public function __construct($connection){
        $this->connection = $connection;
    }

    public function getAlldatausers(){
        $query = "select * from `todo_users`";

        $result = mysqli_query($this->connection, $query);

        if (!$result) {
            die("Fail to retrieve data !");
        }

        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        return $users;
    }

    
    public function setId($id){
        $this->id = $id;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setDescription($desc){
        $this->desc = $desc;
    }
    
    public function setName($name){
        $this->name = $name;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setGender($gender){
        $this->gender = $gender;
    }


    public function insert(){
        if (empty($this->email) || empty($this->name) ||  empty($this->password)  ||  empty($this->gender)) {
            //echo '<script>alert("FILL ALL THE FIELDS")</script>';
            die('<center> <h6 opacity=0.4; style="color:red;"> *All fields are required  </h6> </center>');
            //return header('location:Register.php?error="All fields are required!"');
        }
        else{
            $query = "select * from `todo_users` where email = '$this->email'";
            $result = mysqli_query($this->connection, $query);
            
            if ($result->num_rows > 0) {
                echo '<script>alert("All ready added Email !")</script>';
            } 
            else {
                $query = "insert into `todo_users` ( `email`,  `password` ,`name` ,`gender`) values ('$this->email','$this->password' ,'$this->name','$this->gender')";
                $result = mysqli_query($this->connection, $query);
        
                if (!$result) {
                    echo '<script>alert("FAILED TO ADD USER")</script>';
                    //return header('location:Register.php?error="Failed to add student!"');
                }
                echo '<script>alert("REGISTRATION SUCCESSFULL !")</script>';
                echo "<script type='text/javascript'> window.location.href = 'todo_list_pass.php?email=$this->email&gender=$this->gender';</script>";
                $email="";
                $gender= "";
                // return header('location:Register.php?success="Student added successfully!"');
                }       
            };  
        }

    public function check(){
        if (empty($this->email) || empty($this->password)) {
            //echo '<script>alert("FILL ALL THE FIELDS")</script>';
            die('<center> <h6 opacity=0.4; style="color:red;"> *All fields are required  </h6> </center>');
            //return header('location:Register.php?error="All fields are required!"');
        }
        else{
            $query = "select * from `todo_users` where email = '$this->email' AND password = '$this->password'";
            $result = mysqli_query($this->connection, $query);
            
            if ($result->num_rows > 0) {
                echo '<script>alert(" FOUND A USER")</script>';
                $connection = mysqli_connect("localhost", "root", "", "todo_db");
                $gender_query = "select `gender` from `todo_users` where email='$this->email' AND password='$this->password'";
                $result = mysqli_query($connection, $gender_query);
                
                $tasks = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $tasks[] = $row;
                }

                foreach ($tasks as $tks) { 
                   $val = $tks['gender'];
                }
                
                echo "<script type='text/javascript'> window.location.href = 'todo_list_pass.php?email=$this->email&gender=$val';</script>";
            } else {
                echo '<script>alert("NOT FOUND ANY DETAILS! PLEASE REGISTER")</script>';
            }
        }
    }
}

?>