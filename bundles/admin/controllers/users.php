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
		Asset::container('footer')->add('datatables', 'js/jquery.dataTables.min.js');
        $userList = User::order_by('username')->get();

		$this->layout->title = 'Users';
		$this->layout->nest('content', 'admin::users.index', array(
			'userList' => $userList
		));
		//return View::make('admin::users.index')->with('userList', $userList);
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