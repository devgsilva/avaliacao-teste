<?php
session_start();
require_once('./class/conexao_bd.php');
$bd = new conexaoDB();
$buscarProfissoes = $bd->conectaDB()->prepare("SELECT id, nome FROM profissoes ORDER BY nome");
$buscarProfissoes->execute();
$profissoes =  $buscarProfissoes->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Registro - Dzenvolve Teste</title>

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
                <h3>Cadastar Nova Pessoa</h3>
                <div class="botao-voltar">
                    <a href="./lista-pessoas.php"><i class="lni lni-arrow-left"></i> Voltar</a>
                </div>
            </div>
            <form method="POST">
                <div class="form-row-group">
                    <div class="form-group-items">
                        <label for="">Nome*</label>
                        <input type="text" name="nome_pessoa" id="nome_pessoa" required>
                    </div>
                </div>
                <div class="form-row-group">
                    <div class="form-group-items">
                        <label for="">E-mail*</label>
                        <input type="email" name="email_pessoa" id="email_pessoa" required>
                    </div>
                    <div class="form-group-items">
                        <label for="">Profissão*</label>
                        <select name="profissao_pessoa" id="profissao_pessoa" required>
                            <?php
                            foreach ($profissoes as $profissao) {
                            ?>
                                <option value="<?php echo $profissao["id"]; ?>"><?php echo $profissao["nome"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row-group">
                    <div class="form-group-items">
                        <label for="">Sexo*</label>
                        <select name="sexo_pessoa" id="sexo_pessoa" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group-items">
                        <label for="">Data de Nascimento</label>
                        <input type="text" name="data_nascimento" id="data_nascimento" required>
                    </div>
                </div>
                <div class="form-row-group">
                    <div class="form-group-items">
                        <label for="">RG*</label>
                        <input type="text" name="rg_pessoa" id="rg_pessoa" required>
                    </div>
                    <div class="form-group-items">
                        <label for="">CPF*</label>
                        <input type="text" name="cpf_pessoa" id="cpf_pessoa" required>
                    </div>
                </div>
                <div class="form-row-group">
                    <div class="form-group-items">
                        <label for="">Telefone*</label>
                        <input type="text" name="telefone_pessoa" id="telefone_pessoa" required>
                    </div>
                    <div class="form-group-items">
                        <label for="">Celular*</label>
                        <input type="text" name="celular_pessoa" id="celular_pessoa" required>
                    </div>
                </div>
                <div class="form-row-group botao-atualizar-registro">
                    <button type="submit" formaction="./class/inserePessoa.php">Cadastar Dados</button>
                </div>
            </form>
        </div>
    </main>
    <?php

    #CARREGA O JAVASCRIPT (JQUERY) PARA FORMATAR CAMPOS
    require_once('./includes/footer.php');

    ?>
</body>

</html>