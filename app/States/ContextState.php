<?php

namespace App\States;

use App\Utils\Constants\States;

class ContextState{

    private $state;

    public function __construct(int $state)
    {
        switch($state){
            case States::OPEN:
                $this->state = new OpenState();
                break;
            case States::CANCEL:
                $this->state = new CancelState();
                break;
            case States::PAID:
                $this->state = new PaidState();
                break;
        }
    }

    public function handle($order){
        $this->state->handle($order);
    }
}
