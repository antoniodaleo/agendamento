<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Entities\Unit;
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

    public function new()
    {
        $data = [
            'title' => 'Criar Unidade',
            'unit' => new Unit(),
            'timesInterval' => $this->unitService->renderTimeInterval()
        ];


        return view('Back/Units/new', $data);
    }

    public function create()
    {

        $this->checkMethod('post');

        $unit = new Unit($this->clearRequest());


        if (!$this->unitModel->insert($unit)) {

            return redirect()->back()
                ->withInput()
                ->with('danger', 'Verifique os erros e tente novamente')
                ->with('errorsValidation', $this->unitModel->errors());
        }

        return redirect()->route('units')->with('success', 'Os dados foram atualizos!');
    }


    public function edit(int $id)
    {

        $data = [
            'title'         => 'Editar unidade',
            'unit'          => $unit = $this->unitModel->findOfFail($id),
            'timesInterval' => $this->unitService->renderTimeInterval($unit->servicetime)

        ];

        dd($unit);

        return view('Back/Units/edit', $data);
    }


    public function update(int $id)
    {

        $this->checkMethod('put');

        $unit = $this->unitModel->findOfFail($id);

        //dd($this->request->getPost());

        $unit->fill($this->clearRequest());

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

        return redirect()->route('units')->with('success', 'Os dados foram atualizos!');
    }
}
