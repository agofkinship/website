<?php 
require __DIR__ ."/../config.php";

global $user;
$user = NULL;

function checklogin() {
    global $pdo, $user;

    if (!isset($_COOKIE["session_token"])) return false;

    $token = $_COOKIE["session_token"];
    $stmt = $pdo->prepare("SELECT u.*, s.expires_at 
    FROM sessions s 
    JOIN users u ON s.users_id = u.id
    WHERE s.session_token = ?
    LIMIT 1");
    $stmt->execute([$token]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) return false;

    // check exp
    if (new DateTime() > new DateTime($result["expires_at"])) {
        logout();
        return false;
    }

    $user = $result;

    return $result['id'];
};

function logout() {
    

    if (!empty($_COOKIE["session_token"])) {
        global $pdo;
        $token = $_COOKIE["session_token"];
        $stmt = $pdo->prepare("DELETE FROM sessions WHERE session_token = ?");
        $stmt->execute([$token]);

        setcookie("session_token", "", time() - 3600, "/");
    }

    header("Location: ../index.php");
    exit();
};

function hasRole($role) {
    global $user;

    if (!$user || !isset($user['role'])) {
        return false;
    }

    if (is_array($role)) {
        return in_array($user['role'], $role);
    }


    return $user["role"] === $role;
}

?>