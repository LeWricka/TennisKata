<?php

namespace Deg540\CleanCodeKata9;

class Tennis
{
    /**
     * @var array
     */
    private $actualState;

    /**
     * Tennis constructor.
     *
     * @param array $actualState
     */
    public function __construct(array $actualState)
    {
        $this->actualState = $actualState;
    }

    /**
     * @return array
     */
    public function playEnd(): array
    {
        return [0,0,0,0];
    }
}