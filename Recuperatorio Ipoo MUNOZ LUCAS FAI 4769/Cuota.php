<?php
class Cuota {
    private $numero;
    private $monto_cuota;
    private $monto_interes;
    private $cuotaCancelada;

    public function __construct($numero, $monto_cuota, $monto_interes){
        $this->numero = $numero;
        $this->monto_cuota = $monto_cuota;
        $this->monto_interes = $monto_interes;
        $this->cuotaCancelada = false;

    }
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getMontoCuota() {
        return $this->monto_cuota;
    }

    public function setMontoCuota($monto_cuota) {
        $this->monto_cuota = $monto_cuota;
    }

    public function getMontoInteres() {
        return $this->monto_interes;
    }

    public function setMontoInteres($monto_interes) {
        $this->monto_interes = $monto_interes;
    }

    public function getCuotaCancelada() {
        return $this->cuotaCancelada;
    }

    public function setCuotaCancelada($cuotaCancelada) {
        $this->cuotaCancelada = $cuotaCancelada;
    }

    public function darMontoFinalCuota() {
        return $this->monto_cuota + $this->monto_interes;
    }

    public function __toString() {
        return "Cuota Nº: " . $this->getNumero() . "\nMonto de la Cuota: $". $this->getMontoCuota() ."\nInterés: $" . $this->getMontoInteres() ."\n¿Cancelada?: " . ($this->getCuotaCancelada() ? "Sí" : "No");
    }
}
?>