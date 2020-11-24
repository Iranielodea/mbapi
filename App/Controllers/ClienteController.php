<?php

namespace App\Controllers;

use App\DAO\ClienteDAO;
use App\Models\ClienteModel;
use Psr\http\Message\ServerRequestInterface as Request;
use Psr\http\Message\ResponseInterface as Response;

class ClienteController
{
    public function getClientes(Request $request, Response $response, array $args)
    {
        $nome = $request->getQueryParams()['nome'] ?? "";
        $cnpj = $request->getQueryParams()['cnpj'] ?? "";
        $cpf = $request->getQueryParams()['cpf'] ?? "";

        //$data = json_decode($request->getBody());

        $clienteDAO = new ClienteDAO();
        $clientes = $clienteDAO->getAll($nome, $cnpj, $cpf);

        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($clientes,JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public function editar(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $clienteDao = new ClienteDAO();
        $model = $clienteDao->find($id);

        $response = $response->withHeader('Content-Type', 'application/json');
        if ($model == null)
        {
            $retorno =  array("mensagem" => "Não Encontrado");
            $response = $response->getBody()->write((string)json_encode($retorno,JSON_UNESCAPED_UNICODE));
        }
        else
            $response = $response->getBody()->write((string)json_encode($model,JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public function salvar(Request $request, Response $response, array $args)
    {
        $data = json_decode($request->getBody());
        
        $clienteDAO = new ClienteDAO();
        $model = new ClienteModel();
        $retorno = array("mensagem" => "OK");

        try
        {
            foreach($data as $item)
            {
                $cliente = $clienteDAO->obterPorCodigo($item->codigo);
                if ($cliente != null)
                    $model->setId($cliente->id);

                $model->setBairro($item->bairro);
                $model->setCep($item->cep);
                $model->setCnpj($item->cnpj);
                $model->setCodigo($item->codigo);
                $model->setComplemento($item->complemento);
                $model->setCpf($item->cpf);
                $model->setDataCadastro($item->dataCadastro);
                $model->setEmail($item->email);
                $model->setEndereco($item->endereco);
                $model->setFantasia($item->fantasia);
                $model->setFax($item->fax);
                $model->setFone($item->fone);
                $model->setInscricaoEstadual($item->inscEstadual);
                $model->setNome($item->nome);
                $model->setNomeCidade($item->nomeCidade);
                $model->setNumero($item->numero);
                $model->setObs($item->obs);
                $model->setRg($item->rg);
                $model->setTipoPessoa($item->tipoPessoa);
                $model->setUf($item->uf);

                $clienteDAO->salvar($model);
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