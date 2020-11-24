<?php

namespace App\Models;

class PedidoItem
{
    private $id;
    private $numPedido;
    private $codProduto;
    private $sequencia;
    private $qtde;
    private $valor;
    private $valorTotal;
    private $unidade;
    private $precoVenda;
    private $valorLucro;
    private $totalLucro;
    private $totalVenda;

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

    public function getSequencia()
    {
        return $this->sequencia;
    }

    public function setSequencia($value)
    {
        $this->sequencia = $value;
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

    public function getUnidade()
    {
        return $this->unidade;
    }

    public function setUnidade($value)
    {
        $this->unidade = $value;
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