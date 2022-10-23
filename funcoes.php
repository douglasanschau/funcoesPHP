<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        $i = 1;
        $seculo = 0;

        while($i <= $ano){
            $seculo++;
            $i += 100;
        }

        return $seculo;
    }

    
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int {
        $i = 1;
        $primo = 0;

        while($i < $numero){

            $divisores = 0; 

            for($y = 2; $y < $i ;$y++){
               if(($i % $y) == 0){
                   $divisores++;
               } 
               
            }

            if($divisores == 0) {
                $primo = $i;
            }

            $i++;
        }

        return $primo;
    }










    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        $primeiro_maior  = 0;
        $segundo_maior = 0;

        foreach($arr as $ar => $value){

            if(max($value) > $primeiro_maior){
                $segundo_maior = $primeiro_maior;
                $primeiro_maior = max($value);
                $indice = array_search($primeiro_maior, $value);
                unset($value[$indice]);
            }
        
            $segundo_maior = max($value) > $segundo_maior ? max($value) : $segundo_maior; 
        } 

        return $segundo_maior;
    }
	
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false 
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false 
    [0, -2, 5, 6] true 
    [1, 2, 3, 4, 5, 3, 5, 6] false 
    [40, 50, 60, 10, 20, 30] false 
    [1, 1] true 
    [1, 2, 5, 3, 5] true 
    [1, 2, 5, 5, 5] false 
    [10, 1, 2, 3, 4, 5, 6, 1] false 
    [1, 2, 3, 4, 3, 6] true 
    [1, 2, 3, 4, 99, 5, 6] true 
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true 
    [3, 5, 67, 98, 3] true

     * */
    
	public function SequenciaCrescente(array $arr): boolean {
        $removidos  = 0;
        $duplicados = array_count_values($arr);

        foreach($arr as $key => $value){

            $ultimo_index = array_key_last($arr); 
            $primeiro_index = array_key_first($arr);

            $anterior = $key != 0 ? ($key - 1) : 0;
            
            if((isset($arr[$anterior]) &&  isset($arr[$key]) && $arr[$anterior] > $arr[$key])){
                unset($arr[$anterior]);
                $arr = array_values($arr);
                $removidos++;
            }

            if(isset($duplicados[$value]) && $duplicados[$value] > 1){
                for($i = 1; $i <= $duplicados[$value]; $i++){
                    $index = array_search($value, $arr);
                    unset($arr[$index]);
                }
                $removidos += ($duplicados[$value] - 1);
                unset($duplicados[$value]);
                $arr = array_values($arr);
            }

            if(isset($arr[$primeiro_index]) && isset($arr[$ultimo_index])) {
                if($arr[$primeiro_index] > $arr[$ultimo_index]){
                    unset($arr[$primeiro_index]);
                    $arr = array_values($arr);
                    $removidos++;
                }
            }

        }


        if($removidos > 1){
            return false;
        } else {
            return true;
        }
    }
}
