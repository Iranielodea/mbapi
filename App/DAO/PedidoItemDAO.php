<?php

namespace App\DAO;

use App\Models\PedidoItemModel;

class PedidoItemDAO extends Crud
{
    protected $tabela = "pedido_item ";

    public function obterPorNumPedido($numPedido){
        $sql = "SELECT * FROM $this->tabela WHERE num_pedido = :numPedido";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':numPedido', $numPedido);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function obterPorItem($numPedido, $codProdutos, $seq)
    {
        $sql = "SELECT * FROM $this->tabela WHERE num_pedido = :numPedido 
            AND cod_produto = :codProduto 
            AND seq = :seq";

        $stmt = DB::prepare($sql);
        $stmt->bindParam(':numPedido', $numPedido);
        $stmt->bindParam(':codProduto', $codProdutos);
        $stmt->bindParam(':seq', $seq);
        $stmt->execute();
        return $stmt->fetch();
    }    

    public function salvar(PedidoItemModel $model)
    {
        $sql = "";
        $id = $model->id;

        if ($id == 0)
        {
            $sql = "INSERT INTO $this->tabela (
                num_pedido,
                cod_produto,
                seq,
                nome_produto,
                sigla_un,
                qtde,
                valor,
                valor_total,
                preco_venda,
                valor_lucro,
                total_lucro,
                total_venda
            )
            VALUES(
                :num_pedido,
                :cod_produto,
                :seq,
                :nome_produto,
                :sigla_un,
                :qtde,
                :valor,
                :valor_total,
                :preco_venda,
                :valor_lucro,
                :total_lucro,
                :total_venda
            )";
        }
        else
        {
            $sql = "UPDATE ".$this->tabela. "SET
                num_pedido = :num_pedido,
                cod_produto = :cod_produto,
                seq = :seq,
                nome_produto = :nome_produto,
                sigla_un = :sigla_un,
                qtde = :qtde,
                valor = :valor,
                valor_total = :valor_total,
                preco_venda = :preco_venda,
                valor_lucro = :valor_lucro,
                total_lucro = :total_lucro,
                total_venda = :total_venda
                WHERE id = :id
            ";
        }

        $numPedido = $model->getNumPedido();
        $codProduto = $model->getCodProduto();
        $seq = $model->getSeq();
        $nomeProduto = $model->getNomeProduto();
        $siglaUn = $model->getSiglaUn();
        $qtde = $model->getQtde();
        $valor = $model->getValor();
        $valorTotal = $model->getValorTotal();
        $precoVenda = $model->getPrecoVenda();
        $valorLucro = $model->getValorLucro();
        $totalLucro = $model->getTotalLucro();
        $totalVenda = $model->getTotalVenda();

        $stmt = DB::prepare($sql);
        $stmt->bindParam(':num_pedido', $numPedido);
        $stmt->bindParam(':cod_produto', $codProduto);
        $stmt->bindParam(':seq', $seq);
        $stmt->bindParam(':nome_produto', $nomeProduto);
        $stmt->bindParam(':sigla_un', $siglaUn);
        $stmt->bindParam(':qtde', $qtde);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':valor_total', $valorTotal);
        $stmt->bindParam(':preco_venda', $precoVenda);
        $stmt->bindParam(':valor_lucro', $valorLucro);
        $stmt->bindParam(':total_lucro', $totalLucro);
        $stmt->bindParam(':total_venda', $totalVenda);

        if ($id > 0)
            $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
}