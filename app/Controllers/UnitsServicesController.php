<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\UnitServiceService;
use App\Models\UnitModel;
use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\View\RendererInterface;


class UnitsServicesController extends BaseController
{

    private UnitModel $unitModel;
    private UnitServiceService $unitServiceService;



    public function __construct()
    {
        $this->unitModel = model(UnitModel::class);
        $this->unitServiceService = Factories::class(UnitServiceService::class);
    }



    public function services(int $unitId)
    {

        $data = [
            'title'             => 'Gerenciar serviços da unidade',
            'unit'              => $unit = $this->unitModel->findOfFail($unitId),
            'servicesOptions'   => $this->unitServiceService->renderServicesOptions($unit->services),
        ];

        return view('Back/Units/services', $data);
    }

    // Processa associacao dos serviceos com uniades
    public function store(int $unitId){

        $this->checkMethod('put'); 

        $unit = $this->unitModel->findOfFail($unitId); 

        $postServices = $this->request->getPost('services'); 

        $unit->services = $postServices ?? null;
        
        if (!$unit->hasChanged()) {

            return redirect()->back()->with('info', 'Não ha dados para atualizar');
        }

        $success = $this->unitModel->save($unit);

        //dd($this->unitModel->errors());

        if (!$success) {

            return redirect()->back()
                ->withInput()
                ->with('danger', 'Verifique os erros e tente novamente')
                ->with('errorsValidation', $this->unitModel->errors());
        }

        return redirect()->back()->with('success', 'Os dados foram atualizos!');

        //dd($this->request->getPost()); 

    }
}
