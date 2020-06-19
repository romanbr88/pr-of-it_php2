<!DOCTYPE html>
<html>
<head>
    <title>Новость: <?= $data->title ?></title>
</head>
<body>
    <p><a href="/">Главная</a></p>
    <p><a href="/admin">Админка</a></p>
    <div>
        <h1><?= $data->title ?></h1>
        <p><?= $data->date ?></p>
        <p><?= $data->content ?></p>
    </div>
</body>
</html>