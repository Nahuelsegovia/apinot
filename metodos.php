<?php 

class Publicacion{
    public $titulo;
    public $contenido;
    public $imagen;
    public $fecha;
    public $mysqli;

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
        $crearPublicacion = $mysqli->prepare("INSERT INTO publicacion(titulo, contenido, imagen, fecha, id_usuario, id) VALUES(?, ?, ?, ?, 1, id)");
        $crearPublicacion->bind_param("ssss", $titulo, $contenido, $imagen, $fecha);
        $crearPublicacion->execute();
        $dataJson = array(
            "titulo" => $titulo,
            "contenido" => $contenido,
            "imagen" => $imagen,
            "fecha" => $fecha,
            );
        
        echo json_encode($dataJson, JSON_UNESCAPED_UNICODE);
    }

    public function verPublicaciones(){
        $titulo = $this->titulo;
        $contenido = $this->contenido;
        $imagen = $this->imagen;
        $fecha = $this->fecha;
        $mysqli = $this->mysqli;
        $publicaciones = $mysqli->query("SELECT * FROM publicacion");
        while($publicacion = $publicaciones->fetch_assoc()){
            $dataJson = array();
            $dataJson = $publicacion;
            echo json_encode($dataJson, JSON_UNESCAPED_UNICODE); //Devuelve json y decodifica utf-8
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
        $crearUsuario = $mysqli->prepare(" INSERT INTO usuarios(nombre, apellido, correo, clave, id) VALUES(?, ?, ?, ?, id)");
        $crearUsuario->bind_param("ssss", $nombre, $apellido, $correo, $clave);
        $crearUsuario->execute();
        $dataJson = array(
            "nombre" => $nombre,
            "apellido" => $apellido,
            "correo" => $correo,
            "clave" => $clave,
            );
        
        echo json_encode($dataJson, JSON_UNESCAPED_UNICODE);
    }

    public function verUsuarios(){
        $mysqli = $this->mysqli;
        $usuarios = $mysqli->query("SELECT * FROM usuarios");
        while($usuario = $usuarios->fetch_assoc()){
            $array = array();
            $array = $usuario;
            echo json_encode($array,JSON_UNESCAPED_UNICODE); //Devuelve json y decodifica utf-8
        }
    }

    public function comprobarUsuario($correo, $clave){
        $mysqli = $this->mysqli;
        $comprobarUsuario = $mysqli->prepare("SELECT * FROM usuarios WHERE correo = ? or clave = ?");
        $comprobarUsuario->bind_param('ss', $correo, $clave);
        $comprobarUsuario->execute();
        $resultado = $comprobarUsuario->get_result();
        $trueOrFalse;
        while($user = $resultado->fetch_assoc()){
        if($correo === $user['correo'] && $clave === $user['clave']){
            $trueOrFalse = 1;
            }
        else {$trueOrFalse = 0;}
        }

        if($trueOrFalse === 1){
            session_start();
            $_SESSION['permiso']  = 'administrador';
            //session_destroy();
            echo 'Bienvenido';
        }

        else {
            echo 'No tienes permiso';
        }
    }
}


?>