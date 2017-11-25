<?php require_once ROOT.'/views/layouts/headerAdmin.php'?>

    <section>
        <div class="container">
            <div class="row">
                <br/>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li class="active">Управление категориями</li>
                    </ol>
                </div>
                <a href="/admin/category/add" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить категорию</a>
                <h4>Список товаров</h4>
                <br/>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID раздела</th>
                        <th>Наименование раздела</th>
                        <th>Статус</th>
                        <th>edit</th>
                        <th>del</th>
                    </tr>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?php echo $category['id']; ?></td>
                            <td><?php echo $category['name']; ?></td>
                            <td><?php echo $category['status']; ?></td>
                            <td><a href="/admin/category/edit/<?php echo $category['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td><a href="/admin/category/delete/<?php echo $category['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>




<?php require_once ROOT.'/views/layouts/footerAdmin.php'?>