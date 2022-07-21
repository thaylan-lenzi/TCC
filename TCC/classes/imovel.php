<?php

include_once "conn.php";
include_once "usuario.php";
class Imovel{

	private $con;
	private $obji;
    private $idImovel;
    private $idUsuario;
    private $situacao;
    private $tipo;  
    private $tipo2;
    private $cep;       
    private $endereco;  
    private $bairro;
    private $cidade;
    private $estado;
    private $complemento;
    private $area_util;
    private $area_total;
    private $numero_casa;  
    private $numero_banheiro;
    private $numero_garagem;
    private $descricao;


	public function __construct(){
		$this->con = new conexao();
		$this->obji = new funcoes();
	}

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}


    public function queryInsert($dados){
        try{
        $this->idUsuario = $_SESSION['id'];
        $this->situacao = $this->obji->tratarCaracter($dados['situacao'], 1);
        $this->tipo = $this->obji->tratarCaracter($dados['tipo'], 1);
        $this->tipo2 = $this->obji->tratarCaracter($dados['tipo2'], 1);
        $this->cep = $this->obji->tratarCaracter($dados['cep'], 1);
        $this->endereco = $this->obji->tratarCaracter($dados['endereco'], 1);
        $this->bairro = $this->obji->tratarCaracter($dados['bairro'], 1);
        $this->cidade = $this->obji->tratarCaracter($dados['cidade'], 1);
        $this->estado = $this->obji->tratarCaracter($dados['estado'], 1);
        $this->complemento = $this->obji->tratarCaracter($dados['complemento'], 1);
        $this->area_util = intval($dados['area_util']); 
        $this->area_total = intval($dados['area_total']);
        $this->numero_casa = intval($dados['numero_casa']);
        $this->numero_quarto = intval($dados['numero_quarto']);
        $this->numero_banheiro = intval($dados['numero_banheiro']);
        $this->numero_garagem = intval($dados['numero_garagem']);
        $this->descricao = $this->obji->tratarCaracter($dados['descricao'], 1);
        $cst = $this->con->conectar()->prepare("INSERT INTO `imovel` (`idUsuario`, `situacao`, `tipo`, `tipo2`, `cep`, `endereco`, `bairro`, `cidade`, `estado`, `complemento`, `area_util`, `area_total`, `numero_casa`, `numero_quarto`, `numero_banheiro`, `numero_garagem`, `descricao`) VALUES (:idUsuario, :situacao, :tipo, :tipo2, :cep, :endereco, :bairro, :cidade, :estado, :complemento, :area_util, :area_total, :numero_casa, :numero_quarto, :numero_banheiro, :numero_garagem, :descricao);");
        $cst->bindParam(":idUsuario", $this->idUsuario, PDO::PARAM_STR);
        $cst->bindParam(":situacao", $this->situacao, PDO::PARAM_STR);
        $cst->bindParam(":tipo", $this->tipo, PDO::PARAM_STR);
        $cst->bindParam(":tipo2", $this->tipo2, PDO::PARAM_STR);
        $cst->bindParam(":cep", $this->cep, PDO::PARAM_STR);
        $cst->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
        $cst->bindParam(":bairro", $this->bairro, PDO::PARAM_STR);
        $cst->bindParam(":cidade", $this->cidade, PDO::PARAM_STR);
        $cst->bindParam(":estado", $this->estado, PDO::PARAM_STR);
        $cst->bindParam(":complemento", $this->complemento, PDO::PARAM_STR);
        $cst->bindParam(":area_util", $this->area_util, PDO::PARAM_STR);
        $cst->bindParam(":area_total", $this->area_total, PDO::PARAM_STR);
        $cst->bindParam(":numero_casa", $this->numero_casa, PDO::PARAM_STR);
        $cst->bindParam(":numero_quarto", $this->numero_quarto, PDO::PARAM_STR);
        $cst->bindParam(":numero_banheiro", $this->numero_banheiro, PDO::PARAM_STR);
        $cst->bindParam(":numero_garagem", $this->numero_garagem, PDO::PARAM_STR);
        $cst->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
        if($cst->execute()){
            return 'ok';
        }else{
            return 'Error ao cadastrar';
        }
    }catch(PDOException $e){
        return 'Error: '.$e->getMessage();
    }
}

public function imovel($dado){
    $cst = $this->con->conectar()->prepare("SELECT * FROM `imovel` WHERE `idImovel` = :idImovel;");
    $cst->bindParam(':idImovel', $dado, PDO::PARAM_INT);
    $cst->execute();
    $rst = $cst->fetchAll();
    $_SESSION['descricao'] = $rst['descricao'];
    }


}
