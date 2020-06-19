<!DOCTYPE html>
<html>
<head>
    <title>Добавление новости</title>
</head>
<body>
<p><a href="/">Главная</a></p>
<p><a href="/admin">Админка</a></p>
<form action="/admin/add.php" method="post">
    <label for="title">Название</label><br>
    <input type="text" name="title" id="title" required><br>
    <label for="content">Текст</label><br>
    <textarea name="content" id="content" required></textarea><br>
    <button type="submit">Добавить</button>
</form>
</body>
</html>