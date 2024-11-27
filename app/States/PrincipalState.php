<?php
namespace App\States;
class PrincipalState implements State {

    protected $stateAnterior;
    protected $stateSiguiente;

    public function __construct(int $stateAnterior = null, int $stateSiguiente = null)
    {
        $this->stateAnterior = $stateAnterior;
        $this->stateSiguiente = $stateSiguiente;
    }

    public function handle($order)
    {
        if($order->estado_id == $this->stateAnterior){
            $order->estado_id = $this->stateSiguiente;
            $order->save();
        }

    }
}
