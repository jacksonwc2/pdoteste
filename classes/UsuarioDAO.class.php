<?php
namespace lapelicula\dao;

require 'BaseDAO.class.php';

use PDOException;

define('TABLENAME','usuario');

class UsuarioDAO extends BaseDAO {  
    
    public function validarLogin($login, $senha) {
        try {
            $sql = $this->conexao->prepare("
                select * from " . TABLENAME . " 
where emausu = ? and senusu = ?");
            $sql->execute([$login, $senha]);
            $usuario = $sql->fetch();
            return $usuario;
        } catch (PDOException $e) {
            echo "Erro validarLogin: " . $e->getMessage();
        }
    }
}
