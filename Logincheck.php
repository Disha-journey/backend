
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            margin: 0;
        }
        .main {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 10px 20px;
            transition: transform 0.2s;
            width: 500px;
            text-align: center;
            margin:100px auto;
        
        }
       
        label {
            display: block;
            width: 100%;
            margin-top: 10px;
            margin-bottom: 5px;
            text-align: left;
            font-weight: bold;
        }
        input {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
            margin-bottom: 15px;
            border: none;
            color: white;
            cursor: pointer;
            background-color: rgb(193, 96, 16);
            width: 100%;
            font-size: 16px;
        }
        .wrap {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
    </style>
</head>
<body>
    <div class="main">
        <h3>Enter your login credentials</h3>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your Username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>

            <div class="wrap">
                <button type="submit" value="Login" name="submit">Submit</button>
            </div>
        </form>
        <?php
        session_start();
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            include "dbconn.php";
            $query="select * from login where username='$username' and password='$password'";
            $result=checkInfo($query);
            if(mysqli_num_rows($result)>0){
                echo "correct password";
                $_SESSION['username']=$username;
                header("Location:Propertylayout.php");
            }
            else{
                echo "incorrect password";
            }   
        }
        ?>
        
    </div>
</body>
</html>