<?php

class listaPessoas
{
    public function buscaPessoasBD()
    {
        require_once('./class/conexao_bd.php');
        $bd = new conexaoDB();
        $stmt = $bd->conectaDB()->prepare("SELECT CURDATE(), pessoas.id, pessoas.nome, pessoas.sexo, pessoas.cpf, pessoas.nascimento, pessoas.email, pessoas.celular, profissoes.nome as profissao FROM pessoas INNER JOIN profissoes ON pessoas.profissao_id = profissoes.id WHERE sexo = 'Feminino' AND TIMESTAMPDIFF(YEAR, pessoas.nascimento, CURDATE()) > 20 ORDER BY pessoas.nome");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() >= 1) {
            return $stmt;
        } else {
            return FALSE;
        }
    }
}
