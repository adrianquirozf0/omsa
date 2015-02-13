<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = ["RequestHandler"];

    protected $_keys = [];

    protected function setResponse($code, $response = null, $headers = null) {
        if (!is_array($response)) {
            throw new InvalidArgumentException('Second argument only accepts arrays.');
        }

        $keys = array_keys($response);
        $this->_keys = array_merge($this->_keys, $keys);
        $this->set($response);
        $this->set('_serialize', $this->_keys);

        $this->response->statusCode($code);
        if (is_array($headers)) {
            $this->response->header($this->flatten($headers));
        }
    }
}
