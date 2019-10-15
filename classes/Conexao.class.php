<?php
namespace lapelicula\db;
// usando dependências do PDO
use PDO;
use PDOException;

/*
 * Classe de conexão ao banco de dados
 */
final class Conexao
{
    private static $instance = null;
    private function __construct(){}
    private function __clone(){}
    
    // método de conexão
    public static function conectar() {
        if (!isset(self::$instance)) {
            // conexão não existe, então cria
            try {
                self::$instance = new PDO("pgsql:host=localhost;dbname=lapeliculadb", // url
                    "postgres", // usuário
                    "postgres" // senha                    
                    );
                self::$instance->setAttribute(
                    PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
                    );
            } catch(PDOException $e) {
                echo "Erro na conexão: " . 
                    $e->getMessage();
            }
        }
        
        return self::$instance;
    }
    
}