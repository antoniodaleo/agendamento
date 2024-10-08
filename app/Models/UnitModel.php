<?php

namespace App\Models;

use App\Entities\Unit;

use CodeIgniter\Model;

class UnitModel extends MyBaseModel
{
    protected $table            = 'units';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Unit::class;
    protected $useSoftDeletes   = false; // Vamos excluir o registro 
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'email',
        'phone',
        'coordinator',
        'address',
        'services',
        'starttime',
        'endtime',
        'servicetime',
        'active',
    ]; // Dobbiamo definire i campi della tabella che possono essere editati


    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true; // True é perche voglio che i campi siano popolati
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'id'            => 'permit_empty|is_natural_no_zero',
        'name'          => 'required|max_length[69]|is_unique[units.name,id,{id}]',
        'phone'         => 'required|exact_length[14]|is_unique[units.phone,id,{id}]',
        'email'         => 'required|valid_email|max_length[99]|is_unique[units.email,id,{id}]',
        'coordinator'   => 'required|max_length[69]',
        'address'       => 'required|max_length[128]',
        'starttime'     => 'required',
        'endtime'       => 'required',
        'servicetime'   => 'required',
    ];

    

    protected $validationMessages   = [
        'name' => [
            'required' => 'Obrigatorio', 
            'max_length' => 'Maximo 69 caracteres', 
            'is_unique' => 'Já existe'
        ], 
    ];


    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['escapeCustomData'];
    protected $beforeUpdate   = ['escapeCustomData'];

    protected function escapeCustomData(array $data): array 
    {

        if(!isset($data['data'])){
            return $data; 
        }

        foreach ($this->allowedFields as $attribute){
            if(isset($data['data'][$attribute])){
                if($attribute === 'services'){
                    continue; 
                }

                $data['data'][$attribute] =esc($data['data'][$attribute]); 
            }
        }

        return $data; 


    }
   
}
