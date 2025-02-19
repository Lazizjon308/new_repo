<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $text = $_POST['text'];

    $query = "INSERT INTO posts (title, text) VALUES (:title, :text)";
    $stmt = $db->prepare($query);
    $stmt->execute([
        'title' => $title, 
        'text' => $text
    ]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(100,100,100,0,9);
            text-align: center;
            padding: 20px;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            max-width: 400px;
            width: 100%;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: blue;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: darkblue;
        }
        .back-link {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #555;
        }
        .back-link:hover {
            color: black;
        }
    </style>
</head>
<body>
    <h1>Add New Post</h1>
    <form method="POST">
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="text" placeholder="Write your post..." rows="5" required></textarea><br>
        <button type="submit">Submit</button>
    </form>
    <a href="index.php" class="back-link">Back to Home</a>
</body>
</html>

