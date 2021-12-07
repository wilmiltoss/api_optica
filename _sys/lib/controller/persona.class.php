<?php
class Personas extends Mysql{
    protected $tableName    = "persona";
    protected $primaryKey = "idpersona";
    protected $fields   = array(
        "idpersona" => array("type" => "int", "required" => "0", "validation" => "none"),
        "identificacion" => array("type" => "varchar", "length"=> 30,"required" => "0", "validation" => "none"),
        "nombres" => array("type" => "varchar", "length"=> 80, "required" => "1", "validation" => "none"),
        "apellidos" => array("type" => "varchar", "length"=> 80, "required" => "1", "validation" => "none"),
        "telefono" => array("type" => "bigint", "length"=> 20, "required" => "1", "validation" => "none"),
        "email_user" => array("type" => "varchar", "length"=> 100, "required" => "0", "validation" => "none"),
        "password"   => array("type" => "varchar", "length"=> 75, "required" => "0", "validation" => "none"),
        "nit"   => array("type" => "varchar", "length"=> 20, "required" => "0", "validation" => "none"),
        "nombrefiscal"   => array("type" => "varchar", "length"=> 100, "required" => "0", "validation" => "none"),
        "direccionfiscal"   => array("type" => "varchar", "length"=> 100, "required" => "0", "validation" => "none"),
        "token"   => array("type" => "varchar", "length"=> 100, "required" => "0", "validation" => "none"),
        "rolid"   => array("type" => "begin", "length"=> 20, "required" => "0", "validation" => "none"),
        "datecreated"   => array("type" => "datetime", "required" => "0", "validation" => "none"),
        "status"    => array("type" => "int",   "length"=> 11, "required" => "1", "validation" => "none"),
    );

    //todos
    public static function get($where=null,$order=null){
        $obj = new self();
        $whr = $where == null ? "" : "{$where} AND ";
        $ord = $order == null ? "" : " ORDER BY {$order}";
        $sql = "SELECT * FROM " . $obj->tableName . " WHERE {$whr} status = 1 ";
        return $obj->execute($sql);
    }

    
    //por id
        public static function select($id){
        $obj = new self();
        return $obj->find($obj->tableName, $obj->primaryKey, $id, "status = 1");
    }
}
?>
