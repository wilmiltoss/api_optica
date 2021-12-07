<?php
class Categoria extends Mysql{
	protected $tableName	= "categoria";
	protected $primaryKey = "idcategoria";
	protected $fields	= array(
		"idcategoria"	=> array("type" => "int", "required" => "0", "validation" => "none"),
		"nombre"	=> array("type" => "varchar", "length"=> 120, "required" => "0", "validation" => "none"),
		"descripcion"	=> array("type" => "varchar", "length"=> 10, "required" => "0", "validation" => "none"),
		"portada"	=> array("type" => "varchar",	"length"=> 100, "required" => "0", "validation" => "none"),
		"datecreated"	=> array("type" => "datetime",	"length"=> 100, "required" => "0", "validation" => "none"),
		"ruta"	=> array("type" => "varchar",	"length"=> 255, "required" => "0", "validation" => "none"),
		"status"	=> array("type" => "int", "length"=> 11,"required" => "0", "validation" => "none"),
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