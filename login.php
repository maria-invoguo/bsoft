<?php
    session_start();
    require_once 'db.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            $_SESSION['username'] = $username;

            echo '<script>window.location.href = "index.php";</script>';
            exit();
        } else {
            $error = '<span style="color: red;"><b>Invalid username or password<b></span>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            color: #333333;
        }

        .container input[type="text"],
        .container input[type="password"] {
            width: calc(100% - 40px);
            padding: 12px;
            margin: 11px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
        }

        .container button {
    background-color: #3498db;
    color: #ffffff;
    padding: 12px;
    margin: 11px 0;
    border: none;
    cursor: pointer;
    width: calc(100% - 40px);
    border-radius: 4px;
}

.container button:hover {
    background-color: #2980b9;
}

        @keyframes shake {
            0% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-10px); }
            20%, 40%, 60%, 80% { transform: translateX(10px); }
            100% { transform: translateX(0); }
        }

        .shake-effect {
            animation: shake 0.5s;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <?php if (isset($error)): ?>
            <div id="error-message" class="alert alert-danger"><?php echo $error ?></div>
        <?php endif ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit">LOGIN</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the error message element
            var errorMessage = document.getElementById('error-message');
            // Add the shake effect class
            errorMessage.classList.add('shake-effect');
            // Set a timeout function to remove the shake effect and hide the error message after 2 seconds
            setTimeout(function() {
                errorMessage.classList.remove('shake-effect');
                errorMessage.style.display = 'none';
            }, 2000);
        });
    </script>
</body>
</html>
