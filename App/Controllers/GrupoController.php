<?php

namespace App\Controllers;

use App\DAO\GrupoDAO;
use App\Models\GrupoModel;
use Psr\http\Message\ServerRequestInterface as Request;
use Psr\http\Message\ResponseInterface as Response;

final class GrupoController
{
    public function getGrupos(Request $request, Response $response, array $args)
    {
        $grupoDAO = new GrupoDAO();
        $grupos = $grupoDAO->getAll();

        //$response->getBody()->write((string)json_encode($grupos));
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($grupos,JSON_UNESCAPED_UNICODE));
        return $response;

        // para pegar parametros
        // $id = $request->getQueryParams()['id'];

        // $data = array("mensagem" => "olá mundo, Seja Vem Vindo. Irani" . $id);
        
        // $response->withHeader('Content-Type', 'application/json');
        // $response = $response->getBody()->write((string)json_encode($data,JSON_UNESCAPED_UNICODE));
        // return $response;
    }

    public function editGrupo(Request $request, Response $response, array $args)
    {
        // $id = $request->getQueryParams()['id']; // url?id=1
        $id = $args['id'];
        $grupoDAO = new GrupoDAO();
        $grupo = $grupoDAO->find($id);

        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($grupo,JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public function codigoGrupo(Request $request, Response $response, array $args)
    {
        $id = $request->getQueryParams()['id']; // url?id=1
        $grupoDAO = new GrupoDAO();
        $grupo = $grupoDAO->obterPorCodigo($id);

        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($grupo,JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public function insertGrupo(Request $request, Response $response, array $args)
    {
        $data = json_decode($request->getBody());

        $grupoDAO = new GrupoDAO();
        
        $retorno = array("mensagem" => "OK");
        try
        {
            foreach($data as $item)
            {
                $model = new GrupoModel($item->id, $item->codigo, $item->nome, $item->ativo);
                // $model->setId($item->id);
                // $model->setCodigo($item->codigo);
                // $model->setNome($item->nome);
                // $model->setAtivo($item->ativo);

                $retorno = $grupoDAO->obterPorCodigo($item->codigo);
                if ($retorno != null)
                {
                    $model->getId();
                    $model->setNome($item->nome);
                    $model->setAtivo($item->ativo);
                }
                $grupoDAO->salvar($model);
            }
        }
        catch(\Exception $ex)
        {
            $retorno = array("mensagem" => $ex);
        }
        
        $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($retorno,JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public function updateGrupo(Request $request, Response $response, array $args)
    {
        $data = $request->getParsedBody();

        $grupoDAO = new GrupoDAO();
        $model = new GrupoModel($data['id'], $data['codigo'], $data['nome'], $data['ativo']);
        //$model = new GrupoModel();

        // $model->setId($data['id']);
        // $model->setCodigo($data['codigo']);
        // $model->setNome($data['nome']);
        // $model->setAtivo($data['ativo']);

        $grupoDAO->update($model);

        $retorno = array("mensagem" => "OK");
        
        $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($retorno,JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public function deleteGrupo(Request $request, Response $response, array $args)
    {
        //$id = $request->$_GET['id']; // url?id=1
        $id = $args['id'];
        $grupoDAO = new GrupoDAO();
        $grupo = $grupoDAO->deletarPorCodigo($id);

        $retorno = array("mensagem" => "OK");

        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($retorno,JSON_UNESCAPED_UNICODE));
        return $response;
    }
}