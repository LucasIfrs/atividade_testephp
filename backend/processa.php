<?php
include __DIR__.'\persistencia\conexao.php';

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    http_response_code(405);
    die();
}
$text = @$_GET['nome'];
$nome = "%{$text}%";



$sql = $mysqli->prepare("SELECT * FROM pessoas WHERE nome LIKE ?");
$sql->bind_param("s", $nome);
$sql->execute();
$result = $sql->get_result();

$countSQL =$mysqli->prepare( "SELECT COUNT(*) as total FROM pessoas WHERE nome like ?");
$countSQL->bind_param("s",$nome);
$countSQL->execute();
$countResult = $countSQL->get_result();
// echo var_dump($countResult->fetch_field('total'));
$countRow = $countResult->fetch_assoc();
$num_rows = $countRow['total'];

if ($num_rows > 0) {
    echo "
        <table class='table'>
            <thead>
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Idade</td>
            </tr>
            </thead>
            <tbody>";

    $row_count = 0;
    while ($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['nome']}</td>
                <td>{$row['idade']}</td>
            </tr>";

        $row_count++;
        if ($row_count >= 5) {
            
            break; // Stop displaying rows after reaching the limit
        }
    }

    echo "
            </tbody>
        </table>";
        if ($row_count >= 5) {
            
            echo "<div class='box'>Existem mais de 5 registros, refine sua pesquisa</div>";
        }
} else {
    echo "Nenhum registro foi encontrado.";
}

?>