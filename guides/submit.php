<?php
require __DIR__ . "/../accounts/auth.php";
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Guide</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Summernote CSS -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.css" rel="stylesheet">
  <!-- Theme CSS -->
  <link rel="stylesheet" href="/theme.css">
</head>
<body>
  <?php include __DIR__ . '/../components/nav.php'; ?>

  <main class="container mt-5">
    <div class="card shadow-sm p-4">
      <h2 class="header-text mb-4">Submit a Guide</h2>

      <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>
      <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
      <?php endif; ?>

      <form method="POST" id="submit-guide">
        <div class="mb-3">
          <label for="title" class="form-label">Guide Title</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
        </div>

        <div class="mb-3">
          <label for="content" class="form-label">Guide Content</label>
          <textarea id="content" name="content" class="form-control" rows="8" placeholder="Write your guide here..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Guide</button>
      </form>
    </div>
  </main>

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#content').summernote({
        height: 400,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    });
  </script>
</body>
</html>