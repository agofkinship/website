<?php 
require __DIR__ ."/../accounts/auth.php";

$userId = checklogin();
if (!$userId) {
    header("Location: /accounts/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (!empty($title) && !empty($content)) {
        $stmt = $pdo->prepare("INSERT INTO guides (user_id, title, content, status)
        VALUES (?,?,?, 'pending')");
        $stmt->execute([$userId, $title, $content]);

        $success = "Your guide has been submitted and is pending review.";
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<h2>Submit a Guide</h2>
<?php if (isset($errorq)) echo "<p style='color:red;'>$error</p>"; ?>
<?php if (isset($success)) echo "<p style='color:green;'>$success</p>"; ?>

<form method="POST">
    <input type="text" name="title" placeholder="Guide Title" required>
    <textarea name="content" rows="8" placeholder="Write your guide here..." required></textarea><br><br>
    <button type="submit">Submit Guide</button>
</form>