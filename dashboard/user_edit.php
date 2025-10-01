<?php
require_once __DIR__ . "/../accounts/auth.php";

$userId = checklogin();
if (!$userId || !hasRole(['committee'])) {
    header('Location: /accounts/login.php');
    exit;
}

// get id to edit
$editId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($editId <= 0) {
    die('Invalid user ID');
}

$stmt = $pdo->prepare("SELECT id, username, email, role FROM users WHERE id = ?");
$stmt->execute([$editId]);
$editUser = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$editUser) {
    die("User not found.");
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = trim($_POST["username"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $role = trim($_POST["role"] ?? '');

    if ($username && $email && in_array($role, ["member", "officer", "committee"])) {
        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?");
        $stmt->execute([$username, $email, $role, $editId]);

        $success = "User updated successfully!";

        $stmt = $pdo->prepare("SELECT id, username, email, role FROM users WHERE id = ?");
        $stmt->execute([$editId]);
        $editUser = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $error = "Please fill in all fields and select a valid role.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/theme.css">
</head>
<body>

<?php include __DIR__ . '/../components/nav.php'; ?>

<main class="container my-5">
    <h1 class="mb-4">Edit User: <?= htmlspecialchars($editUser["username"]) ?></h1>

    <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" class="row g-3">
        <div class="col-md-6">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" value="<?= htmlspecialchars($editUser['username']) ?>" required>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($editUser['email']) ?>" required>
        </div>

        <div class="col-md-6">
            <label for="role" class="form-label">Role</label>
            <select id="role" name="role" class="form-select" required>
                <option value="member" <?= $editUser['role'] === 'member' ? 'selected' : '' ?>>Member</option>
                <option value="officer" <?= $editUser['role'] === 'officer' ? 'selected' : '' ?>>Officer</option>
                <option value="committee" <?= $editUser['role'] === 'committee' ? 'selected' : '' ?>>Committee</option>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="user_management.php" class="btn btn-secondary ms-2">Cancel</a>
        </div>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>