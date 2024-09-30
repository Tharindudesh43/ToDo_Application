<?php
//include('DatabaseConnection.php');
require_once('todo.php');
require_once('todo_Pass.php');

$connection = mysqli_connect("localhost", "root", "", "todo_db");

$user = new Todo_list($connection);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>TO-DO REGISTER</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
<nav class="navbar bg-body-tertiary bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand text-light ref="#">
            <img src="assets/todoIcon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            TO-DO LIST
          </a>
        </div>
      </nav>


	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="assets/todoIcon.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5 pb-1 pt-4">
							<h1 class="fs-4 card-title fw-bold mb-4">To-Do Registration</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div> 

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
									</div>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

                                <div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="name">Name</label>
									</div>
									<input id="name" type="text" class="form-control" name="name" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

                                <div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="gender">Gender</label>
									</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="male">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Male
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="female" >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Female
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="not to say" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                          Not to Say
                                        </label>
                                      </div>
									<!-- <input id="password" type="" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div> -->
								</div>


								<div class="d-flex align-items-center pd-10">
									<div>
										<button type="submit" class="btn btn-primary ms-auto"> <a href="index.php" class="btn-primary" style="text-decoration:none">Home</a> </button>
									</div>
									<button type="submit" value="newaccount" name="newaccount" class="btn btn-primary ms-auto">
										Create
									</button>
								</div>
								<div class="empty p-2"></div>

								</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Do have an account? <a href="Login.php" class="text-dark">Log In</a>
							</div>
						</div>
							</form>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2024 &mdash; tharindu43 
					</div>

					<?php
											if(isset($_POST['newaccount'])){
													$email = $_POST['email'];
													$password = $_POST['password'];
													$name = $_POST['name'];
													$gender = $_POST['flexRadioDefault'];
													

													$user->setEmail($email);
													$user->setPassword($password);
													$user->setName($name);
													$user->setGender($gender);
												    
													$user->insert();

													// if($status == "yes"){
													// 	$user->if_existing();
													// }
													
													// $account_todo = new Todo_list_pass();
													// $account_todo->setemail("sdsdsd");
											}
							?>

				</div>
			</div>
		</div>
	</section>
</body>
</html>
