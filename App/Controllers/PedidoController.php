<?php

namespace App\Controllers;

use App\DAO\PedidoDAO;
use App\Models\PedidoModel;
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
                // $pedido = $pedidoDAO->ObterPorNumPedido($item->numPedido);
                // if ($pedido != null)
                //     $model->id = $pedido->id;

                $model->numPedido = $item->numPedido;
                $model->nomeCliente = $item->nomeCliente;
                $model->data = $item->data;
                $model->totalBruto = $item->totalBruto;
                $model->percDesconto = $item->percDesconto;
                $model->valorDesconto = $item->valorDesconto;
                $model->totalLiquido = $item->totalLiquido;
                $model->situacao = $item->situacao;
                $model->nomeFornecedor = $item->nomeFornecedor;
                $model->obs = $item->obs;
                $model->nomeContato = $item->nomeContato;
                $model->percComissao = $item->percComissao;
                $model->encerrado = $item->encerrado;
                $model->totalVenda = $item->totalVenda;
                $model->totalLucro = $item->totalLucro;
                $model->totalQtde = $item->totalQtde;
                $model->numCarga = $item->numCarga;
                $model->valorLucro = $item->valorLucro;
                $model->nomeVendedor = $item->nomeVendedor;
                $model->valorComissao = $item->valorComissao;
                $model->totalComissao = $item->totalComissao;
                $model->nomeUsina = $item->nomeUsina;

                $pedidoDAO->salvar($model);
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