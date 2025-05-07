<?php
 class Cliente {
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $importeNeto;
    public function __construct($nombre, $apellido, $dni, $direccion, $mail, $telefono, $importeNeto) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
        $this->importeNeto = $importeNeto;
        
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    
    public function getDNI() {
    return $this->dni;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getMail() {
        return $this->mail;
    }
    public function getTelefono() {
        return $this->telefono;
    }
    public function getimporteNeto() {
        return $this->importeNeto;
    }
    public function  setNombre ($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setDNi($dni) {
        $this->dni = $dni;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function setMail($mail) {
        $this->mail = $mail;
    }
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function setImporteNeto($importeNeto) {
        $this->importeNeto = $importeNeto;
    }
    

 public function __toString(){
    return "Nombre: ".$this->getNombre(). "\nApellido: ".$this->getApellido(). "\nDNI: ".$this->getDNI(). "\nDireccion: ". $this->getDireccion(). "\nMail: ". $this->getMail(). "\nTelefono: ". $this->getTelefono(). "\nImporteNeto: ". $this->getimporteNeto();
 }
}
?>

