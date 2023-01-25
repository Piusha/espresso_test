<?php

namespace Soconnect\Espresso\UseCase\Services;


class EspressoMachineStatusGenerator
{

    private $waterVolume;

    private $spoonsOfBeans;

    private $status;

    public function setRemainingWaterVolumeInTheContainer(float $waterVolume)
    {

        $this->waterVolume = $waterVolume;
        return $this;
    }

    public function setRemainingSpoonOfBeansInTheContainer(int $spoonsOfBeans)
    {

        $this->spoonsOfBeans = $spoonsOfBeans;
        return $this;
    }

    private function generateNextStatus()
    {

        if($this->waterVolume == 0 && $this->spoonsOfBeans === 0) {

            $this->status = config('espresso.status.add_beans_and_water');
            return ;
        }
        else if($this->waterVolume == 0) {

            $this->status = config('espresso.status.add_water');
            return ;
        }
        else if($this->spoonsOfBeans === 0) {

            $this->status = config('espresso.status.add_beans');
            return;
        }

        $this->status = config('espresso.status.ready_to_calculate');
       
    }


    public function getNexStatus()
    {

        $this->generateNextStatus();
        return (object)[
            'next_status_code' => $this->status,
            'next_status_description' => config("espresso.status_string.{$this->status}"),
        ];
    }
}
