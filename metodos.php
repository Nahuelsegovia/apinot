<?php 
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    http_response_code(200);
}

else{
    http_response_code(405);
}



class Publicacion{
    private $titulo;
    private $contenido;
    private $imagen;
    private $fecha;
    private $mysqli;

    public function __construct($titulo, $contenido, $imagen, $fecha){
        $this->mysqli = new mysqli('localhost', 'root', 'root', 'apitesting');
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->imagen = $imagen;
        $this->fecha = $fecha;
    }

    public function crearPublicacion(){
        $mysqli = $this->mysqli;
        $titulo = $this->titulo;
        $contenido = $this->contenido;
        $imagen = $this->imagen;
        $fecha = $this->fecha;
        $mysqli->query("INSERT INTO publicacion (titulo, contenido, imagen, fecha, id) VALUES('$titulo', '$contenido', '$imagen', '$fecha', id) ");
    }

    public function verPublicaciones(){
        $mysqli = $this->mysqli;
        $usuarios = $mysqli->query("SELECT * FROM publicacion");
        while($usuario = $usuarios->fetch_assoc()){
            echo $usuario['titulo'];
            echo '<br>';
        }
    }
}

class Usuario{
    public $nombre;
    public $apellido;
    public $correo;
    public $clave;
    public $mysqli;
    
    public function __construct($nombre, $apellido, $correo, $clave){
        $this->mysqli = new mysqli('localhost', 'root', 'root', 'apitesting');
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
    }


    public function crearUsuario(){
        $nombre = $this->nombre;
        $apellido = $this->apellido;
        $correo = $this->correo;
        $clave = $this->clave;
        $mysqli = $this->mysqli;
        $mysqli->query(" INSERT INTO usuarios(nombre, apellido, correo, clave, id) VALUES('$nombre', '$apellido', '$correo', '$clave', id)");
    }

    public function verUsuarios(){
        $mysqli = $this->mysqli;
        $usuarios = $mysqli->query("SELECT * FROM usuarios");
        while($usuario = $usuarios->fetch_assoc()){
            $array = array();
            $array = $usuario;
            echo json_encode($array);
        }
    }

}


?>