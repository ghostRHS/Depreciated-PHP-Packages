<?php

class Router {

	private $routes = array();
	
	public function _construct(RouteBuilder $builder) {
		$this->setRoutes($builder->getRoutes());
	}
	
	public function addRoute($route) {
		$this->routes[] = $route;
	}
	
	public function findController($parameters) {
	
		foreach ($this->routes as $route) {
		
			if (empty(
				array_diff_assoc( //Computes the differences
					array_slice( //Extracts part of $parameters
						$parameters,
						0, //Beginning of $parameters
						count($route->getParameters())), //No. of parameters in $route->parameters
					$route->getParameters()))) {
						return $route->getController();
			}
		}
	}
	
	public function extractExtraParameters($parameters) {
	
		foreach ($this->routes as $route) {
		
			if (empty(
				array_diff_assoc( //Computes the differences
					array_slice( //Extracts part of $parameters
						$parameters,
						0, //Beginning of $parameters
						$lenght = count($route->getParameters())), //No. of parameters in $route->parameters
					$route->getParameters()))) {
					
						return array_slice(
							$parameters,
							$length - 1 //Begin at the first unmatch parameter
						);
			}
		}
	}
	
	public function findParameters($controller) {
		
		foreach ($this->routes as $route) {
		
			if ($controller === $route->getController()) {
				return $route->getParameters();
			}
		}
	}
	
	private function setRoutes($routes) {
		$this->routes = $routes;
	}
}

?>