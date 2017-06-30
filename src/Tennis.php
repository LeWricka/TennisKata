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
     * @return string
     */
    public function playEnd(string $playWinner = ''): string
    {
        if ($playWinner == 'Player1') {
            return $this->matchPlayPointToNameDuringGame($this->actualState[0]);
        }

        return 'Love-Love : 0-0';
    }

    /**
     * @param int $playPoint
     *
     * @return string
     */
    private function matchPlayPointToNameDuringGame(int $playPoint): string
    {
        $game = 0;
        $nameByPlayPoint = [0 => 'Fifteen', 15 => 'Thirty', 30 => 'Forty', 40 => 'Love'];

        if ($nameByPlayPoint[$playPoint] == 'Love') {
            $game = 1;
        }

        return $nameByPlayPoint[$playPoint].'-Love : '.$game.'-0';
    }
}