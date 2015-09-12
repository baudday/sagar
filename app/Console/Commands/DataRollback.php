<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Product;
use App\Location;

class DataRollback extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:rollback';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes all data imported from data.csv';

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
        $this->comment(sprintf("Deleting %d products and %d locations", Product::count(), Location::count()));

        Product::all()->each(function($doc) {
            $doc->delete();
        });

        Location::all()->each(function($doc) {
            $doc->delete();
        });
    }
}
