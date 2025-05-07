<?php
include_once 'Cliente.php';
include_once 'Cuota.php';

class Prestamo {
    private static $contadorPrestamos = 0;
    private $idPrestamo;
    private $codigoElectrodomestico;
    private $fechaOtorgamiento;
    private $monto;
    private $cantidadCuotas;
    private $tasaInteres;
    private $cuotas; 
    private $cliente; 

    public function __construct($monto, $cantidadCuotas, $tasaInteres, Cliente $cliente) {
        
        self::$contadorPrestamos++;
        $this->idPrestamo = self::$contadorPrestamos;
        
        $this->monto = $monto;
        $this->cantidadCuotas = $cantidadCuotas;
        $this->tasaInteres = $tasaInteres;
        $this->cliente = $cliente;
        $this->cuotas = [];
    }

    public function getIdPrestamo() {
        return $this->idPrestamo;
    }

    public function getCodigoElectrodomestico() {
        return $this->codigoElectrodomestico;
    }

    public function getFechaOtorgamiento() {
        return $this->fechaOtorgamiento;
    }

    public function getMonto() {
        return $this->monto;
    }

    public function getCantidadCuotas() {
        return $this->cantidadCuotas;
    }

    public function getTasaInteres() {
        return $this->tasaInteres;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getCuotas() {
        return $this->cuotas;
    }

    private function calcularInteresPrestamo($numCuota) {
        $montoCuotaBase = $this->getMonto() / $this->getCantidadCuotas();
        $saldoDeudor = $this->getMonto() - ($montoCuotaBase * ($numCuota - 1));
        $interes = $saldoDeudor * ($this->getTasaInteres() / 100);
        return $interes;
    }

    
    public function otorgarPrestamo() {
    
        $fecha = getdate();
        $this->fechaOtorgamiento = sprintf('%02d/%02d/%04d',
            $fecha['mday'], $fecha['mon'], $fecha['year']
        );

    
        $this->cuotas = []; 
        $montoBase = $this->monto / $this->cantidadCuotas;

        for ($i = 1; $i <= $this->cantidadCuotas; $i++) {
            $interes = $this->calcularInteresPrestamo($i);
            $this->cuotas[] = new Cuota($i, $montoBase, $interes);
        }
    }
        public function darSiguienteCuotaPagar() {
            foreach ($this->cuotas as $cuota) {
                if (!$cuota->getCuotaCancelada()) {
                    return $cuota;
                }
            }
            return null;
        }

    public function __toString() {
        $cuotasStr = "";
        foreach ($this->cuotas as $cuota) {
            $cuotasStr .= $cuota . "\n";
        }

        return "ID Prestamo: " . $this->getIdPrestamo() . "\nFecha de Otorgamiento: " . $this->getFechaOtorgamiento() . "\nMonto: $" . $this->getMonto() . 
        "\nCantidad de Cuotas: " . $this->getCantidadCuotas() . "\nTasa de Interés: " . $this->getTasaInteres() . "%" ."\nCliente: \n" . $this->getCliente() . "\nCuotas:\n" . $cuotasStr;
    }
}
?>
