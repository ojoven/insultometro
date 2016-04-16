<?php
namespace App\Lib;

require_once app_path() . '/Lib/Phirehose/OauthPhirehose.php';

class Consumer extends OauthPhirehose {

	const TYPE_STREAMING_TRACK = "track";
	const TYPE_STREAMING_FOLLOW = "follow";

	protected $consumer;

	public function __construct($consumer) {

		// Let's assign the behaviour
		$this->consumer = $consumer;
		$this->consumer->initialize();

		parent::__construct(config('twitter.oauth_token'), config('twitter.oauth_secret'), Phirehose::METHOD_FILTER);

	}

	/** Function used by Phirehose where we set the keywords we want to track  **/
	public function checkFilterPredicates() {

		$keywords = $this->consumer->getKeywords();

		if ($this->consumer->getTypeStreaming()==self::TYPE_STREAMING_TRACK) {
			// Keywords
			$this->setTrack($keywords);
		} else {
			// User follow stream
			$this->setFollow($keywords);
		}
	}

	/** Treat Streamed Tweet **/
	public function enqueueStatus($status) {

		//This function is called automatically by the Phirehose class
		//when a new tweet is received with the JSON data in $status
		$this->consumer->processTweet($status);

	}

}

?>