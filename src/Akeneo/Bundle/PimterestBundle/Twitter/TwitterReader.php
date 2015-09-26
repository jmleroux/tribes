<?php

namespace Akeneo\Bundle\PimterestBundle\Twitter;

use TwitterAPIExchange;

class TwitterReader
{
    protected $settings;

    protected $tag;

    public function __construct(
        $tag,
        $oauth_access_token,
        $oauth_access_token_secret,
        $consumer_key,
        $consumer_secret
    ) {
        $this->tag = trim($tag);

        $this->settings = [
            'oauth_access_token'        => $oauth_access_token,
            'oauth_access_token_secret' => $oauth_access_token_secret,
            'consumer_key'              => $consumer_key,
            'consumer_secret'           => $consumer_secret,
        ];
    }

    public function retrieve()
    {
        $url           = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield      = sprintf('?q=#%s -RT', $this->tag);
        $requestMethod = 'GET';

        $twitter = new TwitterAPIExchange($this->settings);

        $response = $twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest();

        $data = json_decode($response);

        $formatted = [];

        foreach ($data->statuses as $postData) {
            $parsed = $this->extractPost($postData);
            if (count($parsed) > 0) {
                $formatted[] = $parsed;
            }
        }

        return $formatted;
    }

    protected function extractPost(\stdClass $data)
    {
        $tweet = new Tweet();
        $tweetHydrator = new TweetHydrator();

        $tweetHydrator->hydrate($data, $tweet);

        $formatted = [
            'app_id'    => $tweet->getIdStr(),
            'source'    => 'twitter',
            'username'  => $tweet->getUser()->screen_name,
            'usertype'  => 'community',
            'active'    => true,
            'content'   => $tweet->getText(),
            'mediaurl'  => null,
            'latitude'  => 0,
            'longitude' => 0,
        ];

        $media = $tweet->getMedia();
        if (count($media) > 0) {
            $formatted['mediaurl'] = $media[0]->getMediaUrl();
        }

        if ($tweet->getCoordinates()) {
            $formatted['longitude'] = $tweet->getCoordinates()->getLongitude();
            $formatted['latitude']  = $tweet->getCoordinates()->getLatitude();
        }

        return $formatted;
    }
}
