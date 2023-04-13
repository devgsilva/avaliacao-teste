<?php
session_start();
class editaPessoa {

    private $id_pessoa;
    private $nome_pessoa;
    private $email_pessoa;
    private $profissao_pessoa;
    private $sexo_pessoa;
    private $data_nascimento;
    private $rg_pessoa;
    private $cpf_pessoa;
    private $telefone_pessoa;
    private $celular_pessoa;
    private $bd;

    public function __construct()
    {
        $this->id_pessoa = $_POST["id_pessoa"];
        $this->nome_pessoa = $_POST["nome_pessoa"];
        $this->email_pessoa = $_POST["email_pessoa"];
        $this->profissao_pessoa = $_POST["profissao_pessoa"];
        $this->sexo_pessoa = $_POST["sexo_pessoa"];
        $this->data_nascimento = $_POST["data_nascimento"];
        $this->rg_pessoa = $_POST["rg_pessoa"];
        $this->cpf_pessoa = $_POST["cpf_pessoa"];
        $this->telefone_pessoa = $_POST["telefone_pessoa"];
        $this->celular_pessoa = $_POST["celular_pessoa"];

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
            }
            else {
                unset($stmt);
                $_SESSION["mensagemErro"] = "USÁRIO INVÁLIDO!";
                exit(header("Location: ./../lista-pessoas.php"));
            }
            
        } else {
            $_SESSION["mensagemErro"] = "USÁRIO INVÁLIDO!";
            exit(header("Location: ./../lista-pessoas.php"));
        }
    }
    

    public function validaNomePessoa() {
        if (isset($this->nome_pessoa) && is_string($this->nome_pessoa)) {
            return $this->nome_pessoa;
        }
        else {
            $_SESSION["id_pessoa"] = $this->id_pessoa;
            $_SESSION["mensagemErro"] = "Gentileza preencher o campo de nome!";
        exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
        }
    }

    public function validaEmailPessoa()
    {
        if (isset($this->email_pessoa)) {
            $stmt = $this->bd->conectaDB()->prepare("SELECT id, email FROM pessoas WHERE id <> ? AND email = ?");
            $stmt->bindParam(1, $this->id_pessoa, PDO::PARAM_INT);
            $stmt->bindParam(2, $this->email_pessoa, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() == 1) {
                unset($stmt);
                $_SESSION["id_pessoa"] = $this->id_pessoa;
                $_SESSION["mensagemErro"] = "Este e-mail já está sendo utilizado";
                exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
            } else {
                unset($stmt);
                return $this->email_pessoa;
            }
        } else {
            $_SESSION["id_pessoa"] = $this->id_pessoa;
            $_SESSION["mensagemErro"] = "Gentileza preencher o campo de email!";
            exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
        }
    }

    public function validaProfissaoPessoa()
    {
        if (isset($this->profissao_pessoa)) {
            return $this->profissao_pessoa;
        } else {
            $_SESSION["id_pessoa"] = $this->id_pessoa;
            $_SESSION["mensagemErro"] = "Profissão inválida!";
            exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
        }
    }

    public function validaSexoPessoa()
    {
        if (isset($this->sexo_pessoa) && is_string($this->sexo_pessoa)) {
            return $this->sexo_pessoa;
        } else {
            $_SESSION["id_pessoa"] = $this->id_pessoa;
            $_SESSION["mensagemErro"] = "Gentileza preencher o campo de gênero corretamente!";
            exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
        }
    }

    public function validaNascimentoPessoa()
    {
        if (isset($this->data_nascimento) && is_string($this->data_nascimento)) {
            $this->data_nascimento = str_replace("/", "-", date('Y-m-d', strtotime($this->data_nascimento)));
            return $this->data_nascimento;
        } else {
            $_SESSION["id_pessoa"] = $this->id_pessoa;
            $_SESSION["mensagemErro"] = "Gentileza preencher o campo da data de nascimento!";
            exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
        }
    }

    public function validaCpfPessoa()
    {
        if (isset($this->cpf_pessoa) && is_string($this->cpf_pessoa)) {
            $stmt = $this->bd->conectaDB()->prepare("SELECT id, cpf FROM pessoas WHERE id <> ? AND cpf = ?");
            $stmt->bindParam(1, $this->id_pessoa, PDO::PARAM_INT);
            $stmt->bindParam(2, $this->cpf_pessoa, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() == 1) {
                unset($stmt);
                $_SESSION["id_pessoa"] = $this->id_pessoa;
                $_SESSION["mensagemErro"] = "Este CPF já está sendo utilizado";
                exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
            } else {
                unset($stmt);
                return $this->cpf_pessoa;
            }
        } else {
            $_SESSION["id_pessoa"] = $this->id_pessoa;
            $_SESSION["mensagemErro"] = "Gentileza preencher o campo de CPF!";
            exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
        }
    }

    public function validaRgPessoa()
    {
        if (isset($this->rg_pessoa) && is_string($this->rg_pessoa)) {
            $stmt = $this->bd->conectaDB()->prepare("SELECT id, rg FROM pessoas WHERE id <> ? AND rg = ?");
            $stmt->bindParam(1, $this->id_pessoa, PDO::PARAM_INT);
            $stmt->bindParam(2, $this->rg_pessoa, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() == 1) {
                unset($stmt);
                $_SESSION["id_pessoa"] = $this->id_pessoa;
                $_SESSION["mensagemErro"] = "Este RG já está sendo utilizado";
                exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
            } else {
                unset($stmt);
                return $this->rg_pessoa;
            }
        } else {
            $_SESSION["id_pessoa"] = $this->id_pessoa;
            $_SESSION["mensagemErro"] = "Gentileza preencher o campo de RG!";
            exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
        }
    }

    public function validaTelefonePessoa()
    {
        if (isset($this->telefone_pessoa) && is_string($this->telefone_pessoa)) {
            return $this->telefone_pessoa;
        } else {
            $_SESSION["id_pessoa"] = $this->id_pessoa;
            $_SESSION["mensagemErro"] = "Gentileza preencher o campo de telefone!";
            exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
        }
    }

    public function validaCelularPessoa()
    {
        if (isset($this->telefone_pessoa) && is_string($this->telefone_pessoa)) {
            return $this->telefone_pessoa;
        } else {
            $_SESSION["id_pessoa"] = $this->id_pessoa;
            $_SESSION["mensagemErro"] = "Gentileza preencher o campo de celular!";
            exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
        }
    }

    public function ataulizaDados() {
        $stmt = $this->bd->conectaDB()->prepare("UPDATE pessoas SET nome = ?, nascimento = ?, sexo =?, cpf = ?, rg = ?, email = ?, telefone = ?, celular = ?, profissao_id = ? WHERE id = ?");
        $stmt->bindParam(1, $this->nome_pessoa, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->data_nascimento, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->sexo_pessoa, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->cpf_pessoa, PDO::PARAM_STR);
        $stmt->bindParam(5, $this->rg_pessoa, PDO::PARAM_STR);
        $stmt->bindParam(6, $this->email_pessoa, PDO::PARAM_STR);
        $stmt->bindParam(7, $this->telefone_pessoa, PDO::PARAM_STR);
        $stmt->bindParam(8, $this->celular_pessoa, PDO::PARAM_STR);
        $stmt->bindParam(9, $this->profissao_pessoa, PDO::PARAM_INT);
        $stmt->bindParam(10, $this->id_pessoa, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {
            unset($stmt);
            $_SESSION["mensagemSucesso"] = "Os dados do usuário " . $this->nome_pessoa . " foi atualizado com sucesso!";
            exit(header("Location: ./../lista-pessoas.php"));
        }
        else {
            $_SESSION["id_pessoa"] = $this->id_pessoa;
            $_SESSION["mensagemErro"] = "Erro ao tentar atualizar os dados do usuário " . $this->nome_pessoa . "!";
            exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
        }
    }

}

$editaPessoa = new editaPessoa();
$editaPessoa->validaIdPessoa();
$editaPessoa->validaNomePessoa();
$editaPessoa->validaEmailPessoa();
$editaPessoa->validaProfissaoPessoa();
$editaPessoa->validaSexoPessoa();
$editaPessoa->validaNascimentoPessoa();
$editaPessoa->validaRgPessoa();
$editaPessoa->validaCpfPessoa();
$editaPessoa->validaTelefonePessoa();
$editaPessoa->validaCelularPessoa();
$editaPessoa->ataulizaDados();
?>