<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Test de Gasca">
    <meta name="author" content="Miguel Martínez">

    <title>Gasca Materias</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- Custom css -->
    <link href="assets/css/custom.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    


  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">Gasca Tecnologías</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php if (isset($_SESSION['email'])): ?>
          
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
          
          <?php if ($_SESSION['profile'] == 1 || $_SESSION['profile'] == 0): ?>
            <li class="nav-item">
              <a class="nav-link" href="?sec=user">Usuarios</a>
            </li>
            <li>
              <a class="nav-link" href="?sec=subject">Materias</a>
            </li>
          <?php endif ?>
          <?php if ($_SESSION['profile'] == 2): ?>
            <li class="nav-item">
              <a class="nav-link" href="?sec=user">Mis Materias</a>
            </li>
          <?php endif ?>
          </ul>
          <ul class="navbar-nav pull-right">
            <li class="nav-item ">
              <a class="nav-link" href="?sec=auth&action=logout"><?php echo $_SESSION['email'] ?> - Salir</a>
            </li>
          </ul>
        </div>
        <?php endif ?>
      </nav>
    </header>

    <main role="main" class="container">
