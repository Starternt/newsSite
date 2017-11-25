<?php include_once ROOT.'/views/layouts/header.php'?>
<br><br><br><br><br>
<div class="container">
    <div class="row">
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label for="inputEmail" class="control-label col-xs-4">Email</label>
                <div class="col-xs-4">
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value ="<?php echo $email; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="control-label col-xs-4">Пароль</label>
                <div class="col-xs-4">
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Пароль" value="<?php echo $password; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-4 col-xs-4">
                    <div class="checkbox">
                        <label><input type="checkbox"> Запомнить</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-4 col-xs-4">
                    <button type="submit" name="submit" class="btn btn-primary">Войти</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once ROOT.'/views/layouts/footer.php'?>
