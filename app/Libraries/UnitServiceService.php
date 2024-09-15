<?php

namespace App\Libraries;

use App\Entities\Service;
use App\Models\ServiceModel;



class UnitServiceService extends MyBaseService
{


    public function renderServicesOptions(?array $existingServicesIds = null): string {

        $services = model(ServiceModel::class)->orderBy('name', 'ASC')->findAll(); 

        if(empty($services)) {

            $anchor = '<div class="text-info mt-5">Não há serviços disponíveis</div>'; 
            $anchor .= anchor(route_to('services'), 'Ver serviços', ['class'=> 'btn btn-sm btn-outline-primary']); 
            
            return $anchor; 
            
        }

        $ul = '<ul class="list-group">'; 

        //<div class="custom-control custom-checkbox">
          //  <input type="checkbox" name="active" value="1" class="custom-control-input" id="active">
            //<label class="custom-control-label" for="active">Registro ativo</label>
        //</div>

        foreach($services as $service){
            $checked = in_array($service->id, $existingServicesIds ?? [] ) ? 'checked' : '';

            $chebox = '<div class= "custom-control custom-checkbox">'; 
            $chebox .= "<input type='checkbox' {$checked} name='services[]' value='{$service->id}' class='custom-control-input' id='service-{$service->id}'>";
            $chebox .= "<label class='custom-control-label' for='service-{$service->id}'>{$service->name}</label>";
            $chebox .= '</div>';

            $ul .= "<li class='list-group-item'>{$chebox}</li>"; 
        }

        $ul .= '</ul>'; 

        return $ul;

    }
  

    public function renderUnitServices(?array $existingServicesIds = null): string {

        if($existingServicesIds === null || empty($existingServicesIds)){
            
            return self:: TEXT_FOR_NO_DATA; 

        }

        $services = model(ServiceModel::class)->whereIn('id', $existingServicesIds)->orderBy('name', 'ASC')->findAll(); 


        if(empty($services)){
            return self:: TEXT_FOR_NO_DATA; 
        }

        $list = []; 

        foreach($services as $service){
            $list[] = "{$service->name} - {$service->status()}"; 
        }

        return ul($list); 


    }


}
