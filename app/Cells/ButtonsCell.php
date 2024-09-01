<?php

namespace App\Cells;

class ButtonsCell 
{
    public function action (array $params): string {

        // classes padrão
        $btnClass = 'btn btn-sm '; 
        $btnClass .= $params['activated'] ? 'btn-warning' : 'btn-success'; 

        // units/action/id
        $form = form_open($params['route'], ['class' => 'd-inline'], hidden:['_method' => 'PUT']); 


        $form .= form_button([
            'class' => $params['btn_class'] ?? $btnClass, 
            'type' => 'submit', 
            'content' => $params['text_action']
        ]); 

        $form .= form_close(); 

        return $form; 

    }
}
