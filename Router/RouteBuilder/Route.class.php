<?php

class Route {

	private $parameters = array();
	 
	private $controller;
	 
	public function setParameters($parameters) {
		$this->parameters = $parameters
	}
	 
	public function setController($controller) {
		$this->controller = $controller;
	}
	 
	public function getParameters() {
		return $this->parameters;
	}
	
	public function getController() {
		return $this->controller;
	}
}

?>