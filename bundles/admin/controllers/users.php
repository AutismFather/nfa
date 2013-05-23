<?php
use \Admin\Models\User;

/**
 * Class Admin_Users_Controller
 */
class Admin_Users_Controller extends Admin_Base_Controller {

	/**
	 *
	 */
	public function get_index(){
        $searchResult = User::search(array('username' => 'Stuart', 'email' => 'stuart'));
        print_r($searchResult);
        exit;
    }


	/**
	 * Display the add users form
	 * @return mixed
	 */
	public function get_add(){
		$this->layout->title = 'Add User';
        $this->layout->nest('content', 'admin::users.add');
    }
}