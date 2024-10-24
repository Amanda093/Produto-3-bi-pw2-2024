<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<?php

include_once 'conectar.php';

class Produto {
    // parte 1 - atributos
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
                return '
                <script type="text/javascript">
                    $(document).ready(function() {
                    Swal.fire({
                        title: "Cadastrado com sucesso!",
                        confirmButtonColor: "#39393b",
                        color: "#201b2c",
                        
                        imageUrl: "img/zebra correndo.gif",
                        imageWidth: 200,
                        imageAlt: "Zebra correndo",
                        
                        background: "#100d16",
                    });
                });
                </script>';
            }
            $this -> conn = null;
        } catch(PDOException $exc) {
            return '
            <script type="text/javascript">
            $(document).ready(function(){
                Swal.fire ({
                title: "Houve um erro ao registrar!",
                footer: "'. $exc -> getMessage() . '",
                
                confirmButtonColor: "#39393b",
                color: "#201b2c",

                imageUrl: "img/zebra correndo.gif",
                imageWidth: 200,
                imageAlt: "Zebra correndo",

                background: "#100d16",
                })
              });
            </script>';
        }
    }

    function alterar() 
    {
        try {
            $this ->  conn = new Conectar();
            $sql = $this -> conn -> prepare("select * from produto where id = ?"); // informei o ? (parametro)
            @$sql -> bindParam(1, $this -> getId(), PDO::PARAM_STR); // inclui esta linha para definir o parametro
            $sql -> execute();
            return $sql -> fetchAll();
            $this -> conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao alterar. " . $exc -> getMessage();
        }
    }
    function alterar2() 
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("update produto set nome = ?, estoque = ? where id = ?");
            @$sql -> bindParam(1, $this -> getNome(), PDO::PARAM_STR);
            @$sql -> bindParam(2, $this -> getEstoque(), PDO::PARAM_STR);
            @$sql -> bindParam(3, $this -> getId(), PDO::PARAM_STR);
            if($sql -> execute() == 1) {
                return "Registro alterado com sucesso!";
            }
            $this -> conn = null;
        } catch (PDOExceotuib $exc) {
            echo "Erro ao salvar o registro. " . $exc -> getMessage();
        }
    }

    function consultar() 
    {
        try {
            $this -> conn = new Conectar();
            $query = $this -> getNome() ;
            $query = "%" . $query . "%";
            $sql = $this -> conn -> prepare("select * from produto where nome like ?"); // informei o ? (parametro)
            @$sql ->  bindParam(1, $query, PDO::PARAM_STR); // inclui esta linha para definir o parametro
            $sql -> execute();
            return $sql -> fetchAll();
            $this -> conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar a consulta. " . $exc -> getMessage();
        }
    }

    function exclusao() 
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> prepare("delete from produto where id = ?"); // informei o ? (parametro)
            @$sql ->  bindParam(1, $this -> getId(), PDO::PARAM_STR); // inclui esta linha para definir o parametro
            if($sql -> execute() == 1) {
                echo '
                <script type="text/javascript">
                    $(document).ready(function() {
                    Swal.fire({
                        title: "Excluido com sucesso!",
                        confirmButtonColor: "#39393b",
                        color: "#201b2c",
                        
                        imageUrl: "img/zebra correndo.gif",
                        imageWidth: 200,
                        imageAlt: "Zebra correndo",
                        
                        background: "#100d16",
                    });
                });
                </script>';
            } 
            else {
                return "Erro na exclusão! "; 
            }
        } catch (PDOException $exc) {
            echo "Erro ao excluir. " . $exc -> getMessage();
        }
    }

    function listar()
    {
        try {
            $this -> conn = new Conectar();
            $sql = $this -> conn -> query("select * from produto order by id");
            $sql -> execute();
            return $sql -> fetchAll();
            $this -> conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc-> getMessage();
        }
    }
} // encerramento da classe Produto

?>