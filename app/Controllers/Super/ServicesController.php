<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Entities\Service;
use App\Libraries\ServiceService;
use App\Models\ServiceModel;
use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\RedirectResponse; 
use CodeIgniter\View\RendererInterface;


class ServicesController extends BaseController
{

    // @var unitservice
    private ServiceService $serviceService; 

    // @var unitmodel
    private ServiceModel $serviceModel;



    public function __construct()
    {
        $this->serviceService = Factories::class(ServiceService::class);
        $this->serviceModel = model(ServiceModel::class);
    }


    /*
    
    
    @return RendererInterface
    
    */


    public function index()
    {
        $data = [
            'title' => 'Serviços',
            'services' => $this->serviceService->renderServices(),
        ];



        return view('Back/Services/index', $data);
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

    public function action(int $id)
    {

        $this->checkMethod('put');

        $unit = $this->unitModel->findOfFail($id);
        $unit->setAction();

        $this->unitModel->save($unit);

        return redirect()->route('units')->with('success', 'Os dados foram atualizos!');
    }

    public function destroy(int $id)
    {

        $this->checkMethod('delete');

        $unit = $this->unitModel->findOfFail($id);

        $this->unitModel->delete($unit->id);

        return redirect()->route('units')->with('success', 'Registro eliminado!');
    }
}
