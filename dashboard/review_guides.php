
<?php
require_once __DIR__ . '/../accounts/auth.php';  // adjust path as needed
$userId = checklogin();
include __DIR__ . '/../components/nav.php';

if (!$userId || (!hasRole(['officer', 'committee']) )) {
    header('Location: /accounts/login.php');
    exit;
}

// optional role check
if (!in_array($user['role'], ['officer', 'committee'])) {
    die("Access denied");
}

$stmt = $pdo->query("SELECT g.id, g.title, g.content, u.username FROM guides g
                            JOIN users u ON g.user_id = u.id
                            WHERE g.status = 'pending'");
$guides = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($guides as $guide) {
     echo "<h3>" . htmlspecialchars($guide['title']) . "</h3>";
    echo "<p>By: " . htmlspecialchars($guide['username']) . "</p>";
    echo "<p>" . nl2br(htmlspecialchars($guide['content'])) . "</p>";
    echo "<a href='review_action.php?id=" . $guide['id'] . "&action=approve'>Approve</a> | ";
    echo "<a href='review_action.php?id=" . $guide['id'] . "&action=reject'>Reject</a><hr>";
}

?>
