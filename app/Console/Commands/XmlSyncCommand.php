<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class XmlSyncCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:xml';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $opts = [
            'http' => [
                'method' => 'GET',
                'header' => "Accept-language: en\r\n",
                'verify_peer'=>false,
                'verify_peer_name'=>false,
            ],
        ];
        $url="http://xml.propspace.com/feed/xml.php?cl=3541&pid=8782&acc=8781";
        
        $context = stream_context_create($opts);
        $xmlstring = file_get_contents($url, false, $context);
        $xml = simplexml_load_string($xmlstring);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        $collection = collect($array['Listing']);
        $sellProperties = $collection->where('Ad_Type', "Sale");
        $buyProperties = $collection->where('Ad_Type', "Rent");
        file_put_contents(storage_path("sell_xml.json"),json_encode($sellProperties->toArray()));
        file_put_contents(storage_path("buy_xml.json"),json_encode($buyProperties->toArray()));
    }
}
