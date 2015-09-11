<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Product;
use App\Location;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from data.csv';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $raw = array_map('str_getcsv', file('data.csv'));
        $data = array_slice($raw, 1);
        foreach ($data as $row) {
            $location = Location::firstOrCreate([
                'county' => $this->county($row[0]),
                'city' => $this->city($row[1]),
                'state' => $this->state($row[0])
            ]);

            $product = Product::create([
                'name' => $row[2],
                'opis_avg' => $this->float($row[3]),
                'freight' => $this->float($row[4]),
                'margin' => $this->float($row[5]),
                'location_id' => $location->id
            ]);

        }

        $this->info(sprintf("Imported %d locations and %d products\r", Location::count(), Product::count()));
    }

    private function county($str)
    {
        return trim(explode(',', $str)[0]);
    }

    private function city($str)
    {
        return trim(explode(',', $str)[0]);
    }

    private function state($str)
    {
        return trim(explode(',', $str)[1]);
    }

    private function float($val)
    {
        return floatval(str_replace('$', '', $val));
    }
}
