<?php


if (!function_exists('show_error_input')) {

    function show_error_input(string $inputField): string
    {

        $inputField = strtolower($inputField); 

        if (!session()->has('errorsValidation')) {
            return '';
        }

        $errorsValidation = esc(session('errorsValidation'));

        return !array_key_exists($inputField, $errorsValidation) ?
            '' : // Retorno stringa vazia caso nao tenho
            "<spam class='text-danger'>{$errorsValidation[$inputField]}</spam>"; // Retorno um spam com o erro
    }
}
