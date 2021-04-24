<?php
/*****************************
CONFIGs DO BANCO
*****************************/
	define("servidor", 'localhost');
    define("usuario", 'root');
    define("senha", '');
    define("base", 'mariaester');
    $titulo = 'Escola Maria Ester';
    $base = 'http://localhost/PainelEscolaV2/';
    $sis = 'http://localhost/PainelEscolaV2/';
/*****************************
FUNÇÃO DE CADASTRO NO BANCO
*****************************/

	function create($tabela, array $datas){
		$conn = mysqli_connect(servidor, usuario, senha, base) or die ('Erro ao conectar: '.mysqli_error($conn));
		$fields = implode(", ",array_keys($datas));
		$values = "'".implode("', '",array_values($datas))."'";			
		$qrCreate = "INSERT INTO {$tabela} ($fields) VALUES ($values)";
		$stCreate = mysqli_query($conn,$qrCreate)or die ('Erro ao cadastar: '.mysqli_error($conn));
		if($stCreate){
			return mysqli_insert_id($conn);
		}
	}
	
/*****************************
FUNÇÃO DE LEITURA DO BANCO
*****************************/

	function read($tabela, $cond = NULL){
		$conn = mysqli_connect(servidor, usuario, senha, base) or die ('Erro ao conectar: '.mysqli_error($conn));		
		$qrRead = "SELECT * FROM {$tabela} {$cond}";
		$stRead = mysqli_query($conn,$qrRead)or die ('Erro ao ler: '.mysqli_error($conn));
		if($stRead){
			return $stRead;
		}
		

	}
// 	/****************************************************
// FUNÇÃO DE SELECT, PARA SOMA, INNER JOIN ENTRE OUTROS
// ****************************************************/
	function select($campo,$tabela, $cond = NULL){
		$conn = mysqli_connect(servidor, usuario, senha, base) or die ('Erro ao conectar: '.mysqli_error($conn));
		$qrRead = "SELECT ".$campo." FROM ".$tabela." ".$cond;
		$stRead = mysqli_query($conn,$qrRead) or die ('Erro ao ler em '.$tabela.' '.mysqli_error($conn));
		if($stRead ){
			return $stRead;
		}
		

	}
/*****************************
FUNÇÃO DE EDIÇÃO NO BANCO
*****************************/	
	
	function update($tabela, array $datas, $where){
		$conn = mysqli_connect(servidor, usuario, senha, base) or die ('Erro ao conectar: '.mysqli_error($conn));
		foreach($datas as $fields => $values){
			$campos[] = "$fields = '$values'";
		}
		$campos = implode(", ",$campos);
		$qrUpdate = "UPDATE {$tabela} SET $campos WHERE {$where}";
		$stUpdate = mysqli_query($conn,$qrUpdate) or die ('Erro ao atualizar em '.$tabela.' '.mysqli_error($conn));
		if($stUpdate){
			return true;	
		}
		
	}
	
/*****************************
FUNÇÃO DE DELETAR NO BANCO
*****************************/

	function delete($tabela, $where){
		$conn = mysqli_connect(servidor, usuario, senha, base) or die ('Erro ao conectar: '.mysqli_error($conn));
		$qrDelete = "DELETE FROM {$tabela} WHERE {$where}";
		$stDelete = mysqli_query($conn,$qrDelete);
		if($stDelete){
			return true;	
		}
	}