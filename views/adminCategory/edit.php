<?php include ROOT . '/views/layouts/headerAdmin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li class="active">Редактировать категорию</li>
                </ol>
            </div>
            <h4>Редактировать категорию #<?php echo $id . ' (' . $category['name'] . ')'; ?></h4>
            <br/>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="" method="post">
                        <p>Наименование категории</p>
                        <input type="text" name="name" placeholder="Наименование"
                               value="<?php echo $category['name']; ?>">
                        <p>Порядок сортировки</p>
                        <input type="text" name="sort_order" placeholder="Артикул"
                               value="<?php echo $category['sort_order']; ?>">
                        <p>Статус</p>
                        <select name="status">
                            <option value="0" <?php if ($category['status'] == 0) echo 'selected="selected"'; ?>>Скрыт
                            </option>
                            <option value="1" <?php if ($category['status'] == 1) echo 'selected="selected"'; ?>>
                                Отображается
                            </option>
                        </select>
                        <br><br><br>
                        <input type="submit" class="btn btn-default" name="submit" value="Сохранить">
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footerAdmin.php'; ?>
