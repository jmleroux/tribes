<?php

namespace Akeneo\Bundle\PimterestBundle\Twitter;

class Coordinates
{
    /** @var string */
    protected $type;

    /** @var mixed[] */
    protected $coordinates;

    /** @var float[] */
    protected $boundaries;

    public function __construct()
    {
        $this->boundaries = [
            0 => ['min' => null, 'max' => null],
            1 => ['min' => null, 'max' => null],
        ];
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param mixed[] $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        if ('point' === $this->type) {
            return (float) $this->coordinates[0];
        }

        $this->computeBoundaries();

        return $this->boundaries[0]['min'] + (($this->boundaries[0]['max'] - $this->boundaries[0]['min']) / 2);
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        if ('point' === $this->type) {
            return (float) $this->coordinates[1];
        }

        $this->computeBoundaries();

        return $this->boundaries[1]['min'] + (($this->boundaries[1]['max'] - $this->boundaries[1]['min']) / 2);
    }

    protected function computeBoundaries()
    {
        foreach ($this->coordinates[0] as $coordinate) {
            if (null === $this->boundaries[0]['min']
                || (float) $coordinate[0] < $this->boundaries[0]['min']
            ) {
                $this->boundaries[0]['min'] = (float) $coordinate[0];
            }
            if (null === $this->boundaries[0]['max']
                || (float) $coordinate[0] > $this->boundaries[0]['max']
            ) {
                $this->boundaries[0]['max'] = (float) $coordinate[0];
            }
            if (null === $this->boundaries[1]['min']
                || (float) $coordinate[1] < $this->boundaries[1]['min']
            ) {
                $this->boundaries[1]['min'] = (float) $coordinate[1];
            }
            if (null === $this->boundaries[1]['max']
                || (float) $coordinate[1] > $this->boundaries[1]['max']
            ) {
                $this->boundaries[1]['max'] = (float) $coordinate[1];
            }
        }
    }
}
