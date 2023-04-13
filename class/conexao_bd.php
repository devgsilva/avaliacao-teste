<?php
class conexaoDB
{

    public static $pdo;
    public $hostname;
    public $database;
    public $usuario;
    public $senha;

    public function __construct()
    {
        $this->hostname = 'IP_BANCO_DE_DADOS';
        $this->database = 'avaliacao-teste';
        $this->usuario = 'USUARIO_BANCO_DE_DADOS';
        $this->senha = 'SENHA_DO_USUARIO_BANCO_DE_DADOS';
                
    }

    public function conectaDB()
    {
        try {
            if (!static::$pdo) {
                $dsn = 'mysql:host=' . $this->hostname . ';dbname=' . $this->database;
                $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                static::$pdo = new PDO($dsn, $this->usuario, $this->senha, $opcoes);
            }
            return static::$pdo;
        } catch (PDOException $erro) {
            die("Erro ao conectar ao banco " . $erro->getMessage());
        }
    }
}

?>