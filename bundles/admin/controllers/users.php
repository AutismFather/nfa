<?php
use \Admin\Models\User\Groups;
use \Admin\Models\User;

/**
 * Class Admin_Users_Controller
 */
class Admin_Users_Controller extends Admin_Base_Controller {

	public function __construct(){
		parent::__construct();

		$this->layout->nest('tabs', 'admin::layouts.tabs', array(
			'current' => 'Users',
			'tabs' => array(
				'Users' => URL::to('/admin/users'),
				'Add' => URL::to('/admin/users/add'),
				'User Groups' => URL::to('/admin/usergroups')
			)
		));
	}
	/**
	 *
	 */
	public function get_index(){
		// retrieve list of users
        $userList = User::order_by('username')->get();

		$groups = \Admin\Models\User_Groups::getList();
		// Set title and show user list
		$this->layout->title = 'Users';
		$this->layout->nest('content', 'admin::users.index', array(
			'userList' => $userList
		));
    }


	/**
	 * Display the add users form
	 * @return mixed
	 */
	public function get_add(){
		$this->layout->title = 'Add User';
        $this->layout->nest('content', 'admin::users.add');
    }

	public function get_edit($id = 0){
		// If the person has not entered an id for some reason, redirect back
		if( empty($id) ){
			Session::flash('error', 'Invalid ID');
			return Redirect::to('/admin/users');
		}
		// retrieve database record
		$user = User::find($id);

		// if there was no user found in the db with that id, redirect back
		if( empty($user) ){
			Session::flash('error', 'User not found');
			return Redirect::to('/admin/users');
		}

		// Display template
		$this->layout->title = 'Edit User: ' . $user->username;
		$this->layout->nest('content', 'admin::users.edit', array(
			'user' => $user
		));
	}


	public function get_details($id = 0){
		if( empty($id) ){
			Session::flash('error', 'Invalid ID');
			return Redirect::to('/admin/users');
		}

		$user = User::find($id);

		if( empty($user) ){
			Session::flash('error', 'User not found');
			return Redirect::to('/admin/users');
		}

		$this->layout->title = 'User details: ' . $user->username;
		$this->layout->nest('content', 'admin::users.details', array(
			'user' => $user
		));
	}
}