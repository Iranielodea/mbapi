<?php

use function src\slimConfiguration;

$app = new \Slim\App(slimConfiguration());

$app->get('/pedido{id}', PedidoController::class . ':editar');
$app->post('/pedido', PedidoController::class . ':salvar');
$app->put('/pedido', PedidoController::class . ':salvar');