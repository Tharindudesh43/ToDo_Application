<?php

$obj = new Operation();
$obj->delete();
class Operation{
    public function delete(){
        if(isset($_GET['to_delete'])){
            $id_to_delete = $_GET['id'];
            $connection = mysqli_connect("localhost", "root", "", "todo_db");
            $query = "delete from `todo_users_data` where `id`='$id_to_delete'";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                echo '<script> alert("Sorry task not deleted !");</script>';
                //return header('location:index.php?error="Failed to delete student!"');
            }
            echo '<script> alert("Task Deleted !");</script>';
            $mail = $_GET['email'];
            $gen = $_GET['gender'];
            echo "<script type='text/javascript'> window.location.href = 'todo_list_pass.php?email=$mail&gender=$gen';</script>";
            //$connection->close();
            //return header('location:index.php?success="Student deleted successfully!"');

        }else{
            echo '<script> alert("Not Removed");</script>';
        }

       
    }
}
?>