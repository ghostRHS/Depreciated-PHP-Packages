<?php

class HttpRequest {

	private $requestParameters = array();
	
	public function __construct() {
		$this->buildRequestParameters();
	}
	
	public function getRequestParameter($name) {
		return $this->requestParameters[$name];
	}
	
	private function buildRequestParameters() {
	
		$requestBuilder = new RequestBuilder;
		
		$this->setRequestParameters($requestBuilder->getRequestParameters());
	}
	
	private function setRequestParameters($requestParameters) {
		$this->requestParameters = $requestParameters;
	}
	
	public function getFileName($name) {
		return $this->requestParameter[$name][name];
	}
	
	public function getFileSize($name) {
		return $this->requestParameter[$name][size];
	}
	
	public function getFileError($name) {
		return $this->requestParameter[$name][error];
	}
	
	public function getFileType($name) {
		return $this->requestParameter[$name][type];
	}
	
	public function getFileTmpName($name) {
		return $this->requestParameter[$name][tmp_name];
	}
}

?>