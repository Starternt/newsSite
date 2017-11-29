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
                <div class="col-xs-4 alert alert-warning passError" hidden>Длина пароля должна быть не менее 4-х символов!</div>
            </div>
            <div class="form-group">
                <label for="inputNewPassword" class="control-label col-xs-4">Новый пароль</label>
                <div class="col-xs-4">
                    <input type="password" name="newPassword" class="form-control" id="inputNewPassword" placeholder="Новый пароль" value="">
                </div>
                <div class="col-xs-4 alert alert-warning passError" hidden>Длина пароля должна быть не менее 4-х символов!</div>
            </div>
            <div class="form-group">
                <label for="inputNewPassword" class="control-label col-xs-4">Подтвердите пароль</label>
                <div class="col-xs-4">
                    <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Подтвердите пароль" value="">
                </div>
                <div class="col-xs-4 alert alert-warning passError" hidden>Длина пароля должна быть не менее 4-х символов!</div>
            </div>
            <div class="col-xs-4"></div>
            <div class="col-xs-4  alert alert-danger matchPassword" hidden>Пароли не совпадают!</div>

            <div class="form-group">
                <div class="col-xs-offset-4 col-xs-4">
                    <button type="submit" name="submit" class="btn btn-primary buttonChangePass" disabled>Изменить</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once ROOT.'/views/layouts/footerAdmin.php'?>

<script>
    // Setup flags for checking entered data. Allow define when change a state of button "submit"
    var errorFlag = {
        0: false,
        1: false,
        2: false,
        errorFlagCheck: false
    };
    submit = $('[type="submit"]');
    //This function is checking either a length of a password correct or not. Using for all three checks
    function check(elemName, k){
        errorElem = $(".alert");
        pass = elemName.val();
        if(pass.length >= 4){
            errorFlag[k] = true;
            errorElem.eq(k).attr("hidden", "hidden");
            point:
            if(submit.attr("disabled")){
                for(let key in errorFlag){
                    if(errorFlag[key] === false){
                        break point;
                    }
                }
                submit.removeAttr("disabled");
            }
        }
        else {
            errorFlag[k] = false;
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

//This function intended for checking a match of passwords (new and confirming) on keyup of confirm
    confirmPass.keyup(function () {
        newPassValue = newPass.val();
        confirmPassValue = confirmPass.val();
        if(newPassValue !== confirmPassValue){
            $(".matchPassword").removeAttr("hidden");
            errorFlag.errorFlagCheck = false;
            if(!submit.attr("disabled")) {
                submit.attr("disabled", "disabled");
            }
        }
        else {
            $(".matchPassword").attr("hidden", "hidden");
            errorFlag.errorFlagCheck = true;
            point:
                if(submit.attr("disabled")){
                    for(let key in errorFlag){
                        if(errorFlag[key] === false){
                            break point;
                        }
                    }
                    submit.removeAttr("disabled");
                }
        }
    });
    //This function intended for checking a match of passwords (new and confirming) on keyup of new pass
    newPass.keyup(function () {
        newPassValue = newPass.val();
        confirmPassValue = confirmPass.val();
        if(newPassValue !== confirmPassValue){
            $(".matchPassword").removeAttr("hidden");
            errorFlag.errorFlagCheck = false;
            if(!submit.attr("disabled")) {
                submit.attr("disabled", "disabled");
            }
        }
        else {
            $(".matchPassword").attr("hidden", "hidden");
            errorFlag.errorFlagCheck = true;
            point:
                if(submit.attr("disabled")){
                    for(let key in errorFlag){
                        if(errorFlag[key] === false){
                            break point;
                        }
                    }
                    submit.removeAttr("disabled");
                }
        }
    })

</script>