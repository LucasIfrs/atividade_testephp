<?php
include __DIR__.'\conexao.php';

if (!empty($_POST['campo'])) {
    $campo = "%" . $_POST['campo'] . "%";

    $sql = $mysqli->prepare("SELECT * FROM pessoas WHERE nome LIKE ?");
    $sql->bind_param("s", $campo);
    $sql->execute();
    $result = $sql->get_result();
    $num_rows = $result->num_rows;

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
}
?>