<?php

namespace App\Jobs;

use App\Common\Helper\DataTransform\RegionTransform;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\ProvinceRegion;

class SaveDataProvinceJob implements ShouldQueue
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

        $provinceData = $transformData->toEntityOfProvince($this->data);

        ProvinceRegion::insert($provinceData);
    }
}
