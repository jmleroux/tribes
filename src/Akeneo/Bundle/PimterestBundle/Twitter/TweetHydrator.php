<?php
namespace Akeneo\Bundle\PimterestBundle\Twitter;

use Zend\Hydrator\ClassMethods;

class TweetHydrator
{
    public function hydrate(\stdClass $data, Tweet $tweet)
    {
        $tweet->setId($data->id);

        if (null !== $data->coordinates) {
            $coordinates = new Coordinates();
            $coordinates->setType($data->coordinates->type);
            $coordinates->setCoordinates($data->coordinates->coordinates);
            $data->coordinates = $coordinates;
        };

        if (isset($data->place->bounding_box->coordinates)) {
            $coordinates = new Coordinates();
            $coordinates->setType($data->place->bounding_box->type);
            $coordinates->setCoordinates($data->place->bounding_box->coordinates);
            $data->coordinates = $coordinates;
        }

        $zendHydrator = new ClassMethods();

        foreach ((array) $data->entities as $type => $entity) {
            if ('media' === $type) {
                $allMedia = [];
                foreach ((array) $entity as $mediaData) {
                    $media = new TwitterMediaEntity();
                    $zendHydrator->hydrate((array) $mediaData, $media);
                    $allMedia[]  = $media;
                    $data->media = $allMedia;
                }
            }
        }

        return $zendHydrator->hydrate((array) $data, $tweet);
    }
}