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
            return $this->matchPlayPointToName($this->actualState[0]);
        }

        if (array_sum($this->actualState) == 0) {
            return 'Love-Love : 0-0';
        }
    }

    /**
     * @param int $playPoint
     *
     * @return string
     */
    private function matchPlayPointToName(int $playPoint): string
    {
        $nameByPlayPoint = [0 => 'Fifteen', 15 => 'Thirty', 30 => 'Forty'];

        return $nameByPlayPoint[$playPoint].'-Love : 0-0';
    }
}