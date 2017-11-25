<?php include ROOT . '/views/layouts/headerAdmin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление новостями</li>
                </ol>
            </div>
            <a href="/admin/news/add" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить новость</a>
            <h4>Список новостей</h4>
            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Категория</th>
                    <th>Краткое описание</th>
                    <th>Дата добавления</th>
                    <th>Статус</th>
                    <th>edit</th>
                    <th>del</th>
                    <th>view</th>
                </tr>
                <?php foreach ($news as $newsItem): ?>
                    <tr>
                        <td><?php echo $newsItem['id']; ?></td>
                        <td><?php echo $newsItem['title']; ?></td>
                        <td><?php echo $category[$newsItem['category_id']]['name']; ?></td>
                        <td><?php echo $newsItem['short_description']; ?></td>
                        <td><?php echo $newsItem['add_date']; ?></td>
                        <td><?php echo $newsItem['status']; ?></td>
                        <td><a href="/admin/news/edit/<?php echo $newsItem['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/news/delete/<?php echo $newsItem['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        <td><a href="/admin/news/view/<?php echo $newsItem['id']; ?>" title="Просмотр новости"><i class="fa fa-fighter-jet fa-2x"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footerAdmin.php'; ?>

