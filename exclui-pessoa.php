<?php
session_start();
if ($_POST["id_pessoa"] && !empty($_POST["id_pessoa"]) && isset($_POST["id_pessoa"])) {
    $id_pessoa = $_POST["id_pessoa"];
    require_once('./class/conexao_bd.php');
    $bd = new conexaoDB();
    $buscarPessoa = $bd->conectaDB()->prepare("SELECT pessoa.nome, pessoa.email, pessoa.sexo, pessoa.nascimento, pessoa.rg, pessoa.cpf, pessoa.telefone, pessoa.celular, profissao.id AS 'profissao_id', profissao.nome AS 'profissao_nome' FROM pessoas AS pessoa INNER JOIN profissoes AS profissao ON pessoa.profissao_id = profissao.id WHERE pessoa.id = ?");
    $buscarPessoa->bindParam(1, $id_pessoa, PDO::PARAM_INT);
    $buscarPessoa->execute();
    if ($buscarPessoa->rowCount() == 1) {
        $dadosPessoa = $buscarPessoa->fetch();
    } else {
        $_SESSION["mensagemErro"] = "ESTE USUÁRIO NÃO PODE SER ALTERADO OU NÃO EXISTE MAIS NO BANCO DE DADOS.";
        exit(header("Location: ./lista-pessoas.php"));
    }
} else {
    $_SESSION["mensagemErro"] = "ESTE USUÁRIO NÃO PODE SER ALTERADO OU NÃO EXISTE MAIS NO BANCO DE DADOS.";
    exit(header("Location: ./lista-pessoas.php"));
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados de <?php echo $dadosPessoa["nome"] ?> - Dzenvolve Teste</title>

    <?php
    #CARREGA AS FOLHAS DE ESTILIZAÇÕES E FONTES.
    include_once("./includes/header.php")
    ?>

</head>

<body>
    <header>
        <div class="container">
            <?php
            include_once('./includes/nav.php');
            ?>
        </div>
    </header>
    <main>
        <div class="container">
            <?php if (isset($_SESSION["mensagemErro"])) { ?>
                <div class="row mensagemRetorno mensagemErroRetorno">
                    <i class="lni lni-close"></i>
                    <p><?php echo $_SESSION["mensagemErro"]; ?></p>
                </div>
            <?php
            }
            unset($_SESSION["mensagemErro"]);
            unset($_SESSION["id_pessoa"]);
            ?>
            <div class="titulo-secao">
                <h3>Deletar os dados de <?php echo $dadosPessoa["nome"] ?></h3>
                <div class="botao-voltar">
                    <a href="./lista-pessoas.php"><i class="lni lni-arrow-left"></i> Voltar</a>
                </div>
            </div>
            <form method="POST">
                <div class="form-row-group">
                    <div class="form-group-items">
                        <label for="">Nome*</label>
                        <input type="text" name="nome_pessoa" id="nome_pessoa" value="<?php echo $dadosPessoa["nome"]; ?>" readonly disabled>
                    </div>
                </div>
                <div class="form-row-group">
                    <div class="form-group-items">
                        <label for="">E-mail*</label>
                        <input type="email" name="email_pessoa" id="email_pessoa" value="<?php echo $dadosPessoa["email"]; ?>" readonly disabled>
                    </div>
                    <div class="form-group-items">
                        <label for="">Profissão*</label>
                        <input type="text" name="profissao_pessoa" id="profissao_pessoa" value="<?php echo $dadosPessoa["profissao_nome"]; ?>" readonly disabled>
                    </div>
                </div>
                <div class="form-row-group">
                    <div class="form-group-items">
                        <label for="">Sexo*</label>
                        <input type="text" name="sexo_pessoa" id="sexo_pessoa" value="<?php echo $dadosPessoa["sexo"]; ?>" readonly disabled>
                    </div>
                    <div class="form-group-items">
                        <label for="">Data de Nascimento</label>
                        <input type="text" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nascimento = str_replace("-", "/", date('d-m-Y', strtotime($dadosPessoa['nascimento']))); ?>" readonly disabled>
                    </div>
                </div>
                <div class="form-row-group">
                    <div class="form-group-items">
                        <label for="">RG*</label>
                        <input type="text" name="rg_pessoa" id="rg_pessoa" value="<?php echo $dadosPessoa["rg"]; ?>" readonly disabled>
                    </div>
                    <div class="form-group-items">
                        <label for="">CPF*</label>
                        <input type="text" name="cpf_pessoa" id="cpf_pessoa" value="<?php echo $dadosPessoa["cpf"]; ?>" readonly disabled>
                    </div>
                </div>
                <div class="form-row-group">
                    <div class="form-group-items">
                        <label for="">Telefone*</label>
                        <input type="text" name="telefone_pessoa" id="telefone_pessoa" value="<?php echo $dadosPessoa["telefone"]; ?>" readonly disabled>
                    </div>
                    <div class="form-group-items">
                        <label for="">Celular*</label>
                        <input type="text" name="celular_pessoa" id="celular_pessoa" value="<?php echo $dadosPessoa["celular"]; ?>" readonly disabled>
                    </div>
                </div>
                <div class="form-row-group">
                    <input type="hidden" name="id_pessoa" id="id_pessoa" value="<?php echo $id_pessoa; ?>">
                </div>
                <div class="form-row-group botao-deletar-registro">
                    <button type="submit" formaction="./class/excluiPessoa.php">Deletar Dados
                        <br>
                        <strong>ATENÇÃO!!! ESSA OPÇÃO NÃO PODERÁ SER DESFEITA!</strong>
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>