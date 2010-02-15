<?php

class PostParameterHandler extends ParameterHandler {

	public function addParameters() {
		
		if (!empty($_POST)) {
			$this->setParameters($_POST);
		}
		
		unset($_POST);
		
		if ($this->gotNextParameterHandler()) {
			$this->addParametersNewOnly($this->getNextParameterHandler()->addParameters());
		}
		
		return $this->getParameters();
	}
}

?>