<?php

session_start();

include('conect.php');

$SQL = "select * from tentativa_login;";

$resultado = mysqli_query($conect, $SQL);

do {
    $registro = mysqli_fetch_assoc($resultado);

    $ip_logado = $_SERVER['REMOTE_ADDR'];

    if (($ip_logado == $registro["ip_tentativa"]) && ($registro["bloqueado"] == 'on')) {

        header("Location: pg_block.php");
    }
} while ($registro != null);

mysqli_close($conect);

?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <title>CADASTRAR EVENTO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/TCC/css/style_cd_evento.css" type="text/css" />
</head>

<script>

</script>

<body>
    <?php

    if(!isset($_SESSION['visitante'])){

        $usuario = $_COOKIE["email_usuario"];
        include "../js/func.inc";
        verifica_login1();
        teste_data_hora_nome_evento();

        $adm = $_SESSION['adm'];

        if($usuario != $adm){
            include('nav_usu.inc');
        }else{
            include('nav_adm.inc');
        }

    }else{

        include('nav_visitante.inc');

    }

    ?>

    <div class="container-fluid p-0">
        <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="1">
            <div class="w-100">
                <div class="cadastro-form">

                    <h6>Cadastre seu evento:</h6>

                    <form action="verifica_cadastro_evento.php" id="cadastro-form" method="POST">

                        <?php

                            if((!isset($_SESSION['teste_nome_evento']))||($_SESSION['teste_nome_evento'] == true)) {

                                echo'
                                <div class="texto">
                                    <input type="text" placeholder="Qual é o seu evento?" name="nome_evento" id="nome_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                                    <span class=" check-message hidden">Required</span>
                                </div>
                                ';

                            }else{

                            echo'
                                <div class="texto">
                                    <input type="text"placeholder="Nome ja existente" name="nome_evento" id="nome_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                                    <span class=" check-message hidden">Required</span>
                                </div>
                            ';
                            }
                        ?>

                        <div class="texto">
                            <input type="text" placeholder="Qual é o nome do parceiro do evento?" name="nome_parceiro_evento" id="nome_parceiro_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                            <span class=" check-message hidden">Required</span>
                        </div>

                        <div class="texto">
                            <input type="tel" placeholder="Qual é seu telefone?" name="telefone_evento" id="telefone_evento" required="required" minlength="4" maxlength="20">
                            <span class=" check-message hidden">Required</span>
                        </div>

                        <div class="texto">
                            <input type="text" placeholder="Qual é o nome da pagina do facebook do evento?" name="face_evento" id="face_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                            <span class=" check-message hidden">Required</span>
                        </div>

                        <div class="texto">
                            <input type="text" placeholder="Qual é o nome do instragram do evento?" name="insta_evento" id="insta_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                            <span class=" check-message hidden">Required</span>
                        </div>
                        
                        <?php

                            if((!isset($_SESSION['teste_data_hora_evento']))||($_SESSION['teste_data_hora_evento'] == true)) {
                                echo'
                                    <div class="texto">
                                        <input type="date" placeholder="Qual é data do evento?" name="data_evento" id="data_evento" required="required" title="Qual é data do evento?">
                                        <span class=" check-message hidden">Required</span>
                                    </div>

                                    <div class="texto">
                                        <input type="time" placeholder="Qual é horario de inicio do evento?" name="horario_inicio_evento" id="horario_inicio_evento" required="required" title="Qual é horario de inicio do evento?">
                                        <span class=" check-message hidden">Required</span>
                                    </div>

                                    <div class="texto">
                                        <input type="time" placeholder="Qual é horario de finalização do evento?" name="duracao_evento" id="duracao_evento" required="required" title="Qual é horario de finalização do evento?">
                                        <span class=" check-message hidden">Required</span>
                                    </div>
                                ';
                            }else{

                                echo'
                                    <div class="texto">
                                        <input type="date" placeholder="Qual é data do evento?" name="data_evento" id="data_evento" required="required" title="Nesse dia ja temos um evento nesse horario">
                                        <span class=" check-message">Horario em uso</span>
                                    </div>

                                    <div class="texto">
                                        <input type="time" placeholder="Qual é horario de inicio do evento?" name="horario_inicio_evento" id="horario_inicio_evento" required="required" title="Horario em uso">
                                        <span class=" check-message">Horario em uso</span>
                                    </div>

                                    <div class="texto erro">
                                        <input type="time" placeholder="Qual é horario de finalização do evento?" name="duracao_evento" id="duracao_evento" required="required" title="Horario em uso">
                                        <span class=" check-message">Horario em uso</span>
                                    </div>
                                ';
                            }
                        ?>

                        <div class="texto">
                            <input type="text" placeholder="Onde será realizado o evento?" name="local_evento" id="local_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                            <span class=" check-message hidden">Required</span>
                        </div>

                        <div class="texto">
                            <input type="text" placeholder="Descreva o evento" name="descricao_evento" id="descricao_evento" required="required" minlength="10" maxlength="30" title="Usando letras como A(a) ate z(z)">
                            <span class=" check-message hidden">Required</span>
                        </div>

                        <div class="texto">
                            <input type="text" placeholder="Qual é o publico alvo do evento?" name="publico_alvo_evento" id="publico_alvo_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                            <span class=" check-message hidden">Required</span>
                        </div>

                        <div class="texto">
                            <input type="text" placeholder="Solicita levar algo para o evento?(Sim ou não)" name="solic_levar_algo_evento" id="solic_levar_algo_evento" required="required" minlength="3" maxlength="3"  pattern="[sim-não]{3,3}" title="sim ou não?">
                            <span class=" check-message hidden">Required</span>
                        </div>

                        <div class="texto">
                            <input type="text" placeholder="Solicita suporte para o evento?(Sim ou não)" name="solic_suporte_evento" id="solic_suporte_evento" required="required" minlength="3" maxlength="3" pattern="[sim-não]{3,3}" title="sim ou não?">
                            <span class=" check-message hidden">Required</span>
                        </div>

                        <div class="texto">
                            <input type="text" placeholder="Evento é voluntario e periodico evento?(Sim ou não)" name="evento_voluntario_periodico_evento" id="evento_voluntario_periodico_evento" required="required" minlength="3" pattern="[sim-não]{3,3}" title="sim ou não?">
                            <span class=" check-message hidden">Required</span>
                        </div>

                        <div class="texto">
                            <input type="text" placeholder="Possui algum comentario para o evento?" name="comentarios_adicionais_evento" id="comentarios_adicionais_evento" required="required" minlength="4" maxlength="15" title="Usando letras como A(a) ate z(z)">
                            <span class=" check-message hidden">Required</span>
                        </div>

                        <div class="texto">
                            <input type="text" placeholder="Nome do voluntario do evento?" name="nome_voluntario_evento" id="nome_voluntario_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                            <span class=" check-message hidden">Required</span>
                        </div>


                        <input type="submit" value="Cadastrar agora" class="cadastro-btn" name="btn-cadastro" id="btn-cadastro" disabled>

                        <?php

                            if (isset($_SESSION['teste_verificacao_evento'])) {

                                $teste_verificacao_evento = $_SESSION['teste_verificacao_evento'];

                                if ($teste_verificacao_evento == false) {

                                    echo
                                        '<div>
                                            <p class="red">Você digitou algum item invalido. Digite novamente</p>
                                        </div>';
                                }
                            } 
                        ?>

                    </form>

                    <div class="dont-have-account">
                        Quer voltar para a pagina inicial?
                        <a href="pg_inicial.php">Ir para a pagina inicial</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

<script type="text/javascript">
        $(".texto input").focusout(function() {
            if ($(this).val() == "") {
                $(this).siblings().removeClass("hidden");
                $(this).css("background", "#554343");

            } else {
                $(this).siblings().addClass("hidden");
                $(this).css("background", "#484848");
            }

        });

        $(".texto input").keyup(function() {
            var inputs = $(".texto input");
            if (inputs[0].value != "" && inputs[1].value && inputs[2].value && inputs[3].value && 
            inputs[4].value && inputs[5].value && inputs[6].value && inputs[7].value && inputs[8].value 
            && inputs[9].value && inputs[10].value && inputs[11].value && inputs[12].value && inputs[12].value 
            && inputs[13].value && inputs[14].value && inputs[15].value) {
                $(".cadastro-btn").attr("disabled", false);
                $(".cadastro-btn").addClass("active");
            } else {
                $(".cadastro-btn").attr("disabled", true);
                $(".cadastro-btn").removeClass("active");
            }

        });
    </script>

</html>