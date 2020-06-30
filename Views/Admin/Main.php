<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Админка</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">Главная</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/index.php?ctrl=Admin\AddArticle">Добавить новость</a>
            </li>
        </ul>
    </div>
</nav>
<main role="main" class="container">
    <table class="table table-hover">
        <tr>
            <th>Id</th>
            <th>Название</th>
            <th>Дата</th>
            <th>Автор</th>
            <th>Действие</th>
        </tr>
        <?php foreach($this->articles as $article): ?>
            <tr>
                <td><?= $article->id ?></td>
                <td><a href="/index.php?ctrl=Article&id=<?= $article->id ?>"><?= $article->title ?></a></td>
                <td><?= $article->date ?></td>
                <td>
                    <?php if (!is_null($article->author)) :
                        echo $article->author->name;
                    endif; ?>
                </td>
                <td>
                    <a href="/index.php?ctrl=Admin\EditArticle&id=<?= $article->id ?>">Редактировать</a><br>
                    <a href="/index.php?ctrl=Admin\Delete&id=<?= $article->id ?>">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>