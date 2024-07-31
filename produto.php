<?php

include_once 'conectar.php';

// parte 1 - atributos
class Produto
{
    private $id;
    private $nome;
    private $estoque;
    private $conn;

    // parte 2 - os getters e setters

    public function getId()
    {
        return $this->id;
    }

    public function setId($iid)
    {
        $this->id = $iid;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($inome)
    {
        $this->nome = $inome;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function setEstoque($iestoque)
    {
        $this->estoque = $iestoque;
    }

    // parte 3 - métodos

    function salvar()
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("insert into Produto values (null,?,?)");
            @$sql -> bindParam(1, $this -> getNome(), PDO::PARAM_STR);
            @$sql -> bindParam(2, $this -> getEstoque(), PDO::PARAM_STR);
            // PDO::PARAM_STR representa o tipo de dados SQL CHAR, VARCHAR ou outra String. 
            if($sql -> execute() == 1)
            {
                return "Registro salvo com sucesso!";
            }
            $this -> conn = null;
        } catch(PDOException $exc) {
            echo "Erro ao salvar o registo" . $exc -> getMessage();
        }
    }

    function listar()
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> query("select * from produto order by nome");
            $sql -> execute();
            return $sql -> fetchAll();
            $this -> conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc-> getMessage();
        }
    }
} // encerramento de classe Produto

?>