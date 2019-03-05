<?php


// Смотря для каких целей. Если просто ездить — то примерно так.
// Если ремонтировать — другой вариант, если сдавать в аренду — третий.

class Bicycle
{
	private $state;

	public function __construct($state) {
        $this->state=$state;
    }

	public function turn ($direction){
	    $this->state->modify($direction);
    }
	public function toPedal($speed){
        $this->state->modify($speed);
    }
	public function brake(){
        $this->state->modify('stop');
    }

	public function getStaste()
    {
        return $this->state;
    }
}