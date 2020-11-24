<?php

namespace App\Controllers;

use App\DAO\PedidoDAO;
use App\Models\PedidoModel;
use Exception;
use Psr\http\Message\ServerRequestInterface as Request;
use Psr\http\Message\ResponseInterface as Response;

class PedidoController
{
    public function editar(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $pedidoDAO = new PedidoDAO();
        $model = $pedidoDAO->find($id);

        $response = $response->withHeader('Content-Type', 'application/json');
        if ($model == null)
        {
            $retorno =  array("mensagem" => "Não Encontrado");
            $response = $response->getBody()->write((string)json_encode($retorno, JSON_UNESCAPED_UNICODE));
        }
        else
            $response = $response->getBody()->write((string)json_encode($model, JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public function salvar(Request $request, Response $response, array $args)
    {
        $data = json_decode($request->getBody());

        $retorno = array("mensagem" => "OK");

        $model = new PedidoModel();
        $pedidoDAO = new PedidoDAO();

        try
        {
            foreach($data as $item)
            {
                $pedido = $pedidoDAO->ObterPorNumPedido($item->numPedido);
                if ($pedido != null)
                    $model = $pedido->setId($pedido->id);

                $model->setNumPedido($item->numPedido);
                $model->setNomeCliente($item->nomeCliente);
                $model->setData($item->data);
                $model->setTotalBruto($item->totalBruto);
                $model->setPercDesconto($item->percDesconto);
                $model->setValorDesconto($item->valorDesconto);
                $model->setTotalLiquido($item->totalLiquido);
                $model->setSituacao($item->situacao);
                $model->setNomeFornecedor($item->nomeFornecedor);
                $model->setObs($item->obs);
                $model->setNomeContato($item->nomeContato);
                $model->setPercComissao($item->percComissao);
                $model->setEncerrado($item->encerrado);
                $model->setTotalVenda($item->totalVenda);
                $model->setTotalLucro($item->totalLucro);
                $model->setTotalQtde($item->totalQtde);
                $model->setNumCarga($item->numCarga);
                $model->setValorLucro($item->valorLucro);
                $model->setNomeVendedor($item->nomeVendedor);
                $model->setValorComissao($item->valorComissao);
                $model->setTotalComissao($item->totalComissao);
                $model->setNomeUsina($item->nomeUsina);

                $pedidoDAO->salvar($model);
            }
        }
        catch(Exception $ex)
        {
            $retorno = array("mensagem" => $ex->getMessage());
        }

        $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($retorno,JSON_UNESCAPED_UNICODE));
        return $response;
    }
}