<?php
/*****************************
GERA RESUMOS
*****************************/
	function lmWord($string, $words = '50'){
		$string 	= strip_tags($string);
		$count		= strlen($string);
		
		if($count <= $words){
			return $string;	
		}else{
			$strpos = strrpos(substr($string,0,$words),' ');
			return substr($string,0,$strpos).'...';
		}
		
	}
/*****************************
VALIDA O EMAIL
*****************************/	
	function valMail($email){
		if(preg_match('/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/',$email)){
			return true;
		}else{
			return false;
		}
	}
/*****************************
ENVIA O CPF
*****************************/	
	function valCpf($cpf){
		$cpf = preg_replace('/[^0-9]/','',$cpf);
		$digitoA = 0;
		$digitoB = 0;
		for($i = 0, $x = 10; $i <= 8; $i++, $x--){
			$digitoA += $cpf[$i] * $x;
		}
		for($i = 0, $x = 11; $i <= 9; $i++, $x--){
			if(str_repeat($i, 11) == $cpf){
				return false;
			}
			$digitoB += $cpf[$i] * $x;
		}
		$somaA = (($digitoA%11) < 2 ) ? 0 : 11-($digitoA%11);
		$somaB = (($digitoB%11) < 2 ) ? 0 : 11-($digitoB%11);
		if($somaA != $cpf[9] || $somaB != $cpf[10]){
			return false;	
		}else{
			return true;
		}
	}

function validar_cnpj($cnpj)
{
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;
	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj[$i] * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
		return false;
	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj[$i] * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}

//var_dump(validar_cnpj('11.444.777/0001-61'));


/*****************************
ENVIA O EMAIL
*****************************/	
function sendMail($assunto,$mensagem,$remetente,$nomeRemetente,$destino,$nomeDestino){
	require_once 'mail/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPSecure = 'ssl';
	// $mail->SMTPDebug = 2;
	$mail->Host = MAILHOST; 
	$mail->Port = MAILPORT; 
	$mail->SMTPAuth = true;
	$mail->Username = MAILUSER;
	$mail->Password = MAILPASS;
	$mail->setFrom(MAILUSER, utf8_decode(TITULO));
	$mail->addAddress(utf8_decode($destino),utf8_decode($nomeDestino));
	$mail->Subject = utf8_decode($assunto);
	$mail->msgHTML(utf8_decode($mensagem));
	if (!$mail->send()) {
	    return false;
	} else {
	    return true;
	}
	$mail->clearAddresses();
}	

/*****************************
Paginação de resultados
*****************************/
	function readPaginator($tabela, $cond, $maximos, $link, $pag, $width = NULL, $maxlinks = 3){
		$readPaginator = read($tabela,$cond);
		$total = $readPaginator->num_rows;
		if($total > $maximos){
			$paginas = ceil($total/$maximos);
			if($width){
				echo '<ul class="pagination" style="width:'.$width.'">';
			}else{
				echo '<ul class="pagination">';
			}
			echo '<li><a href="'.$link.'1">Primeira Página</a>&nbsp;&nbsp;&nbsp;</li>';
			for($i = $pag - $maxlinks; $i <= $pag - 1; $i++){
				if($i >= 1){
					echo '<li><a href="'.$link.$i.'">'.$i.'</a>&nbsp;&nbsp;&nbsp;</li>';
				}
			}
			echo '<li class="active"><span>'.$pag.'</span>&nbsp;&nbsp;&nbsp;</li>';
			for($i = $pag + 1; $i <= $pag + $maxlinks; $i++){
				if($i <= $paginas){
					echo '<li><a href="'.$link.$i.'">'.$i.'</a>&nbsp;&nbsp;&nbsp;</li>';
				}
			}
			echo '<li><a href="'.$link.$paginas.'">Última Página</a></li>';
			echo '</ul><!-- /pagination -->';
		}
	}



	/*****************************
Paginação de resultados
*****************************/
	function readPaginator2($campo,$tabela, $cond, $maximos, $link, $pag, $width = NULL, $maxlinks = 3){
		$readPaginator = select($campo,$tabela,$cond);
		$total = count($readPaginator);
		if($total > $maximos){
			$paginas = ceil($total/$maximos);
			if($width){
				echo '<ul class="pagination" style="width:'.$width.'">';
			}else{
				echo '<ul class="pagination">';
			}
			echo '<li><a href="'.$link.'1">Primeira Página</a>&nbsp;&nbsp;&nbsp;</li>';
			for($i = $pag - $maxlinks; $i <= $pag - 1; $i++){
				if($i >= 1){
					echo '<li><a href="'.$link.$i.'">'.$i.'</a>&nbsp;&nbsp;&nbsp;</li>';
				}
			}
			echo '<li class="active"><span>'.$pag.'</span>&nbsp;&nbsp;&nbsp;</li>';
			for($i = $pag + 1; $i <= $pag + $maxlinks; $i++){
				if($i <= $paginas){
					echo '<li><a href="'.$link.$i.'">'.$i.'</a>&nbsp;&nbsp;&nbsp;</li>';
				}
			}
			echo '<li><a href="'.$link.$paginas.'">Última Página</a></li>';
			echo '</ul><!-- /pagination -->';
		}
	}