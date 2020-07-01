<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Админка: Добавление новости</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">Главная</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/admin/index.php?ctrl=Index&role=admin">Админка</a>
            </li>
        </ul>
    </div>
</nav>
<main role="main" class="container">
    <form action="/admin/index.php?ctrl=Insert&role=admin" method="post">
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Текст</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="author_id">Автор</label>
            <select name="author_id" id="author_id" class="custom-select">
                <option selected>-</option>
                <?php foreach ($this->authors as $author) : ?>
                <option value="<?= $author->id ?>"><?= $author->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</main>
</body>
</html>