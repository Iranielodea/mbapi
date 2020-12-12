<?php

namespace App\Controllers;

use App\DAO\PedidoItemDAO;
use App\Models\PedidoItemModel;
use Psr\http\Message\ServerRequestInterface as Request;
use Psr\http\Message\ResponseInterface as Response;

class PedidoItemController
{
    public function editar(Request $request, Response $response, array $args)
    {
        $id = $args["id"];
        $pedidoItemDAO = new PedidoItemDAO();
        $model = $pedidoItemDAO->find($id);

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

    public function listarItensDoPedido(Request $request, Response $response, array $args)
    {
        $numPedido = $args["numPedido"];
        $pedidoItemDAO = new PedidoItemDAO();
        $model = $pedidoItemDAO->obterPorNumPedido($numPedido);

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
        $model = new PedidoItemModel();
        $temp = new PedidoItemModel();
        $pedidoItemDAO = new PedidoItemDAO();

        try
        {
            foreach($data as $item)
            {
                $temp = $pedidoItemDAO->obterPorItem($item->numPedido, $item->codProduto, $item->seq);
                if ($temp != null)
                    $model->id = $temp->id;

                $model->numPedido = $item->numPedido;
                $model->codProduto = $item->codProduto;
                $model->nomeProduto = $item->nomeProduto;
                $model->seq = $item->seq;
                $model->qtde = $item->qtde;
                $model->valor = $item->valor;
                $model->valorTotal = $item->valorTotal;
                $model->siglaUn = $item->siglaUn;
                $model->precoVenda = $item->precoVenda;
                $model->valorLucro = $item->valorLucro;
                $model->totalLucro = $item->totalLucro;
                $model->totalVenda = $item->totalVenda;

                $pedidoItemDAO->salvar($model);
            }
        }
        catch(\Exception $ex)
        {
            $retorno = array("mensagem" => $ex->getMessage());
        }
        
        $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($retorno,JSON_UNESCAPED_UNICODE));
        return $response;
    }
}