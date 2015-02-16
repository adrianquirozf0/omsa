<?php
App::uses('AppController', 'Controller');
/**
 * Fixes Controller
 *
 */
class FixesController extends AppController {



	public function index() {
		try {
			$options = [
				"conditions" => [],
			];

			$vehicle_id = $this->request->query("vehicle_id");
			if (strlen($vehicle_id) > 0) {
				$options["conditions"]["Fix.vehicle_id"] = $vehicle_id;
			}

			$result = $this->Fix->find("all", $options);
			return $this->setResponse(200, ["results" =>$result]);
		} catch (Exception $e) {
			return $this->setResponse(500, ["results" =>null]);
		}
	} 
public function view($id) {
		try {
			$result = $this->Fix->read(null,$id);
			return $this->setResponse(200, ["result" =>$result]);
		} catch (Exception $e) {
			return $this->setResponse(500, ["result" =>null]);
		}
	} 

	public function add()
	{
		try {
			if ($this->Fix->save($this->request->data)) {
				$result = $this->Fix->read();
				return $this->setResponse(200, ["result" =>$result]);
			} else {
				return $this->setResponse(400, ["result" =>null, "validationErrors" => $this->Fix->validationErrors]);
			}
		} catch (Exception $e) {
			return $this->setResponse(500, ["result" =>null]);
		}
	}



	public function edit($id)
	{
		try {
			$this->Fix->id=$id;
			if ($this->Fix->save($this->request->data)) {
				$result = $this->Fix->read();
				return $this->setResponse(200, ["result" =>$result]);
			} else {
				return $this->setResponse(400, ["result" =>null, "validationErrors" => $this->Fix->validationErrors]);
			}
		} catch (Exception $e) {
			return $this->setResponse(500, ["result" =>null]);
		}
	}

}
