<?php
require_once __DIR__ . '/../accounts/auth.php';  // adjust path as needed
$userId = checklogin();

if (!$userId) {
    header('Location: /accounts/login.php');
    exit;
}

$stmtUser = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmtUser->execute([$userId]);
$user = $stmtUser->fetch(PDO::FETCH_ASSOC);

// optional role check
if (!in_array($user['role'], ['officer', 'committee', 'member'])) {
    die("Access denied");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <?php include __DIR__ . '/../components/nav.php'; ?>

<h1>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>

<nav class="dashboard-nav">
    <ul>
        <li><a href="index.php">Dashboard Home</a></li>
        <?php if (hasRole('member') || hasRole('officer') || hasRole('committee')): ?>
            <li><a href="/../guides/submit.php">Submit Guide</a></li>
        <?php endif; ?>
        <?php if (hasRole('officer') || hasRole('committee')): ?>
            <li><a href="review_guides.php">Review Guides</a></li>
        <?php endif; ?>
        <?php if (hasRole('committee')): ?>
            <li><a href="user_management.php">User Management</a></li>
        <?php endif; ?>
    </ul>
</nav>

<section>
    <p>Use the navigation above to access your dashboard features.</p>
</section>

</body>
</html>