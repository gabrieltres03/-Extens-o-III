<?php
include 'conexao.php';

$id_produto = $_POST['id_produto']; // recebe o ID do produto via POST
$qntd_produto = $_POST['qntd_produto']; // recebe a quantidade via POST

$sql = "INSERT INTO quantidade (qntd_produto, id_produto) VALUES ($qntd_produto, $id_produto)";

if ($conn->query($sql) === TRUE) {
    echo "Quantidade inserida com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
