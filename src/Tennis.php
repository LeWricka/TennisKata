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
        $player1State = [$this->actualState[0], $this->actualState[2]];
        $player2State = [$this->actualState[1], $this->actualState[3]];
        if ($playWinner == 'Player1') {
            $player1State = $this->calculateStateVariationForPlay($player1State);
        }
        if ($playWinner == 'Player2') {
            $player2State = $this->calculateStateVariationForPlay($player2State);
        }

        return [$player1State[0], $player2State[0], $player1State[1], $player2State[1]];
    }

    /**
     * @param array $scoreState
     *
     * @return array
     */
    private function calculateStateVariationForPlay(array $scoreState): array
    {
        $plays = $scoreState[0] + 1;
        $game = $scoreState[1];
        if ($plays == self::NUMBER_OF_PLAYS_FOR_GAME) {
            $game ++;
            $plays = 0;
        }
        return array($plays, $game);
    }
}