<?php

namespace App\Console\Commands;

use App\Client;
use Illuminate\Console\Command;

class importCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports csv file';

    
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
        $model = config('addclient.model');
        $client = new $model();

        $CSVFile = public_path('test.csv');

        if(!file_exists($CSVFile) || !is_readable($CSVFile))
            return false;

        $header = null;
        $data = array();
        $data = array_filter($data);
        if (($handle = fopen($CSVFile,'r')) !== false){
            while (($row = fgetcsv($handle, 1000, ',', $enclosure = '"')) !==false){
                if (!$header)
                $header = $row;

                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

//        dd($data);

        $dataCount = count($data);
        for ($i = 0; $i < $dataCount; $i ++){
            Client::firstOrCreate($data[$i]);
//                $client->save();
        }


        echo "Client data added successfully"."\n";
//
//        $this->csvToArray();
//        $this->importCsv();
//        echo "Client data added successfully"."\n";
    }
}
