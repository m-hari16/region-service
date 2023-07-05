<?php

namespace App\Jobs;

use App\Common\Helper\DataTransform\RegionTransform;
use App\Models\CityRegion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveDataCityJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $transformData = new RegionTransform;

        $provinceData = $transformData->toEntityOfCity($this->data);

        CityRegion::insert($provinceData);
    }
}
