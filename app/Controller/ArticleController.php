<?php

namespace App\Controller;

use App\Model\Article;

class ArticleController
{
    static function index()
    {
        // Получаем все статьи через модель
        $articleModel = new Article();
        $articles = $articleModel->all();

        // Передаём статьи в представление
        require_once __DIR__ . '/../../views/articles/articles.php';
    }

    static function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');

            if ($title && $content) {
                // Создаём и сохраняем статью через модель
                $article = new Article();
                $article->setTitle($title)
                    ->setContent($content)
                    ->save();

                // Перенаправление на страницу со статьями
                header('Location: /articles');
                exit;
            } else {
                echo "Поля не должны быть пустыми!";
            }
        } else {
            // Если запрос не POST, показываем форму
            require_once __DIR__ . '/../../views/articles/addArticle.php';
        }
    }
}
