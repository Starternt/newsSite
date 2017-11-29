<?php include ROOT . '/views/layouts/headerAdmin.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <br/>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/news">Управление новостями</a></li>
                        <li class="active">Редактировать новость</li>
                    </ol>
                </div>
                <br/>
                <div class="col-lg-4">
                    <div class="login-form">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- enctype необходим для отправки изображения -->
                            <p>Заголовок</p>
                            <input type="text" name="title" placeholder="Заголовок" value="<?php echo $news['title']; ?>">
                            <p>Краткое описание</p>
                            <input type="text" name="short_description" placeholder="Краткое описание" value="<?php echo $news['short_description']; ?>">
                            <p>Описание</p>
                            <textarea name="description" cols="140" rows="20"><?php echo $news['description']; ?></textarea>
                            <p>Категория</p>
                            <select name="category">
                                <?php if (is_array($categories)): ?>
                                    <?php foreach ($categories as $category): ?>
                                        <option <?php if($category['id'] == $news['category_id']){ echo "selected=\"selected\"";} ?>
                                                value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <br><br>
                            <p>Изображение для новости</p>
                            <img src="<?php echo $newsImage; ?>" width="200" alt="">
                            <input type="file" name="image" placeholder="Изображение для новости" value="">
                            <p>Статус</p>
                            <select name="status">
                                <option value="0" <?php if($news['status'] == 0) echo "selected=\"selected\""; ?>>Скрыт</option>
                                <option value="1" <?php if($news['status'] == 1) echo "selected=\"selected\""; ?>>Отображается</option>
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