<?php
    $idPost = $_POST['id'];
    $nomePost = $_POST['nome'];
    $sobrenomePost = $_POST['sobrenome'];
    $emailPost = $_POST['email'];
    $senhaPost = $_POST['senha'];
    $sexoPost = $_POST['sexo'];
    
    if($idPost == 0){
    	
    	$con = mysqli_connect("localhost","bob","bob","univille");
	    $sql = "insert into usuario(nome, sobrenome, email, senha, sexo) values(?, ?, ?, ?, ?)";
	    $stmt = mysqli_prepare($con, $sql);
	    mysqli_stmt_bind_param($stmt, "sssss", $nomePost, $sobrenomePost, $emailPost, $senhaPost, $sexoPost);
	    $result = mysqli_stmt_execute($stmt);
	    
	    if($result==true){
			echo "
			<script>
				alert('Usuário cadastrado com sucesso!');
				location.href='index.php';
			</script>		
			";
		}else{
			echo "
			<script>
				alert('Erro ao cadastrar usuário!');
				location.href='novo.php';
			</script>		
			";
		}
    } else {
    	//$con = mysqli_connect("localhost","bob","bob","univille");
		include 'dbconnect.php';
	    $sql = "update usuario set nome = ?, sobrenome = ?, email = ?, senha = ?, sexo = ? where codigo = ?";
	    $stmt = mysqli_prepare($con, $sql);
	    mysqli_stmt_bind_param($stmt, "ssssss", $nomePost, $sobrenomePost, $emailPost, $senhaPost, $sexoPost, $idPost);
	    $result = mysqli_stmt_execute($stmt);
	    
	    if($result==true){
			echo "
			<script>
				alert('Usuário editado com sucesso!');
				location.href='index.php';
			</script>		
			";
		}else{
			
			header('Location: '. 'novo.php?id=' . $idPost . "&erro=1");
		}
    }
    
?>