<?php 
require __DIR__ ."/../config.php";

function checklogin() {
    global $pdo;

    if (!isset($_COOKIE["session_token"])) return false;

    $token = $_COOKIE["session_token"];
    $stmt = $pdo->prepare("SELECT users_id, expires_at FROM sessions WHERE session_token = ?");
    $stmt->execute([$token]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) return false;

    // check exp
    if (new DateTime() > new DateTime($result["expires_at"])) {
        logout();
        return false;
    }

    return $result['users_id'];
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

?>