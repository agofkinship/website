<?php 
require __DIR__ . "/../accounts/auth.php";

$userId = checklogin();
if (!$userId) {
    http_response_code(403);
    echo json_encode(['error' => 'Not logged in']);
    exit();
}

if (!empty($_FILES['file']['tmp_name'])) {
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (!in_array(strtolower($ext), $allowed)) {
        http_response_code(400);
        echo json_encode(['error'=> 'Invalid file type']);
        exit();
    }

    $fileName = uniqid('img_', true) .'.'. $ext;
    $path = __DIR__ .'/images/'. $fileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
        $url = '/guides/images/'.$fileName;
        echo json_encode(['location' => $url]);
    } else {
        http_response_code(500);
        echo json_encode(['error'=> 'Upload failed']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error'=> 'No file uploaded']);
}


?>