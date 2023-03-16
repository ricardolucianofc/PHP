<?php
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

foreach ($_GET as $chave => $valor) {
    $$chave = mysqli_real_escape_string($conn, $valor);
}

$campos = array();
$valores = array();
foreach ($_GET as $chave => $valor) {
    $campos[] = $chave;
    $valores[] = "'$valor'";
}

$campos_str = implode(",", $campos);
$valores_str = implode(",", $valores);

$sql_select = "SELECT * FROM minha_tabela WHERE id = $id";
$result_select = mysqli_query($conn, $sql_select);

if (mysqli_num_rows($result_select) > 0) {
    $sets = array();
    foreach ($_GET as $chave => $valor) {
        $sets[] = "$chave = '$valor'";
    }
    $sets_str = implode(",", $sets);
    $sql = "UPDATE minha_tabela SET $sets_str WHERE id = $id";
} else {
    $sql = "INSERT INTO minha_tabela ($campos_str) VALUES ($valores_str)";
}

if (mysqli_query($conn, $sql)) {
    echo "Operação realizada com sucesso";
} else {
    echo "Erro ao executar a operação: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
