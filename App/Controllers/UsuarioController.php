<?php

namespace App\Controllers;

use App\DAO\UsuarioDAO;
use App\Models\UsuarioModel;
use Psr\http\Message\ServerRequestInterface as Request;
use Psr\http\Message\ResponseInterface as Response;

final class UsuarioController
{
    public function getAll(Request $request, Response $response, array $args)
    {
        $dao = new UsuarioDAO();
        $usuarios = $dao->getAll();

        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($usuarios,JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public function editar(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $dao = new UsuarioDAO();
        $usuario = $dao->find($id);

        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($usuario,JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public function login(Request $request, Response $response, array $args)
    {
        $metodo = $args['login'];

        $retorno = array("mensagem" => "Não é Login");

        if ($metodo == null)
        {
            $retorno = array("mensagem" => "Não é Login");
        }
        else
        {
            $data = json_decode($request->getBody());
            $userName = $data->username;
            $senha = $data->senha;

            $dao = new UsuarioDAO();
            $usuario = $dao->getUser($userName);

            if ($usuario == null)
                $retorno = array("mensagem" => "Registro não Encontrado");
            else
            {
                if ($usuario->senha == $senha)
                    $retorno = array("mensagem" => "OK");
                else
                    $retorno = array("mensagem" => "Senha não confere!");
            }
        }
        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($retorno,JSON_UNESCAPED_UNICODE));
        return $response;            
    }

    public function inserir(Request $request, Response $response, array $args)
    {
        $dao = new UsuarioDAO();
        $data = json_decode($request->getBody());
        $retorno = array("mensagem" => "OK");

        try
        {
            $model = new UsuarioModel();

            foreach($data as $item)
            {
                $usuario = $dao->getUser($item->username);

                if ($usuario != null)
                    $model->setId($usuario->id);

                $model->setUserName($item->username);
                $model->setSenha($item->senha);

                $dao->salvar($model);
            }
        }
        catch(\Exception $ex)
        {
            $retorno = array("mensagem" => $ex);
        }

        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($retorno,JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public function atualizar(Request $request, Response $response, array $args)
    {
        $dao = new UsuarioDAO();
        $data = json_decode($request->getBody());

        $usuario = new UsuarioModel($data->id, $data->username, $data->senha);
        $dao->update($usuario);

        $retorno = array("mensagem" => "OK");

        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($retorno,JSON_UNESCAPED_UNICODE));
        return $response;
    }

    public function deletar(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $dao = new UsuarioDAO();
        $dao->deletarPorCodigo($id);

        $retorno = array("mensagem" => "OK");

        $response = $response->withHeader('Content-Type', 'application/json');
        $response = $response->getBody()->write((string)json_encode($retorno,JSON_UNESCAPED_UNICODE));
        return $response;
    }
}