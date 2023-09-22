<?php
include ('conexao.php');
class pessoaDao extends Conexao{
    private $bd;
    
    public function __construct() {
        require_once('./conexao.php');
        $this->bd = new Conexao();
    }

    
    public function queryNome($nome){
        $mysqli = $this->bd->conectaDB();
        $nome = "%{$nome}%";
        $sql = $mysqli->prepare("SELECT * FROM pessoas WHERE nome LIKE ?");
        $sql->bind_param("s", $nome);
        $sql->execute();
        $result = $sql->get_result();
        return $result;
    }
    public function countNome($nome) {
        $mysqli = $this->bd->conectaDB();
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