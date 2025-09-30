<?php 
require_once 'auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    if (!$username || !$password || !$email) {
        $error = "All fields required!";
    } else {
        $hash = password_hash($password,
         PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users 
        (username, password_hash, email) 
        VALUES (?,?,?)");

        if ($stmt->execute([$username, $hash, $email])) {
            header("Location: login.php");
            exit();
        } else { 
            $error = "Registration failed.";
        }
    }
}

?>

<h2>
    Register
</h2>
<?php if (isset($error)) echo "<p>$error</p>";
?>

<form method="post">
    <input type="text" name="username" placeholder="Username" required><br> 
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Sign Up</button>
</form>