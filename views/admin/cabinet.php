<?php include_once ROOT . '/views/layouts/headerAdmin.php' ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <h4>Добрый день, администратор!</h4>

            <br/>

            <p>Вам доступны такие возможности:</p>

            <br/>

            <ul>
                <li><a href="/admin/news">Управление новостями</a></li>
                <li><a href="/admin/category">Управление разделами</a></li>
            </ul>
            <div class="cabinet-options">
                <a href="/logout">
                    <button class="btn btn-default">Выйти из аккаунта</button>
                </a>
                <a href="/change">
                    <button class="btn btn-default">Изменить пароль</button>
                </a>
            </div>

        </div>
    </div>
</section>

<?php include_once ROOT . '/views/layouts/footerAdmin.php' ?>
