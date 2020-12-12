<?php

use App\Controllers\ClienteController;
use App\Controllers\GrupoController;
use App\Controllers\UsuarioController;
use App\Controllers\TransportadoraController;
use App\Controllers\PedidoController;
use App\Controllers\PedidoItemController;

use function src\slimConfiguration;

$app = new \Slim\App(slimConfiguration());

//=============================================================================
//http://localhost:80/mb/api/index.php/grupo

$app->get('/grupo', GrupoController::class . ':getGrupos');
$app->get('/grupo/{id}', GrupoController::class . ':edirupo');
$app->put('/grupo', GrupoController::class . ':updateGrupo');
$app->delete('/grupo/{id}', GrupoController::class . ':deleteGrupo');
//=============================================================================
$app->get('/usuario', UsuarioController::class .':getAll');
$app->get('/usuario/{id}', UsuarioController::class .':editar');
$app->post('/usuario', UsuarioController::class .':insertGrupo');
$app->post('/grupo', GrupoController::class . ':insertGir');
$app->put('/usuario', UsuarioController::class .':atualizar');
$app->post('/usuario/{login}', UsuarioController::class .':login');
$app->delete('/usuario/{id}', UsuarioController::class .':deletar');
//=============================================================================
$app->get('/cliente', ClienteController::class . ':getClientes');
$app->get('/cliente/{id}', ClienteController::class . ':editar');
$app->post('/cliente', ClienteController::class . ':salvar');
$app->put('/cliente', ClienteController::class . ':salvar');
//=============================================================================
$app->get('/transportadora', TransportadoraController::class . ':getTransportadoras');
$app->get('/transportadora/{id}', TransportadoraController::class . ':editar');
$app->post('/transportadora', TransportadoraController::class . ':salvar');
$app->put('/transportadora', TransportadoraController::class . ':salvar');
//=============================================================================
$app->get('/pedido/{id}', PedidoController::class . ':editar');
$app->post('/pedido', PedidoController::class . ':salvar');
$app->put('/pedido', PedidoController::class . ':salvar');
//=============================================================================
$app->get('/pedido-item/{id}', PedidoItemController::class . ':editar');
$app->get('/pedido-item/{listarpedido}/{numPedido}', PedidoItemController::class . ':listarItensDoPedido');
$app->post('/pedido-item', PedidoItemController::class . ':salvar');
$app->put('/pedido-item', PedidoItemController::class . ':salvar');
//=============================================================================
// require_once "routes\PedidoRoute.php";
$app->run();