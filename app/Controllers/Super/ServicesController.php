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
            'service' => new Service(),
            
        ];


        return view('Back/Services/new', $data);
    }

    public function create()
    {

        $this->checkMethod('post');

        $service = new Service($this->clearRequest());


        if (!$this->serviceModel->insert($service)) {

            return redirect()->back()
                ->withInput()
                ->with('danger', 'Verifique os erros e tente novamente')
                ->with('errorsValidation', $this->serviceModel->errors());
        }

        return redirect()->route('services')->with('success', 'Os dados foram atualizos!');
    }


    public function edit(int $id)
    {

        $data = [
            'title'         => 'Editar serviço',
            'service'      =>  $this->serviceModel->findOfFail($id),

        ];

        return view('Back/Services/edit', $data);
    }


    public function update(int $id)
    {

        $this->checkMethod('put');

        $service = $this->serviceModel->findOfFail($id);

        //dd($this->request->getPost());

        $service->fill($this->clearRequest());

        if (!$service->hasChanged()) {

            return redirect()->back()->with('info', 'Não ha dados para atualizar');
        }

        $success = $this->serviceModel->save($service);

        //dd($this->unitModel->errors());

        if (!$success) {

            return redirect()->back()
                ->withInput()
                ->with('danger', 'Verifique os erros e tente novamente')
                ->with('errorsValidation', $this->serviceModel->errors());
        }

        return redirect()->route('services')->with('success', 'Os dados foram atualizos!');
    }

    public function action(int $id)
    {

        $this->checkMethod('put');

        $service = $this->serviceModel->findOfFail($id);
        $service->setAction();

        $this->serviceModel->save($service);

        return redirect()->route('services')->with('success', 'Os dados foram atualizos!');
    }

    public function destroy(int $id)
    {

        $this->checkMethod('delete');

        $service = $this->serviceModel->findOfFail($id);

        $this->serviceModel->delete($service->id);

        return redirect()->route('services')->with('success', 'Registro eliminado!');
    }
}
