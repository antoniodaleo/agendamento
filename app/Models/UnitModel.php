<?php

namespace App\Models;

use App\Entities\Unit;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table            = 'units';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Unit::class;
    protected $useSoftDeletes   = false; // Vamos excluir o registro 
    protected $protectFields    = true;
    protected $allowedFields    = [
            'name' ,
            'email' , 
            'phone' , 
            'coordinator' , 
            'address' ,
            'services' ,
            'starttime',
            'endtime' ,
            'servicetime' ,
            'active' ,
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
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];



    public function findOfFail(int|string $id): object {

        $row = $this->find($id); 

        return $row ?? throw new PageNotFoundException("Registro {$id} não encontrado "); 

    }

}
