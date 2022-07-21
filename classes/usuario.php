<?php

include_once "conn.php";
include_once "funcoes.php";

class Usuario{

	private $con;
	private $obju;
	private $idUsuario;
	private $nome;
	private $email;
	private $senha;

	public function __construct(){
		$this->con = new Conexao();
		$this->obju = new Funcoes();
	}

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}
	
	public function querySeleciona($dado){
		$this->idUsuario = $this->obju->base64($dado, 2);
		try{
			$cst = $this->con->conectar()->prepare("SELECT `idUsuario`, `nome`, `email`, FROM `user` WHERE `idUsuario` = :idUsuario;");
			$cst->bindParam(":idUsuario", $this->idUsuario, PDO::PARAM_INT);
			if($cst->execute()){
				return $cst->fetch();
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function querySelect(){
		try{
			$cst = $this->con->conectar()->prepare("SELECT `idUsuario`, `nome`, `email`, FROM `user`");
			$cst->execute();
			return $cst->fetchAll();
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}	
	}
	
	public function queryInsert($dados){
		try{
			$this->nome = $this->obju->tratarCaracter($dados['nome'], 1);
			$this->email = $this->obju->tratarCaracter($dados['email'], 1);
			$this->senha = sha1($dados['senha']);
			$cst = $this->con->conectar()->prepare("INSERT INTO `user` (`nome`, `email`, `senha`) VALUES (:nome, :email, :senha);");
			$cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
			$cst->bindParam(":email", $this->email, PDO::PARAM_STR);
			$cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
			if($cst->execute()){
				return 'ok';
			}else{
				return 'Error ao cadastrar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function queryUpdade($dados){
		try{
			$this->idUsuario = $this->obju->base64($dados['id'], 2);
			$this->nome = $dados['nome'];
			$this->email = $dados['email'];
			$cst = $this->con->conectar()->prepare("UPDATE `user` SET `nome` = :nome, `email` = :email WHERE `idUsuario` = :idUsuario;");
			$cst->bindParam(":idUsuario", $this->idUsuario, PDO::PARAM_INT);
			$cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
			$cst->bindParam(":email", $this->email, PDO::PARAM_STR);
			if($cst->execute()){
				return 'ok';
			}else{
				return 'Error ao alterar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function queryDelete($dado){
		try{
			$this->idUsuario = $this->obju->base64($dado, 2);
			$cst = $this->con->conectar()->prepare("DELETE FROM `user` WHERE `idUsuario` = :idUsuario;");
			$cst->bindParam(":idUsuario", $this->idUsuario, PDO::PARAM_INT);
			if($cst->execute()){
				return 'ok';
			}else{
				return 'Erro ao deletar';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function logarUsuario($dados){
		$this->email = $dados['email'];
		$this->senha = sha1($dados['senha']);
		try{
			$cst = $this->con->conectar()->prepare("SELECT `idUsuario`, `email`, `senha` FROM `user` WHERE `email` = :email AND `senha` = :senha;");
			$cst->bindParam(':email', $this->email, PDO::PARAM_STR);
			$cst->bindParam(':senha', $this->senha, PDO::PARAM_STR);
			$cst->execute();
			if($cst->rowCount() == 0){
				return 'error';
			}else{
				session_start();
				$rst = $cst->fetch();
				$_SESSION['logado'] = true;
				$_SESSION['id'] = $rst['idUsuario'];
				header("location: index.php");
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
	
	public function usuarioLogado($dado){
		$cst = $this->con->conectar()->prepare("SELECT `idUsuario`, `nome`, `email` FROM `user` WHERE `idUsuario` = :idUsuario;");
		$cst->bindParam(':idUsuario', $dado, PDO::PARAM_INT);
		$cst->execute();
		$rst = $cst->fetch();
		$_SESSION['nome'] = $rst['nome'];
		$_SESSION['email'] = $rst['email'];
		}
	
	public function sairUsuario(){  
		session_destroy();
		header ('location: ../index.php');
	}

	public function validarsenha($dado){
		$this->senha = sha1($dado['senha']);
		try{
			$cst = $this->con->conectar()->prepare("SELECT `idUsuario`, `email`, `senha` FROM `user` WHERE `email` = `senha` = :senha;");
			$cst->bindParam(':senha', $this->senha, PDO::PARAM_STR);
			$cst->execute();
			if($cst->rowCount() == 0){
				return 'error';
			}else{
				return 'ok';
			}
		}catch(PDOException $e){
			return 'Error: '.$e->getMessage();
		}
	}
		
	}

?>