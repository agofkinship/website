<?php
require_once __DIR__ . '/../accounts/auth.php';

$userId = checklogin();
if (!$userId || (!hasRole(['officer', 'committee']))) {
    header('Location: /accounts/login.php');
    exit;
}

// role check
if (!in_array($user['role'], ['officer', 'committee'])) {
    die("Access denied");
}

// get guide ID and action
$guideId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($guideId > 0 && in_array($action, ['approve', 'reject'])) {
    $status = $action === 'approve' ? 'approved' : 'rejected';
    
    $stmt = $pdo->prepare("UPDATE guides SET status = ? WHERE id = ?");
    $stmt->execute([$status, $guideId]);
}

header("Location: review_guides.php");
exit;