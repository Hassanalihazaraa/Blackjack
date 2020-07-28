<?php

/**
 * class blackjack
 *
 * properties:
 *
 * private { player, dealer, deck }
 *
 * publicmethods:
 * getPLayer()
 * getDealer()
 */

class Blackjack extends Player
{
    private $player;
    private $dealer;
    private $deck;

    /**
     * Blackjack constructor.
     * @param $player
     * @param $dealer
     * @param $deck
     */
    public function __construct($player, $dealer, $deck)
    {
        $this->player = $player;
        $this->dealer = $dealer;
        $this->deck = $deck;
    }

    /**
     * @return mixed
     */
    public function getPlayer()
    {
        return $this->player;
    }


    /**
     * @return mixed
     */
    public function getDealer()
    {
        return $this->dealer;
    }



}
