<?php
session_start();
class excluiPessoa
{

    private $id_pessoa;
    private $nome_pessoa;
    private $bd;

    public function __construct()
    {
        $this->id_pessoa = $_POST["id_pessoa"];
        $this->nome_pessoa = $_POST["nome_pessoa"];

        require_once('../class/conexao_bd.php');
        $this->bd = new conexaoDB();
    }

    public function validaIdPessoa()
    {
        if (isset($this->id_pessoa) && is_numeric($this->id_pessoa)) {
            $stmt = $this->bd->conectaDB()->prepare("SELECT id FROM pessoas WHERE id = ?");
            $stmt->bindParam(1, $this->id_pessoa, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() == 1) {
                unset($stmt);
                return $this->id_pessoa;
            } else {
                unset($stmt);
                $_SESSION["mensagemErro"] = "USÁRIO INVÁLIDO!";
                exit(header("Location: ./../lista-pessoas.php"));
            }
        } else {
            $_SESSION["mensagemErro"] = "USÁRIO INVÁLIDO!";
            exit(header("Location: ./../lista-pessoas.php"));
        }
    }

    public function validaNomePessoa()
    {
        return $this->nome_pessoa;
    }

    public function realizaExclusao()
    {
        $stmt = $this->bd->conectaDB()->prepare("DELETE FROM pessoas WHERE id = ?");
        $stmt->bindParam(1, $this->id_pessoa, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {
            unset($stmt);
            $_SESSION["mensagemSucesso"] = "Os dados do usuário " . $this->nome_pessoa . " foram excluídos com sucesso!";
            exit(header("Location: ./../lista-pessoas.php"));
        } else {
            $_SESSION["id_pessoa"] = $this->id_pessoa;
            $_SESSION["mensagemErro"] = "Erro ao tentar excluir os dados do usuário " . $this->nome_pessoa . "!";
            exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
        }
    }
}

$excluiPessoa = new excluiPessoa();
$excluiPessoa->validaIdPessoa();
$excluiPessoa->realizaExclusao();
