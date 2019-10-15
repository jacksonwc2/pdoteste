<?php
namespace lapelicula\dao;

require 'Conexao.class.php';
use lapelicula\db\Conexao;

class BaseDAO {
    protected $conexao = null;
    public function __construct() {
        $this->conexao = Conexao::conectar();
    }
}
