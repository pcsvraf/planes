<?php
//creamos una clase de conexión
class Conect_MySql {
    //pasamos parámetros de conexión en un arreglo para más seguridad
    var $obj = array(
        //nombre DB
        "dbname" => "pcspucv_planes",
        //usuario DB
        "dbuser" => "pcspucv_planes",
        //contraseña DB
        "dbpwd" => "pcs2018",
        //nombre del host
        "dbhost" => "localhost"
    );
    // q_id variable que ejecuta consultas
    var $q_id = "";
    // db_conect_id variable que realiza conexión
    var $db_connect_id = "";
    // variable que cuenta las consultas
    var $query_count = 0;

    //función que crea la conexión
    private function connect() {
        $this->db_connect_id = mysqli_connect($this->obj['dbhost'], $this->obj['dbuser'], $this->obj['dbpwd'], $this->obj['dbname']);
        mysqli_set_charset($this->db_connect_id, 'utf8');
        date_default_timezone_set('America/Santiago');
        if (!$this->db_connect_id) {
            echo (" Error no se puede conectar al servidor:" . mysqli_connect_error());
        }
    }

    //función que ejecuta las consultas
    function execute($query) {
        $this->q_id = mysqli_query($this->db_connect_id, $query);
        if (!$this->q_id) {
            $error1 = mysqli_error($this->db_connect_id);
            die("ERROR: error DB.<br> No Se Puede Ejecutar La Consulta:<br> $query <br>MySql Tipo De Error: $error1");
            exit;
        }
        $this->query_count++;
        return $this->q_id;
    }
    
    //función que trae los datos como columnas
    public function fetch_row($q_id = "") {
        if ($q_id == "") {
            $q_id = $this->q_id;
        }
        $result = mysqli_fetch_array($q_id);
        return $result;
    }

    //función que trae el numero de columnas
    public function get_num_rows() {
        return mysqli_num_rows($this->q_id);
    }

    //función que trae las columnas afectadas
    public function get_row_affected() {
        return mysqli_affected_rows($this->db_connect_id);
    }
    
    //funcion que trae el id de lo que se inserto
    public function get_insert_id() {
        return mysqli_insert_id($this->db_connect_id);
    }

    //funcion que trae todos los resultados pero no como columnas
    public function free_result($q_id) {
        if ($q_id == "") {
            $q_id = $this->q_id;
        }
        mysqli_free_result($q_id);
    }

    //función que cierra la conexión
    public function close_db() {
        return mysqli_close($this->db_connect_id);
    }

    //función que trae mas resultados
    public function more_result() {
        return mysqli_more_results($this->db_connect_id);
    }

    //función que trae el resultado siguientw
    public function next_result() {
        return mysqli_next_result($this->db_connect_id);
    }

    //constructor, ejecuta la función conexion
    public function __construct() {
        $this->connect();
    }

}

?>