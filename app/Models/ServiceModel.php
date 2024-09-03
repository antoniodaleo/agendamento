<?php

namespace App\Models;

use App\Entities\Service;


use CodeIgniter\Model;

class ServiceModel extends MyBaseModel
{
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Service::class;
    protected $useSoftDeletes   = false; // Vamos excluir o registro 
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
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
        'name'          => 'required|max_length[69]|is_unique[services.name,id,{id}]',
       
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
    protected $beforeInsert   = ['escapeData'];

    protected $beforeUpdate   = ['escapeData'];



}
