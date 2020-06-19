<!DOCTYPE html>
<html>
<head>
    <title>Админка</title>
</head>
<body>
<p><a href="/">Главная</a></p>
<p><a href="/admin/add.php">Добавить новость</a></p>
<table>
    <tr>
        <th>Id</th>
        <th>Название</th>
        <th>Дата</th>
        <th>Действие</th>
    </tr>
    <?php foreach($data as $datum): ?>
    <tr>
        <td><?= $datum->id ?></td>
        <td><a href="/article.php?id=<?= $datum->id ?>"><?= $datum->title ?></a></td>
        <td><?= $datum->date ?></td>
        <td>
            <a href="/admin/edit.php?id=<?= $datum->id ?>">Редактировать</a><br>
            <a href="/admin/delete.php?id=<?= $datum->id ?>">Удалить</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>