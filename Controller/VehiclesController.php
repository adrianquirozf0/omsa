<?php
App::uses('AppController', 'Controller');
/**
 * Vehicles Controller
 *
 */
class VehiclesController extends AppController {


	public function index() {
		try {
			$options = [
				"conditions" => [],
			];

			$name = $this->request->query("name");
			if (strlen($name) > 0) {
				$options["conditions"]["Vehicle.name LIKE"] = "%" . $name . "%";
			}

			$result = $this->Vehicle->find("all", $options);
			return $this->setResponse(200, ["results" =>$result]);
		} catch (Exception $e) {
			return $this->setResponse(500, ["results" =>null]);
		}
	} 

	public function view($id) {
		try {
			$result = $this->Vehicle->read(null,$id);
			return $this->setResponse(200, ["result" =>$result]);
		} catch (Exception $e) {
			return $this->setResponse(500, ["result" =>null]);
		}
	} 

	public function add()
	{
		try {
			if ($this->Vehicle->save($this->request->data)) {
				$result = $this->Vehicle->read();
				return $this->setResponse(200, ["result" =>$result]);
			} else {
				return $this->setResponse(400, ["result" =>null, "validationErrors" => $this->Vehicle->validationErrors]);
			}
		} catch (Exception $e) {
			return $this->setResponse(500, ["result" =>null]);
		}
	}

	public function edit($id)
	{
		try {
			$this->Vehicle->id=$id;
			if ($this->Vehicle->save($this->request->data)) {
				$result = $this->Vehicle->read();
				return $this->setResponse(200, ["result" =>$result]);
			} else {
				return $this->setResponse(400, ["result" =>null, "validationErrors" => $this->Vehicle->validationErrors]);
			}
		} catch (Exception $e) {
			return $this->setResponse(500, ["result" =>null]);
		}
	}
}
