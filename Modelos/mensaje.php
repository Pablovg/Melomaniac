<?php 

class Mensaje {

	private $id;
	private $asunto;
	private $mensaje;
	private $fecha;
	private $emisor;
	private $receptor;
	private $grupo;

	public function __construct($id, $asunto, $mensaje, $fecha, $emisor, $receptor, $grupo) {
		$this->id = $id;
		$this->asunto = $asunto;
		$this->mensaje = $mensaje;
		$this->fecha = $fecha;
		$this->emisor = $emisor;
		$this->receptor = $receptor;
		$this->grupo = $grupo;
	}

	public function getId() {
		return $this->id;
	}

	public function getAsunto() {
		return $this->asunto;
	}

	public function getMensaje() {
		return $this->mensaje;
	}

	public function getFecha() {
		return $this->fecha;
	}

	public function getEmisor() {
		return $this->emisor;
	}

	public function getReceptor() {
		return $this->receptor;
	}

	public function getGrupo() {
		return $this->grupo;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setAsunto($asunto) {
		$this->asunto = $asunto; 
	}

	public function setMensaje($mensaje) {
		$this->mensaje = $mensaje;
	}

	public function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	public function setEmisor($emisor) {
		$this->emisor = $emisor;
	}

	public function setReceptor($receptor) {
		$this->receptor = $receptor;
	}

	public function setGrupo($grupo) {
		$this->grupo = $grupo;
	}
}

?>