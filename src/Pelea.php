<?php

namespace App;

use Exception;

class Pelea
{
    public function __construct(
        protected Peleador $peleador1, 
        protected Peleador $peleador2
    )
    {}

    public function getPeleador1(): Peleador
    {
        return $this->peleador1;
    }

    public function getPeleador2(): Peleador
    {
        return $this->peleador2;
    }

    public function combate(): Resultado
    {
        if (!$this->estaListaParaEmpezar()) {
           throw new Exception('La pelea no puede comenzar porque los combatientes no están preparados');
        }

        $primerPeleador = $this->quienPegaPrimero();
        $primerPeleadorPoderDePelea = $primerPeleador->getPoderDePelea();

        $segundoPeleador = $this->quienPegaSegundo();
        $segundoPeleadorPoderDePelea = $segundoPeleador->getPoderDePelea();

        $continuarPelea = true;

        while ($continuarPelea) {
            $segundoPeleador->recibeDanio($primerPeleadorPoderDePelea);
            $primerPeleador->recibeDanio($segundoPeleadorPoderDePelea);

            if ($primerPeleador->getVidaTotal() >= 0 || $segundoPeleador->getVidaTotal() >= 0) {
                $continuarPelea = false;
            }
        }
        
        return new Resultado($primerPeleador, $segundoPeleador);
    }

    public function estaListaParaEmpezar(): bool
    {
        return $this->peleador1->estaListoParaPelear() && $this->peleador2->estaListoParaPelear();
    }

    public function quienPegaPrimero(): Peleador
    {
        if ($this->peleador1->getVelocidad() > $this->peleador2->getVelocidad()) {
            return $this->peleador1;
        }

        return $this->peleador2;
    }

    public function quienPegaSegundo(): Peleador
    {
        if ($this->peleador1->getVelocidad() <= $this->peleador2->getVelocidad()) {
            return $this->peleador1;
        }

        return $this->peleador2;
    }
}
