<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <title>HOME</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/TCC/css/style_pg_inicial.css" type="text/css" />
</head>

<body id="page-top">

    <div id="conteudo_pg">
        
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

        <br /><br /><br /><br /><br />

        <div class="container-fluid p-0">
            <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="1">
                <div class="w-100">
                    <img src="../imagem/logo.png" class="img-fluid" alt="Imagem responsiva" >
                </div>
            </section>
        </div>

        <div class="container-fluid p-0">
            <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="1">
                <div class="w-100 text-white">
                    <h1 class="mb-0">Sobre Parque vivo</h1>

                    <p class="lead mb-5">
                        A Escola de Magia e Bruxaria de Hogwarts, ou simplesmente Hogwarts, é uma escola de magia para bruxos e
                        bruxas com idade entre os onze e dezessete anos. É o palco principal para os primeiros oito filmes, e
                        sete primeiros livros da série Harry Potter, de J.K. Rowling, nos quais cada livro equivale a um ano
                        letivo frequentado pelas personagens principais e pelas personagens do ano de Harry Potter, ou seja,
                        nascidas em 1980. No volume derradeiro da série, Harry Potter e as Relíquias da Morte, a maior parte da
                        história se passa fora de Hogwarts, uma vez que os personagens principais, Harry Potter, Ronald Weasley
                        e Hermione Granger não atendem ao sétimo e último grau de ensino (embora Rowling tenha declarado que
                        Hermione retorna à escola depois dos acontecimentos descritos em Harry Potter e as Relíquias da Morte
                        para realizar os seus exames de Nível Incrivelmente Exaustivo em Magia, importantíssimos para o seu
                        sucesso profissional e pessoal). A batalha final no livro e na série, no entanto, ocorre em Hogwarts,
                        assim como as cenas que a antecedem, como a organização das tropas que lutavam ao lado de Harry e a
                        chegada de personagens importantes, como os intermináveis familiares de Ron, mas, também, para organizar
                        as táticas defensivas e a saída dos alunos mais novos do castelo.
                    </p>
                </div>
            </section>
            <hr class="m-0">
        </div>

        
        <div class="container-fluid p-0">
            <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="1">
                <div class="w-100">
                    <h1 class="mb-0">Sobre Parque vivo</h1>

                    <p class="lead mb-5">
                        A Escola de Magia e Bruxaria de Hogwarts, ou simplesmente Hogwarts, é uma escola de magia para bruxos e
                        bruxas com idade entre os onze e dezessete anos. É o palco principal para os primeiros oito filmes, e
                        sete primeiros livros da série Harry Potter, de J.K. Rowling, nos quais cada livro equivale a um ano
                        letivo frequentado pelas personagens principais e pelas personagens do ano de Harry Potter, ou seja,
                        nascidas em 1980. No volume derradeiro da série, Harry Potter e as Relíquias da Morte, a maior parte da
                        história se passa fora de Hogwarts, uma vez que os personagens principais, Harry Potter, Ronald Weasley
                        e Hermione Granger não atendem ao sétimo e último grau de ensino (embora Rowling tenha declarado que
                        Hermione retorna à escola depois dos acontecimentos descritos em Harry Potter e as Relíquias da Morte
                        para realizar os seus exames de Nível Incrivelmente Exaustivo em Magia, importantíssimos para o seu
                        sucesso profissional e pessoal). A batalha final no livro e na série, no entanto, ocorre em Hogwarts,
                        assim como as cenas que a antecedem, como a organização das tropas que lutavam ao lado de Harry e a
                        chegada de personagens importantes, como os intermináveis familiares de Ron, mas, também, para organizar
                        as táticas defensivas e a saída dos alunos mais novos do castelo.
                    </p>
                </div>
            </section>
            <hr class="m-0">
        </div>

        <div class="container-fluid p-0">
            <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="1">
                <div class="w-100">
                    <h1 class="mb-0">Sobre Parque vivo</h1>

                    <p class="lead mb-5">
                        A Escola de Magia e Bruxaria de Hogwarts, ou simplesmente Hogwarts, é uma escola de magia para bruxos e
                        bruxas com idade entre os onze e dezessete anos. É o palco principal para os primeiros oito filmes, e
                        sete primeiros livros da série Harry Potter, de J.K. Rowling, nos quais cada livro equivale a um ano
                        letivo frequentado pelas personagens principais e pelas personagens do ano de Harry Potter, ou seja,
                        nascidas em 1980. No volume derradeiro da série, Harry Potter e as Relíquias da Morte, a maior parte da
                        história se passa fora de Hogwarts, uma vez que os personagens principais, Harry Potter, Ronald Weasley
                        e Hermione Granger não atendem ao sétimo e último grau de ensino (embora Rowling tenha declarado que
                        Hermione retorna à escola depois dos acontecimentos descritos em Harry Potter e as Relíquias da Morte
                        para realizar os seus exames de Nível Incrivelmente Exaustivo em Magia, importantíssimos para o seu
                        sucesso profissional e pessoal). A batalha final no livro e na série, no entanto, ocorre em Hogwarts,
                        assim como as cenas que a antecedem, como a organização das tropas que lutavam ao lado de Harry e a
                        chegada de personagens importantes, como os intermináveis familiares de Ron, mas, também, para organizar
                        as táticas defensivas e a saída dos alunos mais novos do castelo.
                    </p>
                </div>
            </section>
            <hr class="m-0">
        </div>
    </div>

    <nav class="navbar navbar-inverse bg-success">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="rodape">
                    @Copyright-IFSP-TCC-Students-
                    <a href="https://www.facebook.com/pablo.pioravantt1">Pablo</a>
                    -
                    <a href="https://www.linkedin.com/in/matheus-chiodi-b484581aa">Matheus</a>
                    -
                    <a href="https://www.facebook.com/profile.php?id=100011087107811">Yasmin</a>
                </div>
            </div>
        </div>
    </nav>

</body>

</html>