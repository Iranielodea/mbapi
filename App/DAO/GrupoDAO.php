<?php

namespace App\DAO;
use App\Models\GrupoModel;
use App\DAO\Crud;
use App\Models\BaseModel;

//require_once 'DB.php';
require_once 'Crud.php';
require_once 'App/Models/GrupoModel.php';

// use App\DAO\Crud;
// use App\DAO\DB;
// use App\Models\GrupoModel;

class GrupoDAO extends Crud
{
    protected $tabela = "grupo";

    public function getAll()
    {
        $sql = "SELECT * FROM $this->tabela";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function salvar(GrupoModel $grupoModel)
    {
        if ($grupoModel->getId() > 0)
            $this->update($grupoModel);
        else
            $this->insert($grupoModel);
    }

    public function insert(GrupoModel $grupoModel)
    {        
        $codigo = $grupoModel->getCodigo();
        $nome = $grupoModel->getNome();
        $ativo = $grupoModel->getAtivo();

        $sql = "INSERT INTO $this->tabela (codigo, nome, ativo) VALUES (:codigo, :nome, :ativo)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':ativo', $ativo);
        return $stmt->execute();
    }

    public function update(GrupoModel $grupoModel)
    {
        $id = $grupoModel->getId();
        $codigo = $grupoModel->getCodigo();
        $nome = $grupoModel->getNome();
        $ativo = $grupoModel->getAtivo();

        $sql = "UPDATE $this->tabela SET codigo = :codigo, nome = :nome, ativo = :ativo WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':ativo', $ativo);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}