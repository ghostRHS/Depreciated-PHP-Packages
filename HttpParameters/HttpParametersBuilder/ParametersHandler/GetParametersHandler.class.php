<?php

class GetParametersHandler extends ParametersHandler {

	public function addParameters() {
		
		if (!empty($_GET)) {
			$this->setParameters($_GET);
		}
		
		unset($_GET);
		
		if ($this->gotNextParameterHandler()) {
			$this->addParametersNewOnly($this->getNextParameterHandler()->addParameters());
		}
		
		return $this->getParameters();
	}
}

?>