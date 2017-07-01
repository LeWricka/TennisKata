<?php

namespace Deg540\CleanCodeKata9;

class Tennis
{
    const PLAYER1_PLAYS = 0;
    const PLAYER2_PLAYS = 1;
    const PLAYER1_GAMES = 2;
    const PLAYER2_GAMES = 3;
    const NUMBER_OF_PLAYS_FOR_GAME = 4;
    const PLAYER_1 = 'Player1';
    const PLAYER_2 = 'Player2';

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
        if ($playWinner == self::PLAYER_1) {
            $this->updateState(self::PLAYER1_PLAYS, self::PLAYER1_GAMES);
        }
        if ($playWinner == self::PLAYER_2) {
            $this->updateState(self::PLAYER2_PLAYS, self::PLAYER2_GAMES);
        }

        return array_values($this->actualState);
    }

    /**
     * @return bool
     */
    private function isGameWinner(): bool
    {
        if (($this->isScoreHigherThanGameMax(self::PLAYER1_PLAYS) ||
                $this->isScoreHigherThanGameMax(self::PLAYER2_PLAYS))
            && ($this->isPlayDifferenceHigherThanMaxDifference())
        ) {
            return true;
        }
        return false;
    }

    /**
     * @param int $winnerPlayerGames
     */
    private function cleanStateAfterGameEnd(int $winnerPlayerGames)
    {
        $this->actualState[self::PLAYER1_PLAYS] = 0;
        $this->actualState[self::PLAYER2_PLAYS] = 0;
        $this->actualState[$winnerPlayerGames] ++;
    }

    /**
     * @param int $plays
     * @param int $games
     */
    private function updateState(int $plays, int $games)
    {
        $this->actualState[$plays] ++;
        if ($this->isGameWinner()) {
            $this->cleanStateAfterGameEnd($games);
        }
    }

    /**
     * @param int $player
     *
     * @return bool
     */
    private function isScoreHigherThanGameMax(int $player): bool
    {
        return $this->actualState[$player] >= self::NUMBER_OF_PLAYS_FOR_GAME;
    }

    /**
     * @return bool
     */
    private function isPlayDifferenceHigherThanMaxDifference(): bool
    {
        $playDifference = $this->actualState[self::PLAYER1_PLAYS] - $this->actualState[self::PLAYER2_PLAYS];
        if($playDifference > 1 || $playDifference < -1){
            return true;
        }

        return false;
    }
}