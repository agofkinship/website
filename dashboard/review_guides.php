<?php
require_once __DIR__ . '/../accounts/auth.php';
$userId = checklogin();

if (!$userId || (!hasRole(['officer', 'committee']))) {
    header('Location: /accounts/login.php');
    exit;
}

$stmt = $pdo->query("SELECT g.id, g.title, g.content, u.username FROM guides g
                     JOIN users u ON g.user_id = u.id
                     WHERE g.status = 'pending'");
$guides = $stmt->fetchAll(PDO::FETCH_ASSOC);

$config = HTMLPurifier_Config::createDefault();
// Allow common Summernote elements
$config->set("HTML.AllowedElements", [
    'a','abbr','b','blockquote','br','caption','cite','code','col','colgroup','dd','del','div','dl','dt','em','h1','h2','h3','h4','h5','h6',
    'i','img','ins','li','ol','p','pre','q','s','span','strike','strong','sub','sup','table','tbody','td','tfoot','th','thead','tr','u','ul'
]);

// Allow attributes including classes and inline styles
$config->set("HTML.AllowedAttributes", [
    'a.href','a.title','img.src','img.alt','img.width','img.height',
    'div.class','div.style','span.class','span.style','p.class','p.style',
    'table.class','table.style','td.class','td.style','th.class','th.style'
]);

// Allow all CSS properties Summernote may use
$config->set("CSS.AllowedProperties", null); // null = all properties allowed

$config->set("URI.AllowedSchemes", [
    "http" => true,
    "https" => true,
    "data" => true,
]);

$purifier = new HTMLPurifier($config);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Guides</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include __DIR__ . '/../components/nav.php'; ?>

<div class="container mt-4">
    <h1>Pending Guides</h1>
    <?php foreach ($guides as $guide): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($guide['title']) ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">By: <?= htmlspecialchars($guide['username']) ?></h6>
                <div class="card-text">
                    <?= $purifier->purify($guide['content']) ?>
                </div>
                <a href="review_action.php?id=<?= $guide['id'] ?>&action=approve" class="btn btn-success mt-2">Approve</a>
                <a href="review_action.php?id=<?= $guide['id'] ?>&action=reject" class="btn btn-danger mt-2">Reject</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>