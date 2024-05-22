<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="description" content="admin login"/>
		<meta name="keywords" content=""/>
		<meta name="author" content="nits"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Login Page</title>
		<link href="styles/style.css" rel="stylesheet">
	</head>
	
	<body>
	<?php
    include("header.inc");
    require_once("settings.php");
    session_start();

    $connection = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$connection) {
        echo '<p>Error connecting to database.</p>';
    } else {
        if (isset($_POST["login"])) {
            $username = isset($_POST["username"]) ? trim($_POST["username"]) : '';
            $password = isset($_POST["password"]) ? trim($_POST["password"]) : '';

            $stmt = $connection->prepare("SELECT password FROM admin WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $stmt->bind_result($db_password);
                $stmt->fetch();

                if ($password === $db_password) {
                    $_SESSION["login"] = true;
                    header("Location: archer.php");
                    exit();
                } else {
                    echo "<div class=\"container\">Wrong username or password</div>";
                }
            } else {
                echo "<div class=\"container\">Wrong username or password</div>";
            }

            $stmt->close();
        }

        mysqli_close($connection);
    	}
	?>

		
		<div class="container">
                <fieldset>
			<form action="login.php" method="POST" novalidate="novalidate">

				<h1 id="title">Admin login</h1>
				<h2 id="subtitle">In order to query database, your identity needs to be verified.</h2>

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

				<div>
					<div>
						<div>
							<input type="submit" name="login" id="login" value="Login"/>
						</div>
					</div>
				</div>
			</form>
                </fieldset>
		</div>
  
		<?php
            include("footer.inc");
        ?>
	</body>
</html>
