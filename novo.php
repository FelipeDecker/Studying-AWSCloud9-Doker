<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Decker</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/heroic-features.css" rel="stylesheet">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Decker</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <?php
    $id=0;
    $nome = "";
    $sobrenome = "";
    $email = "";
    $senha = "";
    $sexo = "";
    
    
    if(isset($_GET['id'])){
      
        $con = mysqli_connect("localhost","bob","bob","univille");
        $sql = "select codigo, nome, sobrenome, email, senha, sexo from usuario where codigo = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $result);
        $result = mysqli_stmt_get_result($stmt);
        $row = $result->fetch_assoc();
        
        $id = $row['codigo'];
        $nome = $row['nome'];
        $sobrenome = $row['sobrenome'];
        $email = $row['email'];
        $senha = $row['senha'];
        $sexo = $row['sexo'];
        
        if(isset($_GET['erro'])){
          echo "
    			<script>
    				alert('Erro ao editar usuário!');
    			</script>		
    			";
        }
    }
    
  ?>
  
  <div class="container">
    <br>
    <br>
    <br>
    <header class="jumbotron my-4">
      <p class="lead">
    <form method="POST" action="salvaUsuario.php">
      <input type="hidden" name="id" value="<?=$id?>" id="identificador">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nome</label>
          <input type="text" class="form-control" id="inputEmail4" placeholder="Nome" name="nome" value="<?=$nome?>">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Sobrenome</label>
          <input type="text" class="form-control" id="inputPassword4" placeholder="Sobrenome" name="sobrenome" value="<?=$sobrenome?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Email</label>
        <input type="email" class="form-control" id="inputAddress" placeholder="Email" name="email" value="<?=$email?>">
      </div>
      <div class="form-group">
        <label for="inputAddress2"> Senha </label>
        <input type="password" class="form-control" id="inputAddress2" placeholder="Senha" name="senha" value="<?=$senha?>">
      </div>
      <label>Sexo</label>
      <br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1" value="M" <?=($sexo == "M"?"checked":"")?> >
        <label class="form-check-label" for="inlineRadio1">Masculino</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="F" <?=($sexo == "F"?"checked":"")?>>
        <label class="form-check-label" for="inlineRadio2">Feminino</label>
      </div>
      <br>
      <br>
      <button type="submit" class="btn btn-primary">Confirmar</button>
      <br>
      <br>
    </form>
    </p>
    </header>
    
  </div>
  

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Decker Ltda.</p>
    </div>
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <script>
    
    var id = $("#identificador").val();
    
    if(id != 0){
      $("#identificador").hide();
    }
    
  </script>

</body>
</html>
