<?php
use \Admin\Models\User\Groups;
use \Admin\Models\User;

/**
 * Class Admin_Users_Controller
 */
class Admin_Usergroups_Controller extends Admin_Base_Controller {

	public function __construct(){
		parent::__construct();

		$this->layout->nest('tabs', 'admin::layouts.tabs', array(
			'current' => 'User Groups',
			'tabs' => array(
				'Users' => URL::to('/admin/users'),
				'User Groups' => URL::to('/admin/usergroups'),
				'Add' => URL::to('/admin/usergroups/add')
			)
		));
	}

	public function get_index(){
		$groups = \Admin\Models\User_Groups::getList();

		$this->layout->title = 'User Groups';
		$this->layout->nest('content', 'admin::user_groups.index', array(
			'groups' => $groups
		));
	}

	public function get_add(){
		$this->layout->title = 'Add User Group';
		$this->layout->nest('content', 'admin::user_groups.add', array(

		));
	}

	/**
	 * Admin/Usergroups::post_add()
	 * Handle form input from add form
	 *
	 * @return mixed
	 */
	public function post_add(){
		// rules
		$rules = array('name' => 'required');
		$validator = Validator::make(Input::all(), $rules);

		// Failed validation?
		if( $validator->fails() ){
			Session::flash('error', 'Invalid Input');
			return Redirect::to(URL::to('/admin/usergroups/add'));
		}
		// Passed validation
		else {
			\Admin\Models\User_Groups::insert(array('name' => Input::get('name')));

			Session::flash('success', 'User group successfully added');
			return Redirect::to(URL::to('/admin/usergroups'));
		}
	}

	/**
	 * Admin/Usergroups::get_edit($id)
	 * displays edit form for user group
	 *
	 * @param int $id
	 * @return mixed
	 */
	public function get_edit($id = 0){
		// If no id as a param
		if( empty($id) ){
			Session::flash('error', 'ID required');
			return Redirect::to(URL::to_action('/admin/usergroups'));
		}

		$group = \Admin\Models\User_Groups::find($id);
		if( empty($group) ){
			Session::flash('error', 'No group found');
			return Redirect::to(URL::to_action('/admin/usergroups'));
		}

		$this->layout->title = 'Edit User Group: ' . $group->name;
		$this->layout->nest('content', 'admin::user_groups.edit', array(
			'group' => $group
		));
	}
}