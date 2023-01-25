<?php


namespace Soconnect\Espresso\Application;

use Soconnect\Espresso\UseCase\Services\MakeDoubleEspressoService;
use Soconnect\Espresso\UseCase\Services\MakeSingleEspressoService;

class EspressoMachine
{

    private $espresso;

    public function makeSingleEspresso()
    {
        $this->espresso = resolve(MakeSingleEspressoService::class);
        $this->espresso->initMachine();
        $this->espresso->makeEspresso();
    }


    public function makeDoubleEspresso()
    {
        $this->espresso = resolve(MakeDoubleEspressoService::class);
        $this->espresso->initMachine();
        $this->espresso->makeDoubleEspresso();
    }

    public function getMachineStatus()
    {
        return $this->espresso->getStatus();
    }

    
}
