<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
/*if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}*/
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 1000px; padding: 20px; 
				  position: absolute;
				  top: 50%;
				  left: 50%;
				  margin-top: -275px;     /* Half of height */
				  margin-left: -450px;
				  background: #fff;
				  border-radius: 3px;
				  border: 1px solid #c7d0d2;
				  box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px #f5f7f8;				  }
			table.blueTable {
				border: 1px solid #1C6EA4;
				background-color: #EEEEEE;
				width: 100%;
				text-align: left;
				border-collapse: collapse;
			}
			table.blueTable td, table.blueTable th {
				border: 1px solid #AAAAAA;
				padding: 3px 2px;
			}
			table.blueTable tbody td {
				font-size: 13px;
			}
			table.blueTable tr:nth-child(even) {
				background: #D0E4F5;
			}
			table.blueTable thead {
				background: #1C6EA4;
				background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
				background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
				background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
				border-bottom: 2px solid #444444;
			}
			table.blueTable thead th {
				font-size: 15px;
				font-weight: bold;
				color: #FFFFFF;
				border-left: 2px solid #D0E4F5;
			}
			table.blueTable thead th:first-child {
				border-left: none;
			}
			
			table.blueTable tfoot {
				font-size: 14px;
				font-weight: bold;
				color: #FFFFFF;
				background: #D0E4F5;
				background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
				background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
				background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
				border-top: 2px solid #444444;
			}
			table.blueTable tfoot td {
				font-size: 14px;
			}
			table.blueTable tfoot .links {
				text-align: right;
			}
			table.blueTable tfoot .links a{
				display: inline-block;
				background: #1C6EA4;
				color: #FFFFFF;
				padding: 2px 8px;
				border-radius: 5px;
			}
				  
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Register</h2>
        <p>Please fill in your details of the table.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Table Name</label>
                <input type="text" name="tablename" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Column Name</label>
                <input type="text" name="columnname" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
		<!--	<div class="form-inline <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Domain Name</label>
				<input type="text" name="domainname" class="form-control">
                <select class="form-control">
				 <option value="volvo">Volvo</option>
                 <option value="saab">Saab</option>
                 <option value="mercedes">Mercedes</option>
                 <option value="audi">Audi</option>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div> -->
			
			<div class="form-inline <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label> Not Null</label>
                <input type="checkbox" name="notnull" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
			<div class="form-inline <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>PK</label>
                <input type="checkbox" name="PK" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
			<div class="form-inline <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label> Default</label>
                <input type="text" name="default" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
			
			
			<div class="form-group">
                <input type="button" class="btn btn-primary" name="checkbtn" value="Check">
            </div>
            
			<table class="blueTable">
				<thead>
				<tr>
				<th>Table Name</th>
				<th>Column Name</th>
				<th>Data Type</th>
				</tr>
				</thead>
			</table>
			<br><br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submitbtn" value="Submit">
            </div>
            <p>Logout? <a href="logout.php">logout</a>.</p>
        </form>
    </div>
</body>
</html>
