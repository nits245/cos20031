<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="description" content="JNNR login"/>
		<meta name="keywords" content="JNNR"/>
		<meta name="author" content="nits"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>JNNR login login</title>
		<link href="styles/style.css" rel="stylesheet">
	</head>
	
	<body>
		<?php
            include("header.inc");
            include("menu.inc");
            session_start();
            if (isset($_POST["login"])){
    if (isset($_POST["username"])){$username = trim($_POST["username"]);}
    if (isset($_POST["password"])){$password = trim($_POST["password"]);}
    if (($username=="admin") AND ($password=="admin123")){$_SESSION["login"] = true;
    header("location: manage.php");
    echo $_SESSION["login"];}
    else{echo"<div class=\"container\">wrong username or password</div>";}
    }
        ?>
		
		<div class="container">
                <fieldset>
			<form action="login.php" method="POST" novalidate="novalidate">

				<h1 id="title">Management login</h1>
				<h2 id="subtitle">In order to query database, your identity needs to be verified.</h2>

                <!-- Radio choice: which query admin would like to make -->
                <div>
                        <legend>Administrator credentials</legend>
                        <div>
                            <div>
								<div>
									<label for="username">Username:</label>
									<input type="text" id="username" name="username" placeholder="Username..." pattern="^[\w\d\-_]{10,30}$" required="required" >
								</div>    
								<div>
									<label for="password">Password:</label>
									<input type="text" id="password" name="password" placeholder="Password..." pattern="^.{10,30}$" required="required" >
								</div>
                            </div>
                        </div>
 
                </div>

				<!-- Login button -->
				<div>
					<div>
						<div>
							<label for="login">Login</label>
							<input type="submit" name="login" id="login" value="Login"/>
						</div>
					</div>
				</div>
			</form>
                </fieldset>
		</div>
  
		<!-- Footer -->
		<?php
            include("footer.inc");
        ?>
	</body>
</html>
