<?php

namespace App\Models;

use App\Lib\MysqliDb\MysqliDb;
use App\Lib\Consumer;
use Illuminate\Database\Eloquent\Model;

class InsultoConsumer extends Model {

    protected $db;
    protected $cb;
    protected $type_streaming;

    public function initialize() {

        // Keywords track or user follow streaming
        $this->type_streaming = Consumer::TYPE_STREAMING_TRACK;

        // Database
        //$this->db = new MysqliDb(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE'));

        // Codebird
        Codebird::setConsumerKey(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'));
        $this->cb = Codebird::getInstance();
        $this->cb->setToken(env('OAUTH_TOKEN'), env('OAUTH_SECRET'));

    }

}