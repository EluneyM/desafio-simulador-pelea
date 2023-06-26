<?php

namespace App;

class Peleador
{
    protected $vidaTotal;
    protected $velocidad;
    protected $poderDePelea;

    public function __construct(protected string $nombre)
    {
       $this->nombre = $nombre;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setVidaTotal(int $vida): void
    {
        $this->vidaTotal = $vida;
    }

    public function setVelocidad(int $velocidad): void
    {
        $this->velocidad = $velocidad;
    }

    public function setPoderDePelea(int $poderDePelea): void
    {
        $this->poderDePelea = $poderDePelea;
    }

    public function estaListoParaPelear(): bool
    {
        return (isset($this->velocidad) && isset($this->poderDePelea) && isset($this->vidaTotal));
    }

    public function getVelocidad(): int
    {
        return $this->velocidad;
    }

    public function getVidaTotal(): int
    {
        return $this->vidaTotal;
    }

    public function getPoderDePelea(): int
    {
        return $this->poderDePelea;
    }

    public function recibeDanio(int $danio): void
    {
        $this->vidaTotal -= $danio;
    }
}
