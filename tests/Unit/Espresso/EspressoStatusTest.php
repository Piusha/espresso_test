<?php

namespace Tests\Unit\Espresso;

use Soconnect\Espresso\UseCase\Services\EspressoMachineStatusGenerator;
use Soconnect\Espresso\UseCase\Services\MakeSingleEspressoService;
use Tests\TestCase;

class EspressoStatusTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_it_should_return_add_beans_and_water_when_water_and_beans_are_empty()
    {

        $status = resolve(EspressoMachineStatusGenerator::class);

        $currentStatus = $status->setRemainingWaterVolumeInTheContainer(0.0)
            ->setRemainingSpoonOfBeansInTheContainer(0)
            ->getNexStatus();

        $this->assertEquals(config('espresso.status_string.add_beans_and_water'), $currentStatus->next_status_description );
        
    }

    public function test_it_should_return_add_water_status_when_water_is_empty()
    {

        $status = resolve(EspressoMachineStatusGenerator::class);

        $currentStatus = $status->setRemainingWaterVolumeInTheContainer(0.0)
            ->setRemainingSpoonOfBeansInTheContainer(10)
            ->getNexStatus();

        $this->assertEquals(config('espresso.status_string.add_water'), $currentStatus->next_status_description );
        
    }
   
    public function test_it_should_return_add_beans_status_when_beans_is_empty()
    {

        $status = resolve(EspressoMachineStatusGenerator::class);

        $currentStatus = $status->setRemainingWaterVolumeInTheContainer(0.5)
            ->setRemainingSpoonOfBeansInTheContainer(0)
            ->getNexStatus();

        $this->assertEquals(config('espresso.status_string.add_beans'), $currentStatus->next_status_description );
        
    }

    public function test_it_should_return_calculate_remaining_espresso_status_as_default()
    {

        $status = resolve(EspressoMachineStatusGenerator::class);

        $currentStatus = $status->setRemainingWaterVolumeInTheContainer(0.5)
            ->setRemainingSpoonOfBeansInTheContainer(2)
            ->getNexStatus();

        $this->assertEquals(config('espresso.status_string.ready_to_calculate'), $currentStatus->next_status_description );
        
    }
}
