<?php

    session_start();
    
    
    $usuario_logado = $_COOKIE["email_usuario"];
    
    $email_evento = $usuario_logado;
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
    $teste_email_evento = false;
    $teste_nome_evento = true;
    $teste_data_hora_evento = true;

	include('conect.php');
		
	$SQL1 = "select * from evento";
    $resultado1 = mysqli_query($conect,$SQL1);
    
    $SQL2 = "select * from usuario";
	$resultado2 = mysqli_query($conect,$SQL2);

	do{
		if(($email_evento != " ")&&($nome_evento != " ")){
            $registro1 = mysqli_fetch_assoc($resultado1);
            $registro2 = mysqli_fetch_assoc($resultado2);

            if($email_evento == $registro2["email_usuario"]){
				$teste_email_evento = true;
            }
            
            if($nome_evento == $registro1["nome_evento"]){
                $teste_nome_evento = false;
                $_SESSION['teste_nome_evento'] = $teste_nome_evento;
            }

            if($data_evento == $registro1["data_evento"]){

                echo"evento o correndo nesse dia";

                if(($horario_inicio_evento == $registro1["horario_inicio_evento"])&&($horario_inicio_evento < $registro1["duracao_evento"]))
                $teste_data_hora_evento = false;
                $_SESSION['teste_data_hora_evento'] = $teste_data_hora_evento;
                echo"hora ja em uso";
                
            }

		}
    }while($registro1 != null);
		
	if(($teste_email_evento == true)&&($teste_nome_evento == true)&&($teste_data_hora_evento == true)){
		$ins = "
		
            insert into evento(email_evento,nome_parceiro_evento,telefone_evento
            ,face_evento,insta_evento,nome_evento,data_evento,horario_inicio_evento
            ,duracao_evento,local_evento,descricao_evento,publico_alvo_evento
            ,solic_levar_algo_evento,solic_suporte_evento,evento_voluntario_periodico_evento
            ,comentarios_adicionais_evento,nome_voluntario_evento)
            value ('".$email_evento."','".$nome_parceiro_evento."','".$telefone_evento."'
            ,'".$face_evento."','".$insta_evento."','".$nome_evento."'
            ,'".$data_evento."','".$horario_inicio_evento."','".$duracao_evento."'
            ,'".$local_evento."','".$descricao_evento."','".$publico_alvo_evento."'
            ,'".$solic_levar_algo_evento."','".$solic_suporte_evento."','".$evento_voluntario_periodico_evento."'
            ,'".$comentarios_adicionais_evento."','".$nome_voluntario_evento."')

		
		";
        $resultado = mysqli_query($conect,$ins);
        
        $_SESSION['teste_verificacao_evento'] = true;
        $_SESSION['teste_nome_evento'] = true;
        
        echo "todos os dados estavam corretos";

		header("Location: evento_cadastrados_usu");
			
    }
    
    if(($teste_nome_evento == false)||($teste_nome_evento == false)){

        $_SESSION['teste_verificacao_evento'] = false;

        echo "entrou na verificação false";

        header("Location: cadastro_evento.php");

    }

	mysqli_close($conect);
?>