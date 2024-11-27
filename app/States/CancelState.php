<?php

namespace App\States;
use App\Utils\Constants\States;

class CancelState extends PrincipalState implements State {

        public function __construct()
        {
            parent::__construct(States::OPEN, States::CANCEL);
        }
        public function handle($order)
        {
            parent::handle($order);
        }
}
