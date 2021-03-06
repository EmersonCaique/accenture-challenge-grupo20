<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NokiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLetter(Request $req)
    {
        
        $request = $req->letter;

        // ABC DEF GHI JKL MNO PQR% TUV WXYZ *
        // 222 333 444 555 666 7777 888 9999 +

        if (empty($request)) {
            return '';
        } 

        $words = [
            '2' => 'ABC',
            '3' => 'DEF',
            '4' => 'GHI',
            '5' => 'JKL',
            '6' => 'MNO',
            '7' => 'PQRS',
            '8' => 'TUV',
            '9' => 'WXYZ',
            '0' => ' ',
        ];

        // Tamanho da string da requisição
        $length = strlen($request);

        // Pega o número da requisição 
        $request_word = substr($request, 0, 1);

        // Validação de número diferente
        for ($i = 0; $i < $length; $i++) {
            $number = substr($request, $i, 1);

            if ($number !== $request_word) {
            return '';
            }
        }

        // Retorna as letras correspondentes do número
        $letters = $words[$request_word];

        // Retorno da letra
        $letter = substr($letters, $length-1, 1);

        if ($letter === '') {
            return '';
        }

        return response()->json($letter);
    }
}
