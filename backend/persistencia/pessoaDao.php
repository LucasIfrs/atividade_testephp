<?php
include __DIR__.'\conexao.php';
class pessoaDao{
    //private $mysqli;

    
    public function queryNome($nome){
        $mysqli = new mysqli("localhost", "root", "", "database1");
        
        if ($mysqli->connect_error) {
            die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
        }
        $nome = "%{$nome}%";
        $sql = $mysqli->prepare("SELECT * FROM pessoas WHERE nome LIKE ?");
        $sql->bind_param("s", $nome);
        $sql->execute();
        $result = $sql->get_result();
        return $result;
    }
    public function countNome($nome) {
        $mysqli = new mysqli("localhost", "root", "", "database1");
        
        if ($mysqli->connect_error) {
            die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
        }
        $nome = "%{$nome}%";
        $countSQL =$mysqli->prepare("SELECT COUNT(*) as total FROM pessoas WHERE nome LIKE ?");
        $countSQL->bind_param("s", $nome);
        $countSQL->execute();
        $countResult = $countSQL->get_result();
        $countRow = $countResult->fetch_assoc();
        return $countRow['total'];
    }
}

?>