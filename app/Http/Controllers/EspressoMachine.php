<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Soconnect\Beans\UseCase\Exception\CoffeeBeansContainerFullException;
use Soconnect\Espresso\Application\EspressoMachine as ApplicationEspressoMachine;
use Soconnect\Espresso\UseCase\Exception\NotEnoughWaterInTheContainerException;

class EspressoMachine extends Controller
{
    //


    private $espressoMachine;
    public function __construct(ApplicationEspressoMachine $espressoMachine)
    {
       $this->espressoMachine = $espressoMachine;
    }
    public function singleEspresso()
    {

        try{

            $this->espressoMachine->makeSingleEspresso();

            return [
                'status'=>'created'
            ];
        }catch(CoffeeBeansContainerFullException $ex) {

            return [
                'error'=>true,
                'message' => $ex->getMessage()
            ];
        }catch(NotEnoughWaterInTheContainerException $ex) {

            return [
                'error'=>true,
                'message' => $ex->getMessage()
            ];
        }
        
       
    }

    public function doubleEspresso()
    {

        try{
            
            $this->espressoMachine->makeDoubleEspresso();

            return [
                'error'=>false,
                'status'=>'created'
            ];
        }catch(CoffeeBeansContainerFullException $ex) {

            return [
                'error'=>true,
                'message' => $ex->getMessage()
            ];
        }catch(NotEnoughWaterInTheContainerException $ex) {

            return [
                'error'=>true,
                'message' => $ex->getMessage()
            ];
        }
       
    }

    public function espressoStatus()
    {
        $currentStatus = $this->espressoMachine->getMachineStatus();

        return [
            'error'=>false,
            'status'=>'created',
            'data'=> [
                'current_status' => $currentStatus,
            ]
        ];
    }
}
