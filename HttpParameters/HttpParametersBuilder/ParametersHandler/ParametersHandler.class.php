<?php

abstract class ParametersHandler {

	private $nextParametersHandler;
	
	private $parameters = array();
	
	public function __construnct($nextParametersHandler = null) {
	
		if (!empty($nextParametersHandler)
			&& ($nextParametersHandler instanceof ParameterHandler)) {
				$this->nextParametersHandler = $nextParametersHandler;
		}
	}
	
	protected function getNextParameterHandler() {
		return $this->nextParameterHandler;
	}
	
	protected function gotNextParameterHandler() {
	
		if (!empty($this->nextParameterHandler)) {
			return TRUE;
		}
		
		return FALSE;
	}
	
	protected function getParameters() {
		return $this->parameters;
	}
	
	protected function gotParameter($name) {
	
		if (!empty($this->parameters[$name])) {
			return TRUE;
		}
		
		return FALSE;
	}
	
	protected function setParameter($name, $value) {
		$this->parameters[$name] = $value;
	}
	
	protected function setParameters($parameters) {
		$this->parameters = $parameters;
	}
	
	protected function addParameterNewOnly($name, $value) {
	
		if (!$this->gotParameter($name)) {
			$this->setParameter($name, $value);
		}
	}
	
	protected function addParametersNewOnly($parameters) {
		
		if (!empty($parameters) && is_array($parameters)) {
		
			foreach ($parameters as $name => $value) {
				$this->addParameterNewOnly($name, $value);
			}
		}
	}
	
	abstract public function addParameters();
}

?>