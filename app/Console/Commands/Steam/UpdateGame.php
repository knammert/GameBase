<?php

namespace App\Console\Commands\Steam;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Factory;

class UpdateGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'steam:update-game {game}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating database with steam games';

    private Factory $httpClient;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Factory $httpClient)
    {
        parent::__construct();
        $this->httpClient = $httpClient;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $response = Http::get('https://postman-echo.com/get', [
        //     'foo' => 'bar',
        //     'alpha' => 'xd'
        // ]);

        $response = $this->httpClient->post('https://postman-echo.com/post', [
            'foo' => 'bar',
            'alpha' => 'xd'
        ]);

        dump($response);
        return 0;
    }
}
