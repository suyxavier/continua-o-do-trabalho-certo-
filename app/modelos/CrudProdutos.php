<?php
/**
 * Created by PhpStorm.
 * User: JEFFERSON
 * Date: 16/11/2017
 * Time: 10:56
 */

require_once "Conexao.php";
require_once "Produto.php";

class CrudProdutos
{

    private $conexao;


    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function salvar(Produto $produto)
    {
        $sql = "INSERT INTO tb_produtos (nome, preco, categoria, estoque, imagem) VALUES ('$produto->nome', $produto->preco, '$produto->categoria',$produto->estoque,'$produto->imagem')";

        $this->conexao->exec($sql);
    }

    public function getProduto(int $codigo)
    {
        $consulta = $this->conexao->query("SELECT * FROM tb_produtos WHERE codigo = $codigo");
        $produto = $consulta->fetch(PDO::FETCH_ASSOC);

        return new Produto($produto['id_produto'], $produto['nome_produto'], $produto['descricao_produto'], $produto['foto_produto'], $produto['preco_produto'], $produto['id_categoria']);

    }

    public function getProdutos()
    {
        $consulta = $this->conexao->query("SELECT * FROM tb_produtos");
        $arrayProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaProdutos = [];
        foreach ($arrayProdutos as $produto) {

            $listaProdutos [] = new Produto($produto['nome'], $produto['preco'], $produto['categoria'], $produto['estoque'], $produto['codigo'], $produto['imagem']);
        }

        return $listaProdutos;
    }

    public function excluirProduto(int $codigo)
    {

        //DELETE FROM table_name WHERE condition;
        $this->conexao->query("DELETE FROM tb_produtos WHERE codigo = $codigo");
    }

    public function editar(Produto $produto){

        $this->conexao->exec("UPDATE tb_produtos SET nome ='$produto->getNome()', preco = $produto->getPreco(), categoria = '$produto->getCategoria()', estoque = $produto->getEstoque(), imagem= '$produto->imagem' WHERE codigo = $produto->codigo ");
    }

    public function comprar(int $codigo, int $qtdDesejada){

        $p = $this->getProduto($codigo);

        $estoqueAtual = $p->estoque;

        if ($qtdDesejada > $estoqueAtual){
            return "hje nao querido";
        }else {

            $novoEstoque = $estoqueAtual - $qtdDesejada;

            $this->conexao->exec("UPDATE `tb_produtos` SET `estoque` = $novoEstoque WHERE `codigo` = $codigo");

            return "hoje sim";
        }
    }

}

