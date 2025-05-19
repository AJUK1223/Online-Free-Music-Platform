<?php
session_start();
include('db_connect.php'); // Include secure DB connection

$msg = ''; // Initialize message as empty

// CSRF token generation
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF token validation failed.");
    }

    // Sanitize and validate inputs
    $user_name = trim($_POST['User_Name']);
    $user_pass = trim($_POST['User_Password']);
    $user_email = trim($_POST['User_Email']);

    if (empty($user_name) || empty($user_pass) || empty($user_email)) {
        $msg = "All fields are required.";
    } elseif (is_numeric($user_name)) {
        $msg = "Name must not be numeric.";
    } elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email format.";
    } else {
        // Check if email or username already exists
        $check_stmt = $conn->prepare("SELECT id FROM user WHERE email = ? OR name = ?");
        $check_stmt->bind_param("ss", $user_email, $user_name);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            $msg = "Username or Email already registered.";
        } else {
            // Hash the password securely
            $hashed_pass = password_hash($user_pass, PASSWORD_DEFAULT);

            // Insert user securely
            $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $user_name, $user_email, $hashed_pass);

            if ($stmt->execute()) {
                header("Location: login.php");
                exit;
            } else {
                $msg = "Error in registration. Please try again.";
            }

            $stmt->close();
        }

        $check_stmt->close();
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="left_bx1">
            <div class="content">
                <form method="POST">
                    <h3>User Registration</h3>
                    <div class="card">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="User_Name" placeholder="Enter your User Name" required>
                    </div>
                    <div class="card">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="User_Password" placeholder="Enter your Password" required>
                    </div>
                    <div class="card">
                        <label for="email">E-mail ID</label>
                        <input type="email" id="email" name="User_Email" placeholder="Enter your Email ID" required>
                    </div>

                    <!-- CSRF token -->
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

                    <input type="submit" value="Register" class="submit">

                    <div class="check">
                        <input type="checkbox" id="remember_me"><span>Remember Me</span>
                    </div>

                    <!-- Show message under Remember Me -->
                    <?php if (!empty($msg)): ?>
                        <p style="color:red; margin-top:10px;"><?php echo htmlspecialchars($msg); ?></p>
                    <?php endif; ?>

                    <p>Already have an account? <a href="login.php">Login</a></p>
                </form>
            </div>
        </div>

        <div class="right_bx1">
            <img src="Images/LO.png" alt="User Image">
        </div>
    </header>
</body>
</html>
