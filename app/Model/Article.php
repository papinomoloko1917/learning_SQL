<?php

namespace App\Model;

use App\Database\Database;

class Article
{
    private $title;
    private $content;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    /**
     * Получить все статьи из базы данных
     */
    public function all()
    {
        $pdo = $this->db->connect();
        $sql = "SELECT title, content FROM articles";
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll();
    }

    /**
     * Сохранить статью в базу данных
     */
    public function save()
    {
        $pdo = $this->db->connect();

        // Используем подготовленные запросы для защиты от SQL-инъекций
        $sql = "INSERT INTO articles (title, content) VALUES (:title, :content)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':title' => $this->title,
            ':content' => $this->content
        ]);

        return true;
    }
}
