<?php
include_once 'Cliente.php';
include_once 'Cuota.php';
include_once 'Prestamo.php';
include_once 'Financiera.php';

// Crear objeto Financiera
$financiera = new Financiera("ElectroCash", "Av. Arg 1234");

// Crear clientes
$cliente1 = new Cliente("Pepe", "Florez", "444567", "Bs As 12", "dir@mail.com", "299", 40000);
$cliente2 = new Cliente("Luis", "Suarez", "4455", "Bs As 123", "dir@mail.com", "299", 4000);

// Crear préstamos
$prestamo1 = new Prestamo(50000, 5, 0.1, $cliente1);
$prestamo2 = new Prestamo(10000, 4, 0.1, $cliente2);
$prestamo3 = new Prestamo(10000, 2, 0.1, $cliente2);


$financiera->otorgarPrestamo($prestamo1);
$financiera->otorgarPrestamo($prestamo2);
$financiera->otorgarPrestamo($prestamo3);


$financiera->otorgarPrestamoSiCalifica();


echo $financiera;


$objCuota = $financiera->informarCuotaPagar(2);

if ($objCuota !== null) {
    echo "\n\nPróxima cuota a pagar del préstamo 2:\n";
    echo $objCuota;

    // Mostrar el monto final de la cuota
    echo "\nMonto final de la cuota a pagar: $" . $objCuota->darMontoFinalCuota() . "\n";
} else {
    echo "\n\nNo se encontró el préstamo o no tiene cuotas pendientes.";
}
?>
