<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BeeJee Test</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="<?php echo URL; ?>css/style.css" rel="stylesheet"> -->
</head>
<body>
    <!-- navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BeeJeeTest</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Главная</a>
        </li>
      </ul>
      <div class="d-flex">
            <?php if (isset($logged) && $logged) { ?>
                <span class="nav-link me-md-2" ><?php echo($logged); ?></span>
                <a class="btn btn-primary" href="<?php echo URL; ?>auth/logout" role="button">Выйти</a>
            <?php } else { ?>
                <a class="btn btn-primary" href="<?php echo URL; ?>auth/index" role="button">Войти</a>
            <?php } ?>
      </div>
    </div>
  </div>
</nav>
<?php
function f($var){
        if (isset($var)) echo htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
    }
    
?>