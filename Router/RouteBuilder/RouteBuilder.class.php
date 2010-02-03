<?php

class RouteBuilder {

	private $parameters = array();
	
	private $routes = array();
	
	public function assignController($controller) {
	
		//Create a new route
		$route = new Route;
		$route->setParameters($this->getParameters());
		$route->setController($controller);
		
		$this->addRoute($route);
		
		return $this;
	}
	
	public function __call($methodName, $parameters) {
	
		if (!is_null(
			$key = $this->resolvePositionToArrayKey(
				$this->extractParameterPosition($methodName)))) {
					$this->buildParameters($key, $parameters[0]);
		}
		else {
			//Exception
		}
		
		return $this;
	}
	
	private function buildParameters($key, $value) {
	
		$this->insertParameter($key, $value);
		
		$this->unsetLaterParameters($key);
	}
	
	private function insertParameter($key, $value) {
		$this->parameters[$key] = $value;
	}
	
	private function unsetLaterParameters($key) {
	
		for (
			;
			$key <=
				count($this->parameters) - 1; //The last key of parameters array
			$key++) {
				unset($this->parameters[$key]);
		}
	}
	
	private function extractParameterPosition($methodName) {
	
		return substr(
			$methodName,
			2, //Start after If
			strlen($methodName)
				- 2 //Two characters for If
				- 9 //Nine charachers for Parameter
				- 6 //Six characters for Equeals
				- 2 //Two characters for To
		);
	}
	
	private function resolvePositionToArrayKey($position) {
	
		$resolve = array(
			'First'		=> 0,
			'Second'	=> 1,
			'Third'		=> 2,
		);
		
		return $resolve[$position];
	}
	
	private function getParameters() {
		return $this->parameters;
	}
	
	private function addRoute($route) {
		$this->routes[] = $route;
	}
	
	public function getRoutes() {
		return $this->routes;
	}
}

?>