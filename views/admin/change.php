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
                <div id="passError" class="col-xs-4 alert alert-warning" hidden>Длина пароля должна быть не менее 4-х символов!</div>
            </div>
            <div class="form-group">
                <label for="inputNewPassword" class="control-label col-xs-4">Новый пароль</label>
                <div class="col-xs-4">
                    <input type="password" name="newPassword" class="form-control" id="inputNewPassword" placeholder="Новый пароль" value="">
                </div>
                <div id="passError" class="col-xs-4 alert alert-warning" hidden>Длина пароля должна быть не менее 4-х символов!</div>
            </div>
            <div class="form-group">
                <label for="inputNewPassword" class="control-label col-xs-4">Подтвердите пароль</label>
                <div class="col-xs-4">
                    <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Подтвердите пароль" value="">
                </div>
                <div id="passError" class="col-xs-4 alert alert-warning" hidden>Длина пароля должна быть не менее 4-х символов!</div>
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

<script>
    submit = $('[type="submit"]');
    function check(elemName, k){
        errorElemm = $(".alert").eq(k);
        errorElem = $(".alert");
        console.log(errorElemm);
        pass = elemName.val();
        if(pass.length >= 4){
            errorElem.eq(k).attr("hidden", "hidden");
            if(submit.attr("disabled")){
                submit.removeAttr("disabled");
            }
        }
        else {
            errorElem.eq(k).removeAttr("hidden");
            if(!submit.attr("disabled")) {
                submit.attr("disabled", "disabled");
            }
        }
    }

    oldPass = $("#inputOldPassword");
    newPass = $("#inputNewPassword");
    confirmPass = $("#confirmPassword");

    oldPass[0].addEventListener("keyup", function () {
        check(oldPass, 0);
    });
    newPass[0].addEventListener("keyup", function () {
        check(newPass, 1);
    });
    confirmPass[0].addEventListener("keyup", function () {
        check(confirmPass, 2);
    });
</script>