<?php

class Producto
{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * @param mixed $categoria_id
     */
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    /**
     * @return mixed
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * @param mixed $oferta
     */
    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }

    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function getOne()
    {
        $productos = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
        return $productos->fetch_object();//lo devuelvo siendo un objeto usable con fetch
    }

    public function save()
    { //aquí guardo la información del objeto en la bbdd. De momento no pongo la fecha de usuario registrado
        $sql = "INSERT INTO productos VALUES(NULL, {$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, null, CURDATE(), '{$this->getImagen()}' )";
        $save = $this->db->query($sql);

        //Mostrar error en la consulta
        //echo $sql;
        //echo "<br/>";
        //echo $this->db->error;
        //die();

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function edit(){
        $sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}, categoria_id={$this->getCategoria_id()} ";

        if($this->getImagen() != null){
            $sql .= ", imagen='{$this->getImagen()}'";
        }

        $sql .= " WHERE id={$this->id};";

        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM productos WHERE id={$this->id}";
        $delete = $this->db->query($sql);//ejecuto la consulta y guardo

        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }

}