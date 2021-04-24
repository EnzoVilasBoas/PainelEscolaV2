<?php
/*****************************
GET HOME
****************************/
function getHome($autUser=null){

	$url = filter_input(INPUT_GET,'url',FILTER_DEFAULT);
	$url = explode('/', $url);
	$url[0] = ($url[0] == NULL ? 'home' : $url[0]);
		if(file_exists('inc/'.$url[0].'.php')){
			require_once('inc/'.$url[0].'.php');
		}elseif(file_exists('inc/'.$url[0].'/'.$url[1].'.php')){
			require_once('inc/'.$url[0].'/'.$url[1].'.php');
		}else{
			require_once('inc/404.php');
		}
	}

function getAutUser(int $profileid,array $permissao){
	if(!in_array($profileid,$permissao)){
		header('location: '.BASESIS);
		die();
	}else{
		header('Authorization: '.md5('0000'));
	}
}

function LogAcesso(string $arquivo,string $mensagem){
	$arquivo 		= fopen($arquivo, 'a');
	$novoArquivo 	= $mensagem."\n";
	fwrite($arquivo,utf8_decode($novoArquivo));
	fclose($arquivo);
}
