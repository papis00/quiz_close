<?php
	include("database.php");
	session_start();
	
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$name = stripslashes($name);
		$name = addslashes($name);

		$email = $_POST['email'];
		$email = stripslashes($email);
		$email = addslashes($email);

		$password = $_POST['password'];
		$password = stripslashes($password);
		$password = addslashes($password);

		$pseudo = $_POST['pseudo'];
		$pseudo = stripslashes($pseudo);
		$pseudo = addslashes($pseudo);
		$str="SELECT email from admin WHERE email='$email'";
		$result=mysqli_query($con,$str);
		
		if((mysqli_num_rows($result))>0)	
		{
            echo "<center><h3><script>alert('Désolé.. ce email s'est déja inscris !!');</script></h3></center>";
            header("refresh:0;url=add_admin.php");
        }
		else
		{
            $str="insert into admin set name='$name',email='$email',password='$password',pseudo='$pseudo'";
			if((mysqli_query($con,$str)))	
			echo "<center><h3><script>alert('Félicitation .. Vous vous etes inscris en tant que administrateur avec succés !!');</script></h3></center>";
			header('location: admin.php');
		}
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title> S'inscrire | Quiz IAM </title>
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="css/form.css">
        <style type="text/css">
            body{
                  width: 100%;
                  background: url(image/IAM.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
          </style>
	</head>

	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<center> <h5 style="font-family: Noto Sans;">S'inscrire en tant que Administrateur </h5><h4 style="font-family: Noto Sans;"> Quiz IAM </h4></center><br>
							<form method="post" action="add_admin.php" enctype="multipart/form-data">
                                <div class="form-group">
									<label>Entrer Nom et Prénom</label>
									<input type="text" name="name" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Entrer votre Email</label>
									<input type="email" name="email" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Entrer votre mot de passe </label>
									<input type="password" name="password" class="form-control" required />
                                </div>
								<div class="form-group">
									<label>Entrer votre pseudo:</label>
									<input type="text" name="pseudo" class="form-control" required />
								</div>
                                
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">S'inscrire</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">J'ai déja un compte! </span> <a href="admin.php">Se connecter  </a> Ici..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>
