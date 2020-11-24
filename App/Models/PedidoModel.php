<?php

namespace App\Models;

class PedidoModel
{
    private $id;
    private $numPedido;
    private $nomeCliente;
    private $data;
    private $totalBruto;
    private $percDesconto;
    private $valorDesconto;
    private $totalLiquido;
    private $situacao;
    private $nomeFornecedor;
    private $obs;
    private $nomeContato;
    private $percComissao;
    private $encerrado;
    private $totalVenda;
    private $totalLucro;
    private $totalQtde;
    private $numCarga;
    private $valorLucro;
    private $nomeVendedor;
    private $valorComissao;
    private $totalComissao;
    private $nomeUsina;

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

    public function getData()
    {
        return $this->data;
    }

    public function setData($value)
    {
        $this->data = $value;
    }

    public function getTotalBruto()
    {
        return $this->totalBruto;
    }

    public function setTotalBruto($value)
    {
        $this->totalBruto = $value;
    }

    public function getPercDesconto()
    {
        return $this->percDesconto;
    }

    public function setPercDesconto($value)
    {
        $this->percDesconto = $value;
    }

    public function getValorDesconto()
    {
        return $this->valorDesconto;
    }

    public function setValorDesconto($value)
    {
        $this->valorDesconto = $value;
    }

    public function getTotalLiquido()
    {
        return $this->totalLiquido;
    }

    public function setTotalLiquido($value)
    {
        $this->totalLiquido = $value;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function setSituacao($value)
    {
        $this->situacao = $value;
    }

    public function getNomeFornecedor()
    {
        return $this->nomeFornecedor;
    }

    public function setNomeFornecedor($value)
    {
        $this->nomeFornecedor = $value;
    }

    public function getNomeCliente()
    {
        return $this->nomeCliente;
    }

    public function setNomeCliente($value)
    {
        $this->nomeCliente = $value;
    }

    public function getObs()
    {
        return $this->obs;
    }

    public function setObs($value)
    {
        $this->obs = $value;
    }

    public function getNomeContato()
    {
        return $this->nomeContato;
    }

    public function setNomeContato($value)
    {
        $this->nomeContato = $value;
    }

    public function getPercComissao()
    {
        return $this->percComissao;
    }

    public function setPercComissao($value)
    {
        $this->percComissao = $value;
    }

    public function getEncerrado()
    {
        return $this->encerrado;
    }

    public function setEncerrado($value)
    {
        $this->encerrado = $value;
    }

    public function getTotalVenda()
    {
        return $this->totalVenda;
    }

    public function setTotalVenda($value)
    {
        $this->totalVenda = $value;
    }

    public function getTotalLucro()
    {
        return $this->totalLucro;
    }

    public function setTotalLucro($value)
    {
        $this->totalLucro = $value;
    }

    public function getTotalQtde()
    {
        return $this->totalQtde;
    }

    public function setTotalQtde($value)
    {
        $this->totalQtde = $value;
    }

    public function getNumCarga()
    {
        return $this->numCarga;
    }

    public function setNumCarga($value)
    {
        $this->numCarga = $value;
    }

    public function getValorLucro()
    {
        return $this->valorLucro;
    }

    public function setValorLucro($value)
    {
        $this->valorLucro = $value;
    }

    public function getNomeVendedor()
    {
        return $this->nomeVendedor;
    }

    public function setNomeVendedor($value)
    {
        $this->nomeVendedor = $value;
    }
    
    public function getValorComissao()
    {
        return $this->valorComissao;
    }

    public function setValorComissao($value)
    {
        $this->valorComissao = $value;
    }

    public function getTotalComissao()
    {
        return $this->totalComissao;
    }

    public function setTotalComissao($value)
    {
        $this->totalComissao = $value;
    }

    public function getNomeUsina()
    {
        return $this->nomeUsina;
    }

    public function setNomeUsina($value)
    {
        $this->nomeUsina = $value;
    }
}