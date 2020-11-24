<?php

namespace App\Models;

class GrupoModel extends BaseModel
{
    private $ativo;

    function __construct($id, $codigo, $nome, $ativo)
    {
        parent::__construct($id, $codigo, $nome);
        
        $this->setAtivo($ativo);
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    // public function __construct($id, $codigo, $nome)
    // {
    //     $this->$id = $id;
    //     $this->$codigo = $codigo;
    //     $this->$nome = $nome;

    //     // $this->setId($id);
    //     // $this->setCodigo($codigo);
    //     // $this->setNome($nome);
    // }
}