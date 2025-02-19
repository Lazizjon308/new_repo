<?php
include 'db.php';

// Ensure that $id is passed via GET or POST
$id = $_GET['id'] ?? null; // or use $_POST if you expect the ID to come from a form

if (!$id) {
    die("No post ID provided!");
}

$stmt = $db->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->execute(['id' => $id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    die("Post not found!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['title']) ?></title>
    <?php include 'front.css'; ?>
</head>
<body>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><?= nl2br(htmlspecialchars($post['text'])) ?></p>
    <div><?= $post['created_at'] ?></div>
    <a href="index.php">Return to homepage</a>
</body>
</html>
