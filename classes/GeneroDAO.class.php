<?php
namespace lapelicula\dao;

require 'BaseDAO.class.php';

use PDOException;

define('TABLENAME','genero');

class GeneroDAO extends BaseDAO {
    
    
    public function inserir($dados) {
        try {
            $sql = $this->conexao->prepare("
                insert into " . TABLENAME . "(nomgen) values(?)
            ");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro inserir: " . $e->getMessage();
        }
    }
    
    public function excluir($codigo) {
        try {
            $sql = $this->conexao->prepare(
                "delete from " . TABLENAME . " where codgen = ?");
            $sql->execute([$codigo]);
        } catch (PDOException $e) {
            echo "Erro ao excluir: " . $e->getMessage();
        }
    }

    public function atualizar($dados) {
        try {
            $sql = $this->conexao->prepare(
                "update " . TABLENAME . " set nomgen = ?
                 where codgen = ?"
                );
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro no atualizar: " . $e->getMessage();
        }
    }
    
    public function buscarPorCodigo($codigo) {
        try {
           $sql = $this->conexao->prepare(
               "select * from " . TABLENAME . "
                where codgen = ?"
               );
           $sql->execute([$codigo]);
           $genero = $sql->fetch();
           return $genero;
        } catch (PDOException $e) {
            echo "Erro no buscarPorCodigo: " . $e->getMessage();
        }
    }
    
    public function buscarTodos() {
        try {
            $resultado = $this->conexao->query(
            "select * from " . TABLENAME . " order by nomgen"
                );
            $generos = $resultado->fetchAll();
            return $generos;
        } catch (PDOException $e) {
            echo "Erro no buscarTodos: " . $e->getMessage();
        }
    }
}
