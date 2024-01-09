<?php
// Conecta ao banco de dados usando PDO
$host = 'localhost';
$dbname = 'pedidos';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
} catch (PDOException $e) {
    die ("Erro ao conectar ao banco de dados".$e->getMessage());
}
//verifica se os dados forem enviados
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $data = $_POST['data'];
    $cliente = $_POST['cliente'];
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    // inserir os dados na tabela pedidos
    $sql = "INSERT INTO pedidos (data,cliente,produto,valor) VALUES (:data,:cliente,:produto,:valor)";
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':data',$data);
    $stmt->bindValue(':cliente',$cliente);
    $stmt->bindValue(':produto',$produto);
    $stmt->bindValue(':valor',$valor);
    $stmt->execute();
    //volta para a página inicial
    header('Location:index.php'); 
    exit();
}
?>
<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>
</html> -->