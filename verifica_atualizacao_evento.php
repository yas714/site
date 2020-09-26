<?php

    session_start();
    
    include('conect.php');

	$id_evento = $_SESSION["id_evento"];
	$tabela = $_SESSION["tabela"];
	$nome_parceiro_evento = $_POST['nome_parceiro_evento'];
    $telefone_evento = $_POST['telefone_evento'];
    $face_evento = $_POST['face_evento'];
    $insta_evento = $_POST['insta_evento'];
    $nome_evento = $_POST['nome_evento'];
    $data_evento = $_POST['data_evento'];
    $horario_inicio_evento = $_POST['horario_inicio_evento'];
    $duracao_evento = $_POST['duracao_evento'];
    $local_evento = $_POST['local_evento'];
    $descricao_evento = $_POST['descricao_evento'];
    $publico_alvo_evento = $_POST['publico_alvo_evento'];
    $solic_levar_algo_evento = $_POST['solic_levar_algo_evento'];
    $solic_suporte_evento = $_POST['solic_suporte_evento'];
    $evento_voluntario_periodico_evento = $_POST['evento_voluntario_periodico_evento'];
    $comentarios_adicionais_evento = $_POST['comentarios_adicionais_evento'];
    $nome_voluntario_evento = $_POST['nome_voluntario_evento'];
	
	$update = '
		update '.$tabela.' 
        set nome_parceiro_evento = "'.$nome_parceiro_evento.'" 
        ,telefone_evento = "'.$telefone_evento.'"
        ,face_evento = "'.$face_evento.'"
        ,insta_evento = "'.$insta_evento.'"
        ,nome_evento = "'.$nome_evento.'"
        ,data_evento = "'.$data_evento.'"
        ,horario_inicio_evento = "'.$horario_inicio_evento.'"
        ,duracao_evento = "'.$duracao_evento.'"
        ,local_evento = "'.$local_evento.'"
        ,descricao_evento = "'.$descricao_evento.'"
        ,publico_alvo_evento = "'.$publico_alvo_evento.'"
        ,solic_levar_algo_evento = "'.$solic_levar_algo_evento.'"
        ,solic_suporte_evento = "'.$solic_suporte_evento.'"
        ,evento_voluntario_periodico_evento = "'.$evento_voluntario_periodico_evento.'"
        ,comentarios_adicionais_evento = "'.$comentarios_adicionais_evento.'"
        ,nome_voluntario_evento = "'.$nome_voluntario_evento.'"
		WHERE id_evento = "'.$id_evento.'";';

	$resultado = mysqli_query($conect,$update);
	
	if(!$resultado){
		
		echo"deu algo errado";
		
	}else{
		
		header("Location:evento_cadastrados_usu.php");
	}
	
	mysqli_close($conect);
?>