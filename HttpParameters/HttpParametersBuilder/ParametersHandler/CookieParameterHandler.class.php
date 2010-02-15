<?php

class CookieParameterHandler extends ParameterHandler {

	public function addParameters() {
	
		global $_COOKIE;
		
		if (!empty($_COOKIE)) {
			$this->setParameters($_COOKIE);
		}
		
		unset($_COOKIE);
		
		if ($this->gotNextParameterHandler()) {
			$this->addParametersNewOnly($this->getNextParameterHandler()->addParameters());
		}
		
		return $this->getParameters();
	}
}

?>