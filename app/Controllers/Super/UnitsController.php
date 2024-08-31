<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Libraries\UnitService;
use App\Models\UnitModel;
use CodeIgniter\Config\Factories;
use CodeIgniter\View\RendererInterface; 

class UnitsController extends BaseController
{

    // @var unitservice
    private UnitService $unitService; 
    
    // @var unitmodel
    private UnitModel $unitModel; 


    
    public function __construct()
    {
        $this->unitService = Factories::class(UnitService::class);
        $this->unitModel = model(UnitModel::class);
    }


    /*
    
    
    @return RendererInterface
    
    */


    public function index()
    {
        $data = [
            'title' => 'Unidades',
            'units' => $this->unitService->renderUnits(),
        ]; 

       

        return view('Back/Units/index', $data); 
    }



    public function edit(int $id)
    {

        $data = [
            'title' => 'Editar unidade',
            'unit' => $this->unitModel->findOfFail($id),
        ]; 

       

        return view('Back/Units/edit', $data); 
    }
}
