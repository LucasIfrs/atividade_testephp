<?php
include __DIR__.'\conexao.php';
class pessoaDao{
    public function queryNome($nome){
        $mysqli = new mysqli("localhost", "usuario", "senha", "database1");
        
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
        
}
?>