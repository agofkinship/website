<?php 
require_once __DIR__ . "/../accounts/auth.php";

$userId = checklogin();
if (!$userId || !hasRole(['committee'])) {
    header('Location: /accounts/login.php');
    exit;
}

$stmt = $pdo->query("SELECT id, username, email, role FROM users ORDER BY id ASC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include __DIR__ . '/../components/nav.php'; ?>

<h2>User Mangement</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= htmlspecialchars($user['id']) ?></td>
        <td><?= htmlspecialchars($user['username']) ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td><?= htmlspecialchars($user['role']) ?></td>
        <td>
            <a href="user_edit.php?id=<?= $user['id'] ?>">Edit</a>
        </td>
    </tr>
    <?php endforeach; ?>


</table>