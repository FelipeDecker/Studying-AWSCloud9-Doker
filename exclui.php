<?php
    $id = $_GET['id'];
    
    $con = mysqli_connect("localhost","bob","bob","univille");
    $sql = "delete from usuario where codigo = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);
    
    
    if($result==true){
		echo "
		<script>
			alert('Usuário excluido com sucesso!');
			location.href='index.php';
		</script>		
		";
	}else{
		echo "
		<script>
			alert('Erro ao excluir usuário!');
			location.href='index.php';
		</script>		
		";
	}
    
?>