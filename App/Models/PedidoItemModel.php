<?php

namespace App\Models;

class PedidoItemModel
{
    public $id;
    public $numPedido;
    public $codProduto;
    public $nomeProduto;
    public $seq;
    public $qtde;
    public $valor;
    public $valorTotal;
    public $siglaUn;
    public $precoVenda;
    public $valorLucro;
    public $totalLucro;
    public $totalVenda;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getNumPedido()
    {
        return $this->numPedido;
    }

    public function setNumPedido($value)
    {
        $this->numPedido = $value;
    }

    public function getCodProduto()
    {
        return $this->codProduto;
    }

    public function setCodProduto($value)
    {
        $this->codProduto = $value;
    }

    public function getNomeProduto()
    {
        return $this->nomeProduto;
    }

    public function setNomeProduto($value)
    {
        $this->nomeProduto = $value;
    }

    public function getSeq()
    {
        return $this->seq;
    }

    public function setSeq($value)
    {
        $this->seq = $value;
    }

    public function getQtde()
    {
        return $this->qtde;
    }

    public function setQtde($value)
    {
        $this->qtde = $value;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($value)
    {
        $this->valor = $value;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValorTotal($value)
    {
        $this->valorTotal = $value;
    }

    public function getSiglaUn()
    {
        return $this->siglaUn;
    }

    public function setSiglaUn($value)
    {
        $this->siglaUn = $value;
    }

    public function getPrecoVenda()
    {
        return $this->precoVenda;
    }

    public function setPrecoVenda($value)
    {
        $this->precoVenda = $value;
    }

    public function getValorLucro()
    {
        return $this->valorLucro;
    }

    public function setValorLucro($value)
    {
        $this->valorLucro = $value;
    }

    public function getTotalLucro()
    {
        return $this->totalLucro;
    }

    public function setTotalLucro($value)
    {
        $this->totalLucro = $value;
    }

    public function getTotalVenda()
    {
        return $this->totalVenda;
    }

    public function setTotalVenda($value)
    {
        $this->totalVenda = $value;
    }
}