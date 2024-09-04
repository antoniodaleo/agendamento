<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\View\RendererInterface;


class UnitsServicesController extends BaseController
{

    private UnitModel $unitModel; 


    public function __construct()
    {
        $this->unitModel = model(UnitModel::class); 
    }



    public function services(int $unitId)
    {
        
        $data = [
           'title' => 'Gerenciar serviços da unidade' , 
           'unit' => $unit = $this->unitModel->findOfFail($unitId),
        ]; 

        return view('Back/Units/services', $data); 
    }
}
