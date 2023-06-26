<?php

namespace App;

class Resultado
{
    public function __construct(
        protected Peleador $peleador1, 
        protected Peleador $peleador2
    )
    {}

    public function vencedor(): Peleador
    {
        if ($this->peleador1->getVidaTotal() > $this->peleador2->getVidaTotal()) {
            return $this->peleador1;
        }

        return $this->peleador2;
    }
}
