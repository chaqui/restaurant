<?php
namespace App\States;
interface State {
    public function handle($order);
}
