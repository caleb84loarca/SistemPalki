<?php
class UsuarioDatos {
	public static $tablename = "usuario";


	public function UsuarioDatos(){
		
		$this->nombre1 = "$_POST['nombre1']";
		$this->nombre2 = "$_POST['nombre2']";
		$this->apellido1 = "$_POST['apellido1']";
		$this->apellido2 = "$_POST['apellido2']";
		$this->puesto = "$_POST['puesto']";
		$this->contrasena = "$_POST['contrasena']";
		$this->tipo_usario_id_tipousuario = "$_POST['tipousuario']";	
		$this->ubicacion = "$_POST['ubicacion']";
		$this->email = "$_POST['email']";
		$this->telefono = "$_POST['telefono']";	
		$this->fecha_ingreso = "$_POST['fechaingreso']";		
					
	}

	public function add(){
		$sql = "insert into `usuario`('nombre1','nombre2','apellido1','apellido2','puesto','contrasena','telefono','tipo_usario_id_tipousuario','ubicacion','email','telefono','fecha_ingreso')";
		$sql .= "VALUES (\"$this->nombre1\",\"$this->nombre2\",\"$this->apellido1\",\"$this->apellido2\",\"$this->puesto\",\"$this->contrasena\",\"$this->tipo_usario_id_tipousuario\",\"$this->ubicacion\",\"$this->email\",,\"$this->telefono\",,\"$this->fecha_ingreso\")";

		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where idusuario=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where idusuario=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update `".self::$tablename."` set `nombre1`=\"$this->nombre1\", `nombre2`=\"$this->nombre2\", `apellido1`=\"$this->apellido1\", `apellido2`=\"$this->apellido2\", `username`=\"$this->username\", `contrasena`=\"$this->contrasena\", `idtipouser`=\"$this->idtipouser\", where `idusuario`=\"$this->idusuario\"";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set contrasena=\"$this->contrasena\" where idusuario=$this->idusuario";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where idusuario=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

	}

	public static function updateById($id){
		$sql = "update ".self::$tablename." set nombre1=\"$this->nombre1\",nombre2=\"$this->nombre2\",apellido1=\"$this->apellido1\",apellido2=\"$this->apellido2\",username=\"$this->username\",where idusuario=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

	}

	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where email=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre1 like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());

	}

	

}

?>