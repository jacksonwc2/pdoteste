<?php
namespace lapelicula\dao;

require 'BaseDAO.class.php';

use PDOException;

define('TABLENAME','filme');

class FilmeDAO extends BaseDAO {
    
    
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
            $sql = $this->conexao->prepare("
                delete from " . TABLENAME . " where codgen = ?");
            $sql->execute([$codigo]);
        } catch (PDOException $e) {
            echo "Erro excluir: " . $e->getMessage();
        }
    }

    public function atualizar($dados) {
        try {
            $sql = $this->conexao->prepare("
                update " . TABLENAME . " set nomgen = ? where codgen = ?");
            $sql->execute($dados);
        } catch (PDOException $e) {
            echo "Erro atualizar: " . $e->getMessage();
        }
    }
    public function buscarPorCodigo($codigo) {
        try {
            $sql = $this->conexao->prepare("
                select * from " . TABLENAME . " where codgen = ?");
            $resultado = $sql->execute([$codigo]);
            $genero = $resultado->fetch();
            return $genero;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    public function buscarTodos() {
        try {
            $sql = $this->conexao->prepare("
                select * from " . TABLENAME);
            $resultado = $sql->query();
            $generos = $resultado->fetchAll();
            return $generos;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}
