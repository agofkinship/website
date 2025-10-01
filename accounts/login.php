<?php 
require_once 'auth.php';

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

        setcookie('session_token', $token, time() + 86400, '/');
        header('Location: ../index.php');
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - A Group of Friends</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/theme.css">
</head>
<body>

<?php include __DIR__ . '/../components/nav.php'; ?>

<main class="container my-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Log In</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Log In</button>
    </form>

    <p class="text-center mt-3">
        Don't have an account? <a href="register.php">Register here</a>.
    </p>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>