<?php 
require 'auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $pdo->prepare("SELECT id, password_hash FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password_hash"])) {
        $token = bin2hex(random_bytes(32));
        $expires = (new DateTime('+1 day'))->format('Y-m-d H:i:s');

        $stmt2 = $pdo->prepare('INSERT INTO sessions (users_id, session_token, expires_at)
        VALUES (?,?,?)');
        $stmt2->execute([$user['id'], $token, $expires]);

        setcookie('session_token', $token, time() + 86400,'/');
        header('Location: ../index.php');
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}

?>

<h2>Login</h2>
<?php if (isset($error)) echo "<p>$error</p>" ?>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>