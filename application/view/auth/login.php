<div class="container col-md-3">
    <form class="row g-3" action="<?php echo URL; ?>auth/login" method="POST">

                  <div class="col-12">
                    <h4 class="text-center">Авторизация</h4>
                  </div>
                  <div class="col-12">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control" name="login" required />
                  </div>
                  <div class="col-12">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="password" required>
                  </div>
                  <div class="col-12">
                  <input type="submit" id="but" name="login_action" value="Войти" class="mt-10 w-100 btn btn-primary"/>
                  </div>             
    </form>
    <div class="notify text-danger fw-bold text-center" role="alert"><?php f($notify);?></div>
</div>
