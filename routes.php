<?php
error_reporting(E_ALL); //REPORTAR ERROS
ini_set('display_errors', 1); //REPORTAR ERROS

require_once __DIR__.'/router.php';

// ##################################################

//VIEW
any('/', 'scheduleit/view/pages/home/home.php');
any('/login', 'scheduleit/view/pages/login/login.php');
get('/cadastro', 'scheduleit/view/pages/cadastro/cadastro.php');
get('/naoencontrada', 'scheduleit/view/pages/sala/naoencontrada.php');
get('/minhasSalas', 'scheduleit/view/pages/minhasSalas/minhasSalas.php');
get('/naoencontrada', 'scheduleit/view/pages/sala/naoencontrada.php');
get('/sala/$idSala', 'scheduleit/view/pages/sala/sala.php');
get('/configuracoes', 'scheduleit/view/pages/config/config.php');
get('/notificacoes', 'scheduleit/view/pages/notificacoes/notificacoes.php');
any('/editarSala/$idSala', 'scheduleit/view/pages/editarSala/editarSala.php');
any('/cadastroSala', 'scheduleit/view/pages/cadastroSala/cadastroSala.php');
any('/agenda/$id', 'scheduleit/view/pages/agenda/agenda.php');
any('/agenda/$id/$dataDMA', 'scheduleit/view/pages/agenda/agenda.php');
any('/agenda-configuracoes', 'scheduleit/view/pages/agenda/configuracoes.php');
any('/pesquisa', 'scheduleit/view/pages/pesquisa/pesquisa.php');

//CONTROLLER
any('/logout', 'scheduleit/controller/logout.php');
any('/attUsuario', 'scheduleit/controller/config/attUsuario.php');
any('/agendaController', 'scheduleit/view/pages/agenda/agendaController.php');
any('/attSala/$idSala', 'scheduleit/controller/editarSala/attSala.php');
any('/privar/$idSala', 'scheduleit/controller/editarSala/privarSala.php');
any('/publicarSala/$idSala', 'scheduleit/controller/editarSala/publicarSala.php');
any('/excluirSala/$idSala', 'scheduleit/controller/editarSala/excluirSala.php');
any('/adicionarFuncionario/$idSala', 'scheduleit/controller/funcionario/adicionarFuncionario.php');
any('/removerFuncionario/$idSala/$idUsuario', 'scheduleit/controller/funcionario/removerFuncionario.php');


// ##################################################

//ERRO 404
any('/404','scheduleit/view/pages/erro/404.php');
