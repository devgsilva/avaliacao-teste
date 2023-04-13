<div>
    <h1>Avaliação Técnica</h1>
    <h4>Candidato: Guilherme Henrique Santos da Silva</h4>
</div>
<div>

<h2>AVALIAÇÃO DA COMPETÊNCIA TÉCNICA</h2>

<h3>1. Entrega Obrigatória</h3>

<h4>A partir do banco de dados fornecido, liste em uma tabela HTML apenas as mulheres com idade superior a 20 anos.</h4>

<h4>- Nesta lista deverá conter o nome, sexo, cpf, data de nascimento, e-mail, celular e profissão.</h4>

<h4>- É permitido a utilização de frameworks para estilização da lista.</h4>

<h3>2. Entrega Desejável</h3>

<h4>Crie as ações de incluir novos registros, editar e excluir registros listados na tabela HTML.</h4>

</div>

<hr>

<div style="margin-top: 25px">
    <h3>Estrutura das pastas (escrito por Guilherme Henrique Santos da Silva):</h3>
    <ul>
    <li style="margin-top: 25px">/</li>
        <ul>
            <li><strong>index.php</strong> - Página inicial do projeto. Apresenta apenas um menu de navegação.</li>
             <li><strong>insere-pessoa.php</strong> - Página com formulário para inserção de novos registro.</li>
             <li><strong>lista-pessoas.php</strong> - Página que lista os usuários conforme os critérios informados.</li>
            <li><strong>edita-pessoa.php</strong> - Página para edição do registro selecionado.</li>
             <li><strong>exclui-pessoa.php</strong> - Página para exclusão do registro selecionado.</li>
        </ul>
        <li>class</li>
        <ul>
            <li><strong>conexao_bd</strong> - Responsável por realizar a conexão com o banco de dados</li>
            <li><strong>inserePessoa</strong> - Responsável por realizar inserção (ou não) de um novo usuário.</li>
            <li><strong>listaPessoas</strong> - Responsável por listar os usuários conforme os critérios informados.</li>
            <li><strong>editaPessoa</strong> - Responsável por realizar atualizar (ou não) os dados do usuário selecionado.</li>
            <li><strong>excluiPessoa</strong> - Responsável por realizar a exclusão dos dados do usuário selecionado.</li>
        </ul>
        <li style="margin-top: 25px">css</li>
        <ul>
            <li><strong>core</strong> - Responsável pela estilização gerais do projetos.</li>
            <li><strong>estilo</strong> - Responsável pela estilização das páginas como um todo.</li>
            <li><strong>lineicons</strong> - Responsável pela estilização dos ícones.</li>
            <li><strong>menu-simple</strong> - Responsável pela estilização do menu.</li>
        </ul>
         <li style="margin-top: 25px">fonts</li>
        <ul>
            <li><strong>LineIcons.woff</strong> - Fonte que trabalha em conjunto com o css <strong>lineicons</strong>.</li>
        </ul>
        <li style="margin-top: 25px">includes</li>
        <ul>
            <li><strong>header</strong> - Responsável por carregar todos os css nas páginas do projetos.</li>
            <li><strong>footer</strong> - Responsável por carregar todos os js nas páginas necessárias do projetos.</li>
            <li><strong>nav</strong> - Responsável por carregar todos os css nas páginas do projetos.</li>
        </ul>
         <li style="margin-top: 25px">js</li>
        <ul>
            <li><strong>jquery-3.6.3.min.js</strong> - Lib JS para utilização da lib <strong>jquery.mask.min.js</strong>, que por sua vez é utiliza pelo arquivo <strong>formataCampos.js</strong>.</li>
        </ul>
         <li style="margin-top: 25px">sql</li>
        <ul>
            <li><strong>avaliacao-teste.sql</strong> - Arquivo SQL a ser importado, já contendo as estruturas das tabelas e alguns dados para teste.</li>
        </ul>
    </ul>
</div>