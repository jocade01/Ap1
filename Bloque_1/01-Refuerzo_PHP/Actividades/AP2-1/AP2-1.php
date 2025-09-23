<?php

class VehiculoCarrera {
    protected $marca;
    protected $modelo;
    protected $velocidad;
    protected $combustible;

    public function __construct($marca, $modelo, $velocidad, $combustible){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->combustible = $combustible;
    }
    public function __destruct()
    {
    echo "el coche se ha pirado de la carrera <br>";
    }

    public function getMarca(){
        return $this->marca;
    }
    public function getModelo()
    {
        return $this->modelo;

    }

    public function getVelocidad()
    {
        return $this->velocidad;
    }
    public function getCombustible(){
        return $this->combustible;
    }


    protected function consumirCombustible(){
        if($this->velocidad > 0){
            $this->combustible = ($this->velocidad / 50)*2 - $this->combustible;
        }
    }
    public function mostrarProtected()
    {
        return $this->consumirCombustible();

    }
    public function arrancar()
    {
        if($this->velocidad === 0) {
            $this->velocidad = $this->velocidad + 1;
        }
    }
        public function acelerar(){
        $this->velocidad = $this->velocidad + 1;
    }

    public function detener(){
        $this->velocidad = 0;
    }
    public function mostrarEstado(){
        echo "Marca: " . $this->marca . " , Modelo: " . $this->modelo . " , Velocidad: " . $this->velocidad . " , Combustible: " . $this->combustible . "<br>";

    }

}
class CocheF1 extends VehiculoCarrera{
    public $alerones;

    public function __construct($marca, $modelo, $velocidad, $combustible, $alerones)
    {
        parent::__construct($marca, $modelo, $velocidad, $combustible);
        $this->alerones = TRUE;
    }
    public function activarDRS()
    {
        if($this->alerones = TRUE){
            $this->velocidad = $this->velocidad + $this->velocidad * 0.1;
        }
    }
    public function abrirAleron(){
        $this->alerones = TRUE;
    }
    public function cerrarAleron()
    {
        $this->alerones = FALSE;
    }


}
class CocheElectricoF1 extends VehiculoCarrera{
    public $bateria;
    public function __construct($marca, $modelo, $velocidad, $combustible, $bateria)
    {
        parent::__construct($marca, $modelo, $velocidad, $combustible);
        $this->bateria = $bateria;
    }
    public function recargar(){
        $this->bateria + 1;
    }
}



?>