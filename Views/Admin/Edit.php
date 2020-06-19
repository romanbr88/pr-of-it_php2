<!DOCTYPE html>
<html>
<head>
    <title>Редактирование новости</title>
</head>
<body>
<p><a href="/">Главная</a></p>
<p><a href="/admin">Админка</a></p>
<form action="/admin/edit.php?id=<?= $data->id ?>" method="post">
    <label for="title">Название</label><br>
    <input type="text" name="title" id="title" value="<?= htmlspecialchars($data->title) ?>" required><br>
    <label for="date">Дата</label><br>
    <input type="text" name="date" id="date" value="<?= htmlspecialchars($data->date) ?>" required><br>
    <label for="content">Текст</label><br>
    <textarea name="content" id="content" required><?= htmlspecialchars($data->content) ?></textarea><br>
    <button type="submit">Изменить</button>
</form>
</body>
</html>