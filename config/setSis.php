<?php
/*****************************
SETA URL DA HOME
*****************************/

	function setHome(){
		echo BASE;	
	}
/*****************************
INCLUE ARQUIVOS
*****************************/

	function setArq($nomeArquivo){
		if(file_exists($nomeArquivo.'.php')){
			include($nomeArquivo.'.php');
		}else{
			echo 'Erro ao incluir <strong>'.$nomeArquivo.'.php</strong>, arquivo ou caminho não conferem!';	
		}
	}

/*****************************
TRANFORMA STRING EM URL
*****************************/

	function setUri($string){
		$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
		$b = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';	
		$string = utf8_decode($string);
		$string = strtr($string, utf8_decode($a), $b);
		$string = strip_tags(trim($string));
		$string = str_replace(" ","-",$string);
		$string = str_replace(array("-----","----","---","--"),"-",$string);
		return strtolower(utf8_encode($string));
	}
/*****************************
SOMA VISITAS
*****************************/	

	function setViews($topicoId){
		$topicoId = ($topicoId);
		$readArtigo = read('portal_posts',"WHERE id = '$topicoId'");
		
		foreach($readArtigo as $artigo);
			$views = $artigo['visitas'];
			$views = $views +1;
			$dataViews = array(
				'visitas' => $views
			);
			update('portal_posts',$dataViews,"id = '$topicoId'");
	}

function nivelAcesso($id,$nivel){
  $nivel = read('usuarios','WHERE id="'.$id.'" AND nivel ="'.$nivel.'"');
  if(!$nivel->num_rows){
  	unset($autUser,$_SESSION['autUser']);
  	unset($_SESSION['autUser']);
	unset($_COOKIE['autUser']);
	setcookie('autUser','null',-1);
   	header('Location: index.php?nivel=false');
  }
}
