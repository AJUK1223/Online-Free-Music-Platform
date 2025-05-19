<?php
session_start();
include('db_connect.php');

$msg = false;

// CSRF token setup
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // CSRF token check
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF token validation failed.");
    }

    $User_Name = trim($_POST['User_Name']);
    $User_Password = trim($_POST['User_Password']);

    if (!empty($User_Name) && !empty($User_Password)) {
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, password FROM user WHERE name = ?");
        $stmt->bind_param("s", $User_Name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($User_Password, $user['password'])) {
                $_SESSION['User_Name'] = $User_Name;
                header("Location: index.php");
                exit();
            } else {
                $msg = "Invalid username or password.";
            }
        } else {
            $msg = "User not found or incorrect credentials.";
        }

        $stmt->close();
    } else {
        $msg = "Please fill in all required fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Website Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="left_bx1">
            <div class="content">
                <form method="POST">
                    <h3>Login</h3>
                    <?php if ($msg): ?>
                        <p style="color:red;"><?php echo htmlspecialchars($msg); ?></p>
                    <?php endif; ?>

                    <div class="card">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="User_Name" placeholder="Enter your User Name" required>
                    </div>
                    <div class="card">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="User_Password" placeholder="Enter your Password" required>
                    </div>

                    <!-- CSRF token -->
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

                    <input type="submit" value="Login" class="submit">

                    <div class="check">
                        <input type="checkbox" id="remember_me"><span>Remember Me</span>
                    </div>
                    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                </form>
            </div>
        </div>

        <div class="right_bx1">
            <img src="Images/LO.png" alt="Login Image">
        </div>
    </header>
</body>
</html>
