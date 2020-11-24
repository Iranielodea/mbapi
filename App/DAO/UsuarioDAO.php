<?php

namespace App\DAO;

use App\DAO\Crud;
use App\Models\UsuarioModel;

class UsuarioDAO extends Crud
{
    protected $tabela = "usuario";

    public function getAll()
    {
        $sql = "SELECT * FROM $this->tabela";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getUser($userName)
    {
        $sql = "SELECT * FROM $this->tabela WHERE username = :username";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':username', $userName);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function salvar(UsuarioModel $model)
    {
        if ($model->getId() > 0)
            $this->update($model);
        else
            $this->insert($model);
    }

    public function insert(UsuarioModel $model)
    {        
        $userName = $model->getUserName();
        $senha = $model->getSenha();

        $sql = "INSERT INTO $this->tabela (username, senha) VALUES (:username, :senha)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':username', $userName);
        $stmt->bindParam(':senha', $senha);
        return $stmt->execute();
    }

    public function update(UsuarioModel $model)
    {
        $id = $model->getId();
        $username = $model->getUserName();
        $senha = $model->getSenha();

        $sql = "UPDATE $this->tabela SET username = :username, senha = :senha WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}