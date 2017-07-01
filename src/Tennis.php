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
        $sum = 0;
        if ($playWinner == 'Player1') {
            $sum ++;
        }

        return [$this->actualState[0] + $sum, 0, 0, 0];
    }
}