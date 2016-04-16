<?php

namespace App\Console\Commands;

use App\Models\InsultoConsumer;
use App\Lib\Consumer;
use Illuminate\Console\Command;

class Consume extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consume Twitter Streaming';

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
        echo app_path() . '/Lib/Phirehose/OauthPhirehose.php';
        $insultoConsumer = new InsultoConsumer();
        $consumer = new Consumer($insultoConsumer);
        $consumer->consume();
    }
}
