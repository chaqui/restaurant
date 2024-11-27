<?php

namespace App\States;
use App\Utils\Constants\States;

class OpenState extends PrincipalState implements State {

    public function __construct()
    {
        parent::__construct(null, States::OPEN);
    }
    public function handle($order)
    {
        parent::handle($order);
    }
}
