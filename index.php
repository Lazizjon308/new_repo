<?php
require_once 'db.php';

try {
    $stmt = $db->query("SELECT * FROM posts ORDER BY created_at DESC");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching posts: " . htmlspecialchars($e->getMessage()));
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New_repo</title>
    <style>
       <?php include 'front.css'; ?>
    </style>
</head>
<body>
    <h1>Personal Blog</h1>

    <div class="container">
        <a href="create.php" class="add-post-link">Add new post</a>
        <search>
            <form>
                <input placeholder = "search">
            </form>
        </search>

        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h2>
                    <a href="post.php?id=<?= $post['id'] ?>">
                        <?= htmlspecialchars($post['title']) ?>
                    </a>
                </h2>
                <span><?=$post['created_at']?></span>
                <span><i><?=$post['updated_at']?></i></span>
                <p><?= nl2br(htmlspecialchars(substr($post['text'], 0, 100))) ?>...</p>
                <a href="edit.php?id=<?= $post['id'] ?>" class="edit">edit</a>
                <a href="delete.php?id=<?= $post['id'] ?>" onclick="return confirm('Do you want to delete?')" class="delete">delete</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
