<?php

session_start();
include "../js/func.inc";
verifica_login1();
teste_data_hora_nome_evento();

?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <title>MEUS EVENTOS CADASTRADOS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/TCC/css/style_ev_cadastrados.css" type="text/css" />
</head>

<script>

</script>

<body>

    <?php include('nav_usu.inc'); ?>

    <div class="table table-responsive">
    
        <table>
            <thead>
                <tr>
                    <th colspan = "19" >Lista de eventos</th>
                </tr>
            </thead>

            <tbody> 
                <tr>
                    <td>Atualizar</td>
                    <td>Email evento</td>
                    <td>Nome parceiro do evento</td>
                    <td>Telefone evento</td>
                    <td>Facebook do evento</td>
                    <td>Instagram do evento</td>
                    <td>Nome do evento</td>
                    <td>Data do evento</td>
                    <td>Horario de inicio do evento</td>
                    <td>Horario de termino do evento</td>
                    <td>Local do evento</td>
                    <td>Descricao do evento</td>
                    <td>Publico alvo do evento</td>
                    <td>Solicitação de levar algo para o evento</td>
                    <td>solicitação de suporte para o evento</td>
                    <td>Evento voluntario periodico do evento</td>
                    <td>Comentarios adicionais do evento</td>
                    <td>Nome do voluntario do evento</td>
                </tr>

                <?php

                    $usuario = $_COOKIE["email_usuario"];
                    $teste_evento = true;

                    include('conect.php');

                    $SQL1 = "select * from evento";
                    $resultado1 = mysqli_query($conect,$SQL1);

                    do{
                        $registro1 = mysqli_fetch_assoc($resultado1);
                        if(!isset($_SESSION['evento_pesquisado'])){
                            if(($registro1['email_evento'] != null)&&($registro1['email_evento'] == $usuario)){
                                echo'
                                    <tr>
                                ';
                                    echo"<td><a href='atualizar_evento.php?tabela=evento&id_evento=".$registro1['id_evento']."'>Atualizar</td>";
                                    echo'
                                        <td>'.$registro1["email_evento"].'</td>
                                        <td>'.$registro1["nome_parceiro_evento"].'</td>
                                        <td>'.$registro1["telefone_evento"].'</td>
                                        <td>'.$registro1["face_evento"].'</td>
                                        <td>'.$registro1["insta_evento"].'</td>
                                        <td>'.$registro1["nome_evento"].'</td>
                                        <td>'.$registro1["data_evento"].'</td>
                                        <td>'.$registro1["horario_inicio_evento"].'</td>
                                        <td>'.$registro1["duracao_evento"].'</td>
                                        <td>'.$registro1["local_evento"].'</td>
                                        <td>'.$registro1["descricao_evento"].'</td>
                                        <td>'.$registro1["publico_alvo_evento"].'</td>
                                        <td>'.$registro1["solic_levar_algo_evento"].'</td>
                                        <td>'.$registro1["solic_suporte_evento"].'</td>
                                        <td>'.$registro1["evento_voluntario_periodico_evento"].'</td>
                                        <td>'.$registro1["comentarios_adicionais_evento"].'</td>
                                        <td>'.$registro1["nome_voluntario_evento"].'</td>
                                    </tr>
                                ';

                                $teste_evento = false;

                            }
                        }else if($_SESSION['evento_pesquisado'] == false){

                            if(($registro1['email_evento'] != null)&&($registro1['email_evento'] == $usuario)){
                                echo'
                                    <tr>
                                ';
                                    echo"<td><a href='atualizar_evento.php?tabela=evento&id_evento=".$registro1['id_evento']."'>Atualizar</td>";
                                    echo'
                                        <td>'.$registro1["email_evento"].'</td>
                                        <td>'.$registro1["nome_parceiro_evento"].'</td>
                                        <td>'.$registro1["telefone_evento"].'</td>
                                        <td>'.$registro1["face_evento"].'</td>
                                        <td>'.$registro1["insta_evento"].'</td>
                                        <td>'.$registro1["nome_evento"].'</td>
                                        <td>'.$registro1["data_evento"].'</td>
                                        <td>'.$registro1["horario_inicio_evento"].'</td>
                                        <td>'.$registro1["duracao_evento"].'</td>
                                        <td>'.$registro1["local_evento"].'</td>
                                        <td>'.$registro1["descricao_evento"].'</td>
                                        <td>'.$registro1["publico_alvo_evento"].'</td>
                                        <td>'.$registro1["solic_levar_algo_evento"].'</td>
                                        <td>'.$registro1["solic_suporte_evento"].'</td>
                                        <td>'.$registro1["evento_voluntario_periodico_evento"].'</td>
                                        <td>'.$registro1["comentarios_adicionais_evento"].'</td>
                                        <td>'.$registro1["nome_voluntario_evento"].'</td>
                                    </tr>
                                ';

                                $teste_evento = false;

                            }

                        }else if($_SESSION['evento_pesquisado'] == true){
                            
                            
                            if(($registro1['email_evento'] != null)&&($registro1['email_evento'] == $usuario)&&($registro1['nome_evento'] == $_SESSION['evento_pesquisado_nome'])){
                                echo'
                                    <tr>
                                ';
                                    echo"<td><a href='atualizar_evento.php?tabela=evento&id_evento=".$registro1['id_evento']."'>Atualizar</td>";
                                    echo'
                                        <td>'.$registro1["email_evento"].'</td>
                                        <td>'.$registro1["nome_parceiro_evento"].'</td>
                                        <td>'.$registro1["telefone_evento"].'</td>
                                        <td>'.$registro1["face_evento"].'</td>
                                        <td>'.$registro1["insta_evento"].'</td>
                                        <td>'.$registro1["nome_evento"].'</td>
                                        <td>'.$registro1["data_evento"].'</td>
                                        <td>'.$registro1["horario_inicio_evento"].'</td>
                                        <td>'.$registro1["duracao_evento"].'</td>
                                        <td>'.$registro1["local_evento"].'</td>
                                        <td>'.$registro1["descricao_evento"].'</td>
                                        <td>'.$registro1["publico_alvo_evento"].'</td>
                                        <td>'.$registro1["solic_levar_algo_evento"].'</td>
                                        <td>'.$registro1["solic_suporte_evento"].'</td>
                                        <td>'.$registro1["evento_voluntario_periodico_evento"].'</td>
                                        <td>'.$registro1["comentarios_adicionais_evento"].'</td>
                                        <td>'.$registro1["nome_voluntario_evento"].'</td>
                                    </tr>
                                ';

                                $teste_evento = false;

                            }
                                

                        }
                        
                    }while($registro1 != null);

                    if($teste_evento == true){

                        echo "Você ainda não cadastrou nenhum evento";

                    }
                
                
                ?>
            </tbody> 
        </table>

    </div>

</body>

</html>