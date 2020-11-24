<?php

namespace App\Controllers;

use App\DAO\TransportadoraDAO;
use App\Models\TransportadoraModel;
use Exception;
use Psr\http\Message\ServerRequestInterface as Request;
use Psr\http\Message\ResponseInterface as Response;

class TransportadoraController
{
    public function getTransportadoras(Request $request, Response $response, array $args)
    {
        $nome = $request->getQueryParams()['nome'] ?? "";
        $cnpj = $request->getQueryParams()['cnpj'] ?? "";
        $cpf = $request->getQueryParams()['cpf'] ?? "";

        $transportadoraDAO = new TransportadoraDAO();
        $transportadoras = $transportadoraDAO->getAll($nome, $cnpj, $cpf);

        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($transportadoras,JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public function editar(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $transportadoraDao = new transportadoraDAO();
        $model = $transportadoraDao->find($id);

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
        
        $transportadoraDAO = new transportadoraDAO();
        $retorno = array("mensagem" => "OK");

        try
        {
            $model = new TransportadoraModel();
            foreach($data as $item)
            {
                $temp = $transportadoraDAO->obterPorCodigo($item->codigo);

                if ($temp != null)
                    $model->setId($temp->id);

                $model->setBairro($item->bairro);
                $model->setCep($item->cep);
                $model->setCnpj($item->cnpj);
                $model->setCodigo($item->codigo);
                $model->setCpfTrans($item->cpfTrans);
                $model->setEmail($item->email);
                $model->setEndereco($item->endereco);
                $model->setFax($item->fax);
                $model->setFone1($item->fone1);
                $model->setFone2($item->fone2);
                $model->setInscricaoEstadual($item->inscEstadual);
                $model->setNome($item->nome);
                $model->setNomeCidade($item->nomeCidade);
                $model->setObs($item->obs);
                $model->setDDD($item->ddd);
                $model->setContato($item->contato);
                $model->setNumBanco($item->numBanco);
                $model->setNomeBanco($item->nomeBanco);
                $model->setNumAgencia($item->numAgencia);
                $model->setNumConta($item->numConta);
                $model->setTitular($item->titular);
                $model->setUf($item->uf);

                $transportadoraDAO->salvar($model);
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