<?php
include 'conexao.php';

$produto = $_POST['produto'];
$quantidade = $_POST['quantidade'];

// Utilize prepared statements para evitar SQL injection
$stmt = $conn->prepare("SELECT id_produto FROM produto WHERE nome=?");
$stmt->bind_param("s", $produto);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_produto = $row['id_produto'];

    // Utilize prepared statements para evitar SQL injection
    $stmt = $conn->prepare("INSERT INTO quantidade (qntd_produto, id_produto) VALUES (?, ?)");
    $stmt->bind_param("ii", $quantidade, $id_produto);
    if ($stmt->execute()) {
        echo "Entrada de notas fiscais registrada com sucesso!";
    } else {
        echo "Erro ao registrar entrada: " . $stmt->error;
    }
} else {
    echo "Produto não encontrado!";
}

$stmt->close();
$conn->close();
?>
