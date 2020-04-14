<?php
  session_start();
  if(!$_SESSION['id']) {
    header('Location: auth.php');
  }
//include()  / include_once(); - пропускает ошибку на подключаемой странице
//require()  / require_once(); - не пропускает ошибку на подключаемую страницу
$title = "Личный кабинет";
$style = '
    td {
      font-size: 22px;
      }
      table {
        width: 100%;
        margin-top: 50px;
      }
      .fa-pencil, .fa-check, .fa-times {
        cursor: pointer;
      }
';
require_once('site_components/header.php');
?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Личный кабинет</title>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <h1 class="text-center mt-5">Личный кабинет</h1>
          <h4>Здравствуйте, <span><?php echo $_SESSION['name'] ?></span> </h4>
          <table style="width:100%">
            
            <tr>
              <td>Логин:</td>
              <td class="data" data="login"><?= $_SESSION['login']; ?></td>
              <td>
                <span class="edit">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                </span>
                <span class="startedit d-none">
                  <i class="fa fa-check" aria-hidden="true"></i>
                  <i class="fa fa-times" aria-hidden="true"></i>
                </span>
              </td>
            </tr>
            
            <tr>
              <td>Фамилия:</td>
              <td><?= $_SESSION['lastname']; ?></td>
            </tr>
            
            <tr>
              <td>Имя:</td>
              <td><?= $_SESSION['name']; ?></td>
            </tr>
            
            <tr>
              <td>Отчество:</td>
              <td><?= $_SESSION['patronymic']; ?></td>
            </tr>
            
            <tr>
              <td>Дата рождения:</td>
              <td><?= $_SESSION['birthdate']; ?></td> 
            </tr>
            
          </table>
          <p><span></span></p>
        </div>
      </div>
    </div>
    <script>
      let pens = document.querySelectorAll('.fa-pencil');
      for (let i=0; i < pens.length; i++) {
        pens[i].onclick = startEdit;
      }
      function startEdit() {
        let buttonsTd = this.parentElement.parentElement;
        let dataTd = buttonsTd.previousElementSibling;
        let editSpan = buttonsTd.querySelector('.edit');
        let startEditSpan = buttonsTd.querySelector('.startedit');
        
        startEditSpan.classList.remove('d-none');
        editSpan.classList.add('d-none');
        
        let okBtn = buttonsTd.querySelector('.fa-check');
        let denyBtn = buttonsTd.querySelector('.fa-times');
        
        denyBtn.onclick = () => {
          startEditSpan.classList.add('d-none');
          editSpan.classList.remove('d-none');
        }
      }
    </script>
<?php require_once('site_components/footer.php'); ?>