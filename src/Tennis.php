<?php

namespace Deg540\CleanCodeKata9;

class Tennis
{
    const NUMBER_OF_PLAYS_FOR_GAME = 4;
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
        $plays = $this->actualState[0];
        $game = $this->actualState[2];
        if ($playWinner == 'Player1') {
            $plays ++;
            if ($plays == self::NUMBER_OF_PLAYS_FOR_GAME) {
                $game ++;
                $plays = 0;
            }
        }

        return [$plays, 0, $game, 0];
    }
}