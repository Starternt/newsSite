<?php include_once ROOT.'/views/layouts/headerAdmin.php'?>
<br><br><br><br><br>
<div class="container">
    <div class="row">
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label for="inputOldPassword" class="control-label col-xs-4">Старый пароль</label>
                <div class="col-xs-4">
                    <input type="password" name="oldPassword" class="form-control" id="inputOldPassword" placeholder="Старый пароль" value ="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputNewPassword" class="control-label col-xs-4">Новый пароль</label>
                <div class="col-xs-4">
                    <input type="password" name="newPassword" class="form-control" id="inputNewPassword" placeholder="Новый пароль" value="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-4 col-xs-4">
                    <button type="submit" name="submit" class="btn btn-primary">Изменить</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once ROOT.'/views/layouts/footerAdmin.php'?>
