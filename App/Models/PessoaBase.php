<?php

namespace App\Models;

class PessoaBase extends BaseModel
{
    private $bairro;
    private $cep;
    private $cnpj;
    private $email;
    private $endereco;
    private $fax;
    private $inscEstadual;
    private $nomeCidade;
    private $obs;
    private $uf;

    public function setBairro($value)
    {
        $this->bairro = $value;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setCep($value)
    {
        $this->cep = $value;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setUf($value)
    {
        $this->uf = $value;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function setCnpj($value)
    {
        $this->cnpj = $value;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEndereco($value)
    {
        $this->endereco = $value;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setFax($value)
    {
        $this->fax = $value;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function setInscricaoEstadual($value)
    {
        $this->inscEstadual = $value;
    }

    public function getInscricaoEstadual()
    {
        return $this->inscEstadual;
    }

    public function setNomeCidade($value)
    {
        $this->nomeCidade = $value;
    }

    public function getNomeCidade()
    {
        return $this->nomeCidade;
    }

    public function setObs($value)
    {
        $this->obs = $value;
    }

    public function getObs()
    {
        return $this->obs;
    }
}