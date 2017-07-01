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
     * @param string $playWinner
     *
     * @return array
     */
    public function playEnd(string $playWinner = ''): array
    {
        if ($playWinner == 'Player1') {
            return [1, 0, 0, 0];
        }

        return [0, 0, 0, 0];
    }
}