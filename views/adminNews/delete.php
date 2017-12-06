<?php include ROOT . '/views/layouts/headerAdmin.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <br/>

                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/category">Управление новостями</a></li>
                        <li class="active">Удалить новость</li>
                    </ol>
                </div>
                <h4>Вы действительно хотите удалить новость #<?php echo $id . ' (' . $news['title'] . ')'; ?>?</h4>
                <form action="" method="post">
                    <input type="submit" name="submit" value="Подтвердить">
                </form>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footerAdmin.php'; ?>