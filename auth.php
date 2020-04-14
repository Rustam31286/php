<?php 
  $title = "Войти";
  $style = "";
  require_once('site_components/header.php'); 
  ?>
  
  <div class="container-fluid">
    <div class="row justify-content-center mt-5">
      <div class="col-8">
        <h1 class="text-center">Авторизация</h1>
        <form action="auth_obr.php" method ="POST">
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-secret" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Введите Login" aria-label="Имя пользователя" aria-describedby="basic-addon1" name = "login">
          </div>
          
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-low-vision" aria-hidden="true"></i></span>
            </div>
            <input type="password" class="form-control" placeholder="Введите пароль" aria-label="Имя пользователя" aria-describedby="basic-addon1" name = "pass">
          </div>
          
          
          <input type = "submit" class="btn btn-primary btn-block mt-2" value = "Войти">
          
        </form>
      </div>
    </div>
  </div>

<?php require_once('site_components/footer.php'); ?>
