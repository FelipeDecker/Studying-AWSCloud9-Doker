<html lang="pt-br">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Decker</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/heroic-features.css" rel="stylesheet">
        
    </head>
    
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#">Listagem de Clientes</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
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
        
        <div class="container">
            
            <?php
                //$con = mysqli_connect("localhost","bob","bob","univille");
                include 'dbconnect.php';
                $sql = "select * from usuario";
                $result = mysqli_query($con,$sql);
            ?>
            
            <header class="jumbotron my-4">
              <p class="lead">
                  <a href="novo.php" class="btn btn-primary btn-lg">Novo</a>
                  <h3>Listagem de clientes</h3>
                  <table class="table">
                     <thead>
                       <tr>
                         <th>id</th>
                         <th>Nome</th>
                         <th>Sobrenome</th>
                         <th>Email</th>
                         <th>Sexo</th>
                         <th colspan="2">Ações</th>
                       </tr>
                     </thead>
                     <tbody>
                        <?php
                            while($row = $result->fetch_row()){
                        ?>
                       <tr>
                         <td><?=$row[0]?></td>
                         <td><?=$row[1]?></td>
                         <td><?=$row[2]?></td>
                         <td><?=$row[3]?></td>
                         <td><?=$row[5]?></td>
                         <td><a href="novo.php?id=<?=$row[0]?>" class="btn btn-primary">Alterar</a></td>
                         <td><a href="exclui.php?id=<?=$row[0]?>" class="btn btn-primary">Excluir</a></td>
                       </tr>
                       <?php
                       }
                       ?>
                       
                     </tbody>
                  </table>
              </p>
            </header>
    
        </div>
        
    </body>
</html>