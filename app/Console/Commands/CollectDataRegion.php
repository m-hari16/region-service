<?php

namespace App\Console\Commands;

use App\Common\HttpClient\FetchRegion;
use App\Jobs\SaveDataCityJob;
use App\Jobs\SaveDataProvinceJob;
use Illuminate\Console\Command;

class CollectDataRegion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collect:region';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Collecting the region data initiated';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fetchData = new FetchRegion;

        $province = $fetchData->getProvince();
        dispatch( new SaveDataProvinceJob($province->rajaongkir->results));

        $city = $fetchData->getCity();
        $chunkOfCity = array_chunk($city->rajaongkir->results, 100);
        foreach ($chunkOfCity as $value) {
            dispatch(new SaveDataCityJob($value));
        }

        $this->info("Data collected successfully");
    }
}
