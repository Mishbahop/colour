<?php
$fileName = 'GetPlayingGuide.php';

// Handle form submission to save the file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['file_content'])) {
        file_put_contents($fileName, $_POST['file_content']);
        $message = "File saved successfully!";
    } else {
        $message = "Failed to save the file. Content is missing.";
    }
}

// Read the current file content
$fileContent = file_exists($fileName) ? file_get_contents($fileName) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit File</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit <?= htmlspecialchars($fileName) ?></h1>
        <?php if (isset($message)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="fileContent" class="form-label">File Content:</label>
                <textarea id="fileContent" name="file_content" class="form-control" rows="15"><?= htmlspecialchars($fileContent) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Save</button>
        </form>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
