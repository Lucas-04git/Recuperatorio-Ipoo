<?php
include_once 'Prestamo.php';
include_once 'Cliente.php';
include_once 'Cuota.php';

class Financiera {
    private $denominación;
    private $dirección;
    private $colPrestamos;

    public function __construct($denominación, $dirección) {
        $this->denominación = $denominación;
        $this->dirección = $dirección;
        $this->colPrestamos = array();
    }
    public function getDenominacion() {
        return $this->denominación;
    }

    public function setDenominacion($denominación) {
        $this->denominación = $denominación;
    }

    public function getDireccion() {
        return $this->dirección;
    }

    public function setDireccion($dirección) {
        $this->dirección = $dirección;
    }

    public function getColPrestamos() {
        return $this->colPrestamos;
    }

    public function setColPrestamos($colPrestamos) {
        $this->colPrestamos = $colPrestamos;
    }
    public function incorporarPrestamo($prestamo) {
        if ($prestamo instanceof Prestamo) {
            $this->colPrestamos[] = $prestamo;
        }
    }
    
    public function otorgarPrestamo($prestamo) {
        if ($prestamo instanceof Prestamo) {
            $this->colPrestamos[] = $prestamo;
            $prestamo->otorgarPrestamo();
        }
    }
    
    public function otorgarPrestamoSiCalifica() {
        foreach ($this->colPrestamos as $prestamo) {
       
            if (count($prestamo->getCuotas()) === 0) {
                $montoCuota = $prestamo->getMonto() / $prestamo->getCantidadCuotas();
                $cliente = $prestamo->getCliente();
                $limite = $cliente->getImporteNeto() * 0.40;
    
                if ($montoCuota <= $limite) {
                  
                    $prestamo->otorgarPrestamo();
                }
            }
        }
    }

    public function informarCuotaPagar($idPrestamo) {
        $cuota = null;
        $i = 0;
        $encontrado = false;
    
        while ($i < count($this->colPrestamos) && !$encontrado) {
            $prestamo = $this->colPrestamos[$i];
            if ($prestamo->getIdPrestamo() == $idPrestamo) {
                $cuota = $prestamo->darSiguienteCuotaPagar();
                $encontrado = true;
            }
            $i++;
        }
    
        return $cuota;
    }
    

    public function __toString() {
        $prestamosInfo = '';

        if (count($this->colPrestamos) > 0) {
            foreach ($this->colPrestamos as $prestamo) {
                $prestamosInfo .= $prestamo . "\n";
            }
        } else {
            $prestamosInfo = 'No hay préstamos registrados.';
        }

        return "Denominación: " . $this->getDenominacion() . "\nDirección: " . $this->getDireccion() . "\nPréstamos:\n" . $prestamosInfo;
    }
}
?>
