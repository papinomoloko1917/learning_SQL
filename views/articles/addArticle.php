<?php

use App\Database\Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');

    if ($title && $content) {
        $db = new Database();
        $db->connect();

        // Экранирование данных для безопасности
        $titleSafe = $db->execute("SELECT 1"); // Просто для инициализации, не используйте так в реальном коде
        $mysqli = $db->connect();
        $titleEscaped = $mysqli->real_escape_string($title);
        $contentEscaped = $mysqli->real_escape_string($content);

        $sql = "INSERT INTO articles (title, content) VALUES ('$titleEscaped', '$contentEscaped')";
        $db->execute($sql);
        $db->close();

        header('Location: /articles');
        exit;
    } else {
        echo "Поля не должны быть пустыми!";
    }
} else {
    header('Location: /articles');
    exit;
}
