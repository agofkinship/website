<?php 
require_once __DIR__ . "/../accounts/auth.php";

$userId = checklogin();
if (!$userId || !hasRole(['committee'])) {
    header('Location: /accounts/login.php');
    exit;
}

// get id to edit
$editId = isset($_GET['id']) ? intval($_GET['id']) :0;

if ($editId <= 0) { 
    die('Invalid user ID');
}

$stmt = $pdo->prepare("SELECT
id, 
username,
email,
role FROM users where id = ?
");
$stmt->execute([$editId]);
$editUser = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$editUser ) {
    die("User not found.");
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = trim($_POST["username"] ?? '');
    $email = trim($_POST["email"] ?? ''); 
    $role = trim($_POST["role"] ?? '');

    if ($username && $email && in_array($role, ["member","officer","committee"])) {
        $stmt = $pdo->prepare("UPDATE users
        SET username = ?,
        email = ?, role = ?
        WHERE id = ?");
        $stmt->execute([$username, $email, $role, $editId]);

        $success = "User updated successfully!";

        $stmt = $pdo->prepare("SELECT id, username, email, role
        FROM users WHERE id = ?");

        $stmt->execute([$editId]);

        $editUser = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $error = "Please fill in all fields and select a valid role.";
    }
}



?>
<?php include __DIR__ . '/../components/nav.php'; ?>
<h2> Edit User: 
    <?= htmlspecialchars($editUser["username"]) ?> <?= htmlspecialchars($editUser["email"]) ?>
</h2>

<?php if (isset($success)) echo "<p style='color:green;'>$success</p>"; ?>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>" ?>

<form method='POST'>
    <label>Username: </label><br>
    <input type="text" name="username" value="<?= htmlspecialchars($editUser['username']) ?>" required><br><br>
    <label>Email: </label><br>
    <input type="text" name="email" value="<?= htmlspecialchars($editUser['email']) ?>" required><br><br>
    <label>Role: </label>
    <select name="role">
        <option value="member" <?= $editUser['role'] === 'member' ? 'selected' : '' ?>>Member</option>
        <option value="officer" <?= $editUser['role'] === 'officer' ? 'selected' : '' ?>>Officer</option>
        <option value="committee" <?= $editUser['role'] === 'committee' ? 'selected' : '' ?>>Committee</option>
    </select><br><br>

    <button type="submit">Save Changes</button>
</form>