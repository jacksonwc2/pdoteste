<?php
//require 'classes/Conexao.class.php';
require 'classes/GeneroDAO.class.php';

use lapelicula\db\Conexao;
use lapelicula\dao\GeneroDAO;

// recuperando a conexão ao banco dados
$conexao = Conexao::conectar();

// query é um metodo do PDO para realizar consultas no banco
$resultado = $conexao->
query("select * from tipo_usuario order by destipusu");
// descarrega os dados em forma de vetor associativo
$dados = $resultado->fetchAll();

// percorre o vetor associativo
foreach ($dados as $linha) {
    echo $linha["codtipusu"] . " - " . 
        $linha["destipusu"] . "<br\>";
}

// buscando dados de somente um gênero
$resultadoGenero = $conexao->query("select * from genero
where codgen = 2");
$genero = $resultadoGenero->fetch();
echo "<strong>" . $genero["nomgen"] . "</strong>";



//$codigo = 2;
//$codigo = "2";
$codigo = "2 or 1 = 1";
$resultadoGenero = $conexao->query("select * from genero
where codgen = " . $codigo);
$genero = $resultadoGenero->fetch();
echo "<strong>" . $genero["nomgen"] . "</strong>";

$codigo = 2;
// passagem de parâmetros dinamicamente
$resultadoGenero = $conexao->prepare("select * from genero
where codgen = ?");
$resultadoGenero->execute([$codigo]);
$genero = $resultadoGenero->fetch();
echo "<strong>" . $genero["nomgen"] . "</strong>";


$codigo = 2;
// passagem de parâmetros dinamicamente
$resultadoGenero = $conexao->prepare("select * from genero
where codgen = :codigo");
$resultadoGenero->execute(['codigo' => $codigo]);
$genero = $resultadoGenero->fetch();
echo "<strong>" . $genero["nomgen"] . "</strong>";




// exemplo de insert usando PDO
$insereCategoria = $conexao->prepare("
    insert into categoria(descat) values(?)
");
$insereCategoria->execute(["Série"]);


// exemplo de update usando PDO
$atualizaCategoria = $conexao->prepare("
    update categoria set descat = upper(descat)
");
$atualizaCategoria->execute();

// exemplo de update pelo codigo
$atualizaCategoria = $conexao->prepare("
    update categoria set descat = ? where codcat = ?
");
$atualizaCategoria->execute(["série", 2]);


// exemplo de delete pelo codigo
$excluirTipoUsuario = $conexao->prepare("
    delete from tipo_usuario where codtipusu = ?
");
$excluirTipoUsuario->execute([3]);


$generoDAO = new GeneroDAO();
$generoDAO->inserir(["Terror"]);
















