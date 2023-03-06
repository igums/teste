<?php
/*--------Dado a sequência de Fibonacci, onde se inicia por 0 e 1 e o próximo valor 
sempre será a soma dos 2 valores anteriores (exemplo: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34...), escreva um programa na linguagem que desejar onde,
informado um número, ele calcule a sequência de Fibonacci e retorne uma mensagem avisando se o número informado pertence ou não a sequência.*/


$num = intval(readline("Digite um número: "));

if ($num == 0) {
    echo "$num pertence à sequência de Fibonacci.";
} else {
    $var1 = 0;
    $var2 = 1;
    while ($var2 < $num) {
        $prox_termo = $var1 + $var2;
        $var1 = $var2;
        $var2 = $prox_termo;
    }
    if ($var2 == $num) {
        echo "$num pertence à sequência de Fibonacci.";
    } else {
        echo "$num não pertence à sequência de Fibonacci.";
    }
}
?> 

</br>
</br>

<?php
/*------------------Dado um vetor que guarda o valor de faturamento diário de uma distribuidora, faça um programa, na linguagem que desejar, que calcule e retorne:
• O menor valor de faturamento ocorrido em um dia do mês;
• O maior valor de faturamento ocorrido em um dia do mês;
• Número de dias no mês em que o valor de faturamento diário foi superior à média mensal.

IMPORTANTE:
a) Usar o json ou xml disponível como fonte dos dados do faturamento mensal;
b) Podem existir dias sem faturamento, como nos finais de semana e feriados. Estes dias devem ser ignorados no cálculo da média;
*/


//O código para ler o arquivo JSON:

$json = file_get_contents('faturamento.json');
$data = json_decode($json, true);

$valor_total = 0;
$valor_maximo = 0;
$valor_minimo = PHP_INT_MAX;
$quantidade_dias = 0;

foreach ($data['faturamento'] as $dia) {
    $valor = $dia['valor'];
    if ($valor > 0) {
        $valor_total += $valor;
        $quantidade_dias++;
        if ($valor > $valor_maximo) {
            $valor_maximo = $valor;
        }
        if ($valor < $valor_minimo) {
            $valor_minimo = $valor;
        }
    }
}

$media_mensal = $valor_total / $quantidade_dias;

$quantidade_dias_superior_media = 0;

foreach ($data['faturamento'] as $dia) {
    $valor = $dia['valor'];
    if ($valor > $media_mensal) {
        $quantidade_dias_superior_media++;
    }
}

echo "Menor valor de faturamento: $valor_minimo\n";
echo "Maior valor de faturamento: $valor_maximo\n";
echo "Número de dias com faturamento superior à média mensal: $quantidade_dias_superior_media\n";

?>
</br>
</br>

<?php
/*Agora, podemos calcular o menor e o maior valor de faturamento, bem como a média mensal. Para isso, vamos iterar sobre os valores de faturamento, 
ignorando os dias em que o faturamento é zero, e armazenar o menor e o maior valor em variáveis, bem como a soma total dos valores e o número de dias*/

/*-------------- Dado o valor de faturamento mensal de uma distribuidora, detalhado por estado:

SP – R$67.836,43
RJ – R$36.678,66
MG – R$29.229,88
ES – R$27.165,48
Outros – R$19.849,53

Escreva um programa na linguagem que desejar onde calcule o percentual de representação 
que cada estado teve dentro do valor total mensal da distribuidora.*/


// Valor total mensal da distribuidora
$valorTotal = 180759.98;

// Valores de faturamento mensal por estado
$valores = [
    'SP' => 67836.43,
    'RJ' => 36678.66,
    'MG' => 29229.88,
    'ES' => 27165.48,
    'Outros' => 19849.53
];

// Calcular o percentual de representação de cada estado
$percentuais = [];

foreach ($valores as $estado => $valor) {
    $percentuais[$estado] = ($valor / $valorTotal) * 100;
}

// Exibir os percentuais de representação de cada estado
foreach ($percentuais as $estado => $percentual) {
    echo $estado . ': ' . number_format($percentual, 2) . '%' . PHP_EOL;
}


/*Neste exemplo, utilizamos um array para armazenar os valores de faturamento mensal por estado e um loop para calcular o percentual de representação
 de cada um deles no valor total mensal da distribuidora. Em seguida, outro loop é utilizado para exibir os percentuais calculados.*/