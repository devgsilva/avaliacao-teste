<?php
session_start();
require_once('./class/listaPessoas.php');
$pessoas = new listaPessoas();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Pessoas - Dzenvolve Teste</title>

    <?php
    #CARREGA AS FOLHAS ESTILIZAÇÃO E FONTES.
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
            ?>
            <?php if (isset($_SESSION["mensagemSucesso"])) { ?>
                <div class="row mensagemRetorno mensagemSucesso">
                    <i class="lni lni-checkmark"></i>
                    <p><?php echo $_SESSION["mensagemSucesso"]; ?></p>
                </div>
            <?php
            }
            unset($_SESSION["mensagemSucesso"]);
            ?>
            <div class="titulo-secao">
                <h3>Lista de Pessoas</h3>
                <div class="botao-novo-registro">
                    <a href="./insere-pessoa.php"><i class="lni lni-plus"></i> Novo Registro</a>
                </div>
            </div>
            <div class="tabela-usuarios">
                <?php
                if ($pessoas->buscaPessoasBD()) { ?>
                    <table>
                        <tr>
                            <th>Nome</th>
                            <th>Sexo</th>
                            <th>CPF</th>
                            <th>Data de Nascimento</th>
                            <th>E-mail</th>
                            <th>Celular</th>
                            <th>Profissão</th>
                            <th>Ação</th>
                        </tr>
                        <?php
                        foreach ($pessoas->buscaPessoasBD() as $pessoa) {
                        ?>
                            <tr>
                                <td><?php echo $pessoa['nome']; ?></td>
                                <td><?php echo $pessoa['sexo']; ?></td>
                                <td><?php echo $pessoa['cpf']; ?></td>
                                <td><?php echo $data_nascimento = str_replace("-", "/", date('d-m-Y', strtotime($pessoa['nascimento']))); ?></td>
                                <td><?php echo $pessoa['email']; ?></td>
                                <td><?php echo $pessoa['celular']; ?></td>
                                <td><?php echo $pessoa['profissao']; ?></td>
                                <td>
                                    <div class="form-acao-editar">
                                        <form method="POST">
                                            <input type="hidden" name="id_pessoa" id="id_pessoa" value="<?php echo $pessoa['id']; ?>" readonly required>
                                            <button type="submit" formaction="./edita-pessoa.php"><i class="lni lni-pencil-alt" style="color: #fde047!important;"></i></button>
                                            <button type="submit" formaction="./exclui-pessoa.php"><i class="lni lni-close" style="color: #ef4444 !important;"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                <?php
                } else {
                ?>
                    <div style="width: 100%;">
                        <p><?php echo "Nenhum resultado encontrado."; ?></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>

</body>

</html>