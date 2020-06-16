<?php	

	class manejadorSesiones{

		
		public static function start(){
			if(!session_id()){	//session_id devuelve un string vacio si no hay ninguna sesión iniciada,se toma como falso 
				session_start();
			}
		}

		public function set($key,$value){	//set pone en la posicion $key del arreglo $_SESSION el valor $value
			$_SESSION[$key]=$value;
		}

		public function get($key){ 		//get verifica si esta seteado algun valor en la posicion $key del arreglo $_SESSION 
			if(isset($_SESSION[$key])){ //si esta seteado lo devuelvo sino devuelvo falso
				return $_SESSION[$key];
			}else{
				return false;
			}
		}
		public function manejadorSesiones(){ //este es un constructor de manejador de sesiones, si no hay nada dentro de $_SESSION
			if(! $this->get('ESTADO')){		 // en la posicion 'estado', lo setea como no logeado	
			$this->set('ESTADO','NO LOGUEADO');
			}
		}

		protected function existe($eMail){		//verifica que haya un usuario registrado con ese nombre
			$conexion = mysqli_connect('localhost','root','','bookflix');	//si lo hay , devuelve su tabla
			$consulta="SELECT * FROM usuario WHERE borradoLogico = 0 AND emailUsuario = '" . $eMail . "' "; //sino devuelve falso
			$result = mysqli_query($conexion,$consulta);						
			if (mysqli_num_rows($result) == 1){
				return $result;
			}else{			
				return false;
			}
		}

		public function estado(){	//devuelve el estado de la session
			$this->start();
			return $this->get('ESTADO');
		}
		
		public function modificarSesion($email,$uName){	//
			$this->set('EMAIL',$email);							
			$this->set('NOMBRE',$uName);
		}

		public function iniciarSesion($eMail,$uPass){
			try{
			//	if( empty($eMail) || empty($uPass) ){//si el nombre de usuario o la contra esta vacia,sale una excepcion
				//	$error="el campo Usuario o el campo contraseña esta vacio";
					//throw new Exception($error);
					//}else{//si el nombre de usuario o la contra tienen conenido , consulto a la base de datos por el usuario
						$this->set('PERMISO',false);
						if ( $result=( $this->existe($eMail) ) ){//si existe el usuario
							$row = mysqli_fetch_array($result);
							if ($uPass == $row ['password']){//pregunto si la contraseña ingresada coincide con la del usuario
								$this->start();
								$this->set('ID',$row['id']);
								$this->set('EMAIL',$row['emailUsuario']);
								$this->set('NOMBRE',$row['nombreUsuario']);	
								$this->set('PERMISO',$row['permisoUsuario']);
								$this->set('PASS',$row['password']);							
								$this->set('ESTADO','LOGUEADO');
								return true; //si coincide la contraseña ,devuelvo cargado el usuario en la variable $_SESSION;
								}else{ // si no coincide sale una excepcion
									$msg="la constrasenia es invalida";
									$error="?ERROR=$msg&mail=$eMail";
									throw new Exception($error);
								}						
							}else{//si no se encontro ningun resultado para el usuario , sale esta excepcion
								$error=4;
								$_SESSION["PERMISO"]=4;
								throw new Exception($error);
							}
					//}
			}
			catch(Exception $e){//ante cualquier error, sale el mensaje de error y retorna falso
				$this->set('ERROR',$e->getMessage());
				return false;
			}
		}



		public function desconectarse(){	//destruye la sesion actual
			$this->start();
			session_destroy();
			
		}

		
		public function autorizado(){		//habilita a un usuario a ver cierto tipo de elementos
			$this->start();
			if( $_SESSION['ESTADO'] != 'LOGUEADO' ){
				return 0;
			}else{
				return $this->get('PERMISO');
			}
		}
		




	}

?>