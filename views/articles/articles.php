<link rel="stylesheet" href="/css/main.css">
<div class="center-container">
    <h1>Статьи</h1>
    <button onclick="location.href='/'">На главную</button>

    <form action="/addArticle" method="post">
        <input type="text" name="title" placeholder="Заголовок статьи" required>
        <textarea name="content" placeholder="Содержание статьи" required></textarea>
        <button type="submit">Добавить статью</button>
    </form>

    <hr style="width: 100%; margin: 20px 0;">

    <h2>Все статьи</h2>
    <?php if (!empty($articles)): ?>
        <?php foreach ($articles as $article): ?>
            <div class="article" style="margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px;">
                <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Статей пока нет.</p>
    <?php endif; ?>
</div>