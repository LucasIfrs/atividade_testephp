<?php
include ('Conexao.php');
class PessoaDao {
    

    public function queryNome($nome){
        
        $conexao = new Conexao();
        $pdo =$conexao->getPdo();
        $nome = "%{$nome}%";
        $sql = "SELECT * FROM pessoa WHERE nome ILIKE ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome]);
        $result = $stmt->fetchAll();
        echo var_dump($result);
        return $result;
    }
    public function countNome($nome) {
        $conexao = new Conexao();
        $pdo =$conexao->getPdo();
        $nome = "%{$nome}%";
        $sql = "SELECT COUNT(*) as total FROM pessoa WHERE nome ILIKE ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome]);
        $result = $stmt->fetchAll();
        //echo var_dump($result);
        return $result['total'];
    }
}
$dao = new PessoaDao();
$dao->queryNome('carlos');
//echo var_dump(getenv());


