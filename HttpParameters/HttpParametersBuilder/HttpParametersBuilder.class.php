<?php

class HttpParametersBuilder {

	private $httpParameters;
	
	public function __construnct() {
	
		unset($_REQUEST);
		
		$builder = 
			new CookieParametersHandler(
				new GetParametersHandler(
					new PostParametersHandler(
						new FilesParametersHandler
		)));
		
		$this->setHttpParameters($builder->addParameters());
	}
	
	private setHttpParameters($httpParameters) {
		$this->httpParameters = $httpParameters;
	}
	
	public function getHttpParameters() {
		return $this->httpParameters;
	}
}

?>