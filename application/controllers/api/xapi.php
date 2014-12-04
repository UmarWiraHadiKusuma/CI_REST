<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @package		CodeIgniter
* @subpackage	Rest Server
* @category		Controller
* @author 		Phil Sturgeon
* @link 		http://rest.co.uk/code/
*/

require APPPATH.'/libraries/REST_Controller.php';

class Xapi extends REST_Controller
{

	function __construct(){

		parent::__construct();

		$this->methods['user_get']['limit'] = 500;
		$this->methods['user_post']['limit'] = 100;
		$this->methods['user_delete']['limit'] = 50;

	}

	function user_get(){
		if (!$this->get('id')) {
			$this->response(NULL, 400);
		}
 // $user = $this->some_model->getSomething( $this->get('id') );
		$users = array(
			1 => array('id' => 1, 'name' => 'Some Guy', 'email' => 'xapi@xapi.com','fect' => 'Coding'),
			2 => array('id' => 2, 'name' => 'Sama aja', 'email' => 'xapi@xapi.com', 'fact' => 'ini Fach'),
			3 => array('id' => 3, 'name' => 'Selalu', 'email' => 'xapi@xapi.com', 'fact' => 'ini scott', array('hobbies' => array('fartings', 'bikes'))),
			);

		$user = @$users[$this->get('id')];

		if($user){
			$this->response($user, 200);
		}else{
			$this->response(array('error' => 'User tidak ditemukan'), 404);
		}

	}

	function user_post()
	{
//$this->some_model->updateUser( $this->get('id') );
		$message = array('id' => $this->get('id'), 'name' => $this->post('name'), 'email' => $this->post('email'), 'pesan' =>'ADDED!');
		$this->response($message, 200);
	}

	function user_delete()
	{
//$this->some_model->deletesomething( $this->get('id') );
		$message = array('id' => $this->get('id'), 'message' => 'HAPUS');
		$this->response($message, 200);
	}

	function users_get()
	{

	//$users = $this->some_model->getSomething( $this->get('limit') );
		$users = array(
			array('id' => 1, 'name' => 'Umar ', 'email' => 'xapi.com'),
			array('id' => 2, 'name' => 'Sama aja', 'email' => 'xapi.com'),
			3 => array('id' => 3, 'name' => 'Hadi', 'email' => 'xapi.com', 'fact' => array('hobbies' => array('fartings', 'bikes'))),
		);

		if($users)
        {
            $this->response($users, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
        
	}

	public function send_post()
	{
		var_dump($this->request->body);

	}

	public function send_put()
	{
		var_dump($this->put('foo'));

	}
}






