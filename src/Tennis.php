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
            return $this->matchPlayPointToNameDuringGame($this->actualState);
        }
        elseif ($playWinner == 'Player2') {
            return $this->matchPlayPointToNameDuringGame($this->actualState[1]);
        }

        return 'Love-Love : 0-0';
    }

    /**
     * @param array $actualState
     *
     * @return array
     */
    private function calculateNewStateAfterPlay(array $actualState, string $playWinner): array
    {
        $actualState[0] += $actualState[0];
        return $actualState;
    }

    /**
     * @param array $playPoint
     *
     * @return string
     */
    private function matchPlayPointToNameDuringGame(array $playPoint): string
    {
        $game = 0;
        $nameByPlayPoint = [0 => 'Fifteen', 15 => 'Thirty', 30 => 'Forty', 40 => 'Love'];

        if ($nameByPlayPoint[$playPoint] == 'Love') {
            $game = 1;
        }

        return $nameByPlayPoint[$playPoint].'-Love : '.$game.'-0';
    }
}