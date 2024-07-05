<?php
include 'conexao.php'; // Inclui o arquivo de conexão

$nome = $_POST['nome']; // Recebe o nome do produto via POST
$quantidade = $_POST['quantidade']; // Recebe a quantidade do produto via POST

// Insere o produto e a quantidade na tabela
$sql = "INSERT INTO produto (nome, quantidade) VALUES ('$nome', $quantidade)";

if ($conn->query($sql) === TRUE) {
    echo "Novo produto inserido com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close(); // Fecha a conexão
?>
