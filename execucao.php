<?php

require_once("modelo/Pedido.php");
require_once("modelo/Prato.php");

$pedidos = array();

$pratos = array(
    new Prato(1, "Camarão à milanesa", 110,00),
    new Prato(2, "Pizza margherita", 80,00),
    new prato(3, 'Macarrão à carbonara', 60,00),
    new Prato(4, "Bife à parmegiana", 75,00),
    new Prato(5, "Risoto ao funghi", 70,00)
);

function listarPedidos($pedidos){
    if(count($pedidos) > 0) {
        foreach($pedidos as $i => $p)
            printf("O cliente " . $p->getNomeCliente() . ", foi atendido pelo garçom " . $p->getNomeGarcom() . ", pediu um prato de ". $p->getPrato()->getNome() , "  no valor de R$ " . $p->getPrato()->getValor()."\n");
    } else 
        echo "Nenhum pedido cadastrado.\n";
}

function retornarPrato($pratos, $numero){
    foreach ($pratos as $p) {
        if ($numero == $p->getNumero()){
            return $p; 
        }
    }
    return null;
}

do{
 $prato = null;

echo"--------Menu-------\n";
echo"(1) Cadastrar\n";
echo"(2) Cancelar\n";
echo"(3) Listar\n";
echo"(4) Total de vendas\n";
echo"(0) Sair\n";
$op = readline("Escolha uma opção: \n");

switch ($op) {
    case '1':
        $pedido = new Pedido;
        $pedido->setNomeCliente(readline("Informe o nome do cliente: \n"));
        $pedido->setNomeGarcom(readline("Informe o nom edo garçom: \n"));
        while ($prato == null) {
            foreach ($pratos as $p) {
            echo $p->getNumero() . " - ";
            echo $p->getNome() .  " - ";
            echo "R$ " . $p->getValor() . "\n";
        }
        $numero = readline("Infome o número do prato que deseja pedir: ");
        $prato = retornarPrato($pratos, $numero);
        $pedido->setPrato($prato);
        }
        array_push($pedidos, $pedido);

        break;
    
    case "2":
        listarPedidos($pedidos);
        if(count($pedidos) > 0) {
            $idx = readline("Informe o índice do pedido para excluir: ");
            if($idx > 0 && $idx <= count($pedidos))
                array_splice($pedidos, $idx-1, 1);
            else
                echo "Índice inválido!\n";
        }
        break;

    case "3":
        listarPedidos($pedidos);
        break;

    case "4":
    $valorTotal = 0;
        foreach ($pedidos as $p) {
            $valorTotal += $p->getPrato->getValor;
        }
    echo "O valor final dos pedidos feitos é {$valorTotal}";
        break;
    
    default:

        break;
}
} while ($op != 0);