<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>TO-DO ACCOUNT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* Custom styles for better mobile responsiveness */
        .navbar-nav .nav-item {
            margin-left: 1rem;
        }
        .navbar-brand img {
            width: 100%;
            max-width: 100px;
        }
        .container {
            max-width: 100%;
            padding: 0 15px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .table {
            width: 100%;
            overflow-x: auto;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <button
      class="navbar-toggler bg-info"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <a class="navbar-brand mt-2 mt-lg-0" href="#">
      <img src="todoIcon.png" height="40" alt="MDB Logo" loading="lazy">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-light font-weight-bold" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light font-weight-bold" href="#">About Me</a>
        </li>
      </ul>
    </div>

    <div class="d-flex align-items-center">
      <a class="text-reset me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
      </a>
      <div class="avatar pl-9">
        <a
          class="d-flex align-items-center text-light text-decoration-none"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          aria-expanded="false"
        >
          <?php 
            if (isset($_GET['email'])) {
                $copymail = $_GET['email'];
            }
            echo "$copymail" ?>
          <?php 
            if (isset($_GET['gender'])) {
                $gender = $_GET['gender'];
            }

            if($gender=='male') {
                echo '<img
                    src="male.png"
                    class="rounded-circle"
                    height="40"
                    alt="male png"
                />';
            }
            elseif($gender== 'female'){
                echo '<img
                    src="female.png"
                    class="rounded-circle"
                    height="40"
                    alt="Female png"
                    loading="lazy"
              />';
            } 
            else{
                echo'<img
                    src="NotoSay.jpg"
                    class="rounded-circle"
                    height="40"
                    alt="not to say png"
                    loading="lazy"
                />';
            }
          ?>
        </a>
      </div>
    </div>
  </div>
</nav>

<div class="container">
  <form method="POST" class="needs-validation p-3 p-md-5" novalidate="" autocomplete="off">
    <div class="mb-3">
      <label class="mb-2 text-dark font-weight-bold" for="email">New Task</label>
      <input id="text" type="text" class="form-control" name="tasktypes" value="" required autofocus>
    </div>
    <div class="d-flex align-items-center">
    <label for="date" class="p-1">Add Date:</label><br>
    <input type="date" id="date" name="date_select" required><br><br>
      <button type="submit" id="login1" value="login" name="addbutton" class="btn btn-primary ms-auto">
        Add
      </button>
    </div>
  </form>
</div>

<div class="container p-3 p-md-5">
  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center">Email</th>
              <th class="text-center">Task</th>
              <th clas="text-center"> Date </th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include('getusertask.php');
              $obj = new Tasks();
              if (isset($_GET['to_delete'])) {
                  $id_to_delete = $_GET['id'];
              }
              elseif (isset($_GET['email'])) {
                $copymail = $_GET['email'];
              }
              $tasks = $obj->getSpecificUserDetails($copymail);
              if ($tasks==null) { ?>
                <tr>
                  <td colspan="4" class="text-center">Empty</td>
                </tr>
              <?php } else { ?>
                <?php foreach ($tasks as $tks) { ?>
                <tr>
                  <td><?php echo $copymail ?></td>
                  <td><?php echo $tks['description'] ?></td>
                  <td> <?php echo $tks['date'] ?></td>
                  <td class="text-center">
                    <button type="submit" class="btn btn-danger ms-auto">
                      <a style="text-decoration: none; color:aliceblue;" href="operation.php?email=<?php echo $tks['email']?>&gender=<?php echo $tks['gender']?>&id=<?php echo $tks['id']?>&to_delete=1">Remove</a>
                    </button>
                  </td>
                </tr>
                <?php } ?>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
  include("todo_Pass.php");
  $obj = new Todo_list_pass();
  if(isset($_POST['addbutton'])){
    $text = $_POST['tasktypes'];
    $date_get = $_POST['date_select'];
    if(empty($text)){
      echo '<script>alert("Fill the NEW TASK Field!")</script>';
    }
    else{
      $obj->settext($text);
      $obj->setdate($date_get);
      if (isset($_GET['email'])) {
          $copymail = $_GET['email'];
          $obj->setemail($copymail);
      }
      $id_user = $obj->insert_task();
    }
  }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
