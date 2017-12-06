<?php include ROOT . '/views/layouts/headerAdmin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/news">Управление новостями</a></li>
                        <li class="active">Добавить новость</li>
                    </ol>
                </div>

                <br/>

                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- enctype необходим для отправки изображения -->
                            <p>Заголовок</p>
                            <input type="text" name="title" placeholder="Заголовок" value="">
                            <p>Краткое описание</p>
                            <input type="text" name="short_description" placeholder="Краткое описание" value="">
                            <p>Описание $</p>
                            <textarea name="description" cols="140" rows="20"></textarea>
                            <p>Категория</p>
                            <select name="category">
                                <?php if (is_array($categories)): ?>
                                    <?php foreach ($categories as $category): ?>
                                        <option
                                                value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <br><br>
                            <p>Изображение для новости</p>
                            <img src="" width="200" alt="">
                            <input type="file" name="image" placeholder="Изображение для новости" value="">
                            <p>Статус</p>
                            <select name="status">
                                <option value="0">Скрыт</option>
                                <option value="1" selected="selected">Отображается</option>
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