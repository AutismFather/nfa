<?php
use Admin\Libraries\Notify;
use Admin\Models\User;
use Admin\Models\User_Groups;
use Laravel\URL;
use Laravel\Validator;

/**
 * Class Admin_Users_Controller
 */
class Admin_Usergroups_Controller extends Admin_Base_Controller {

	public function __construct(){
		parent::__construct();

		// Create tabs for this page
		$this->tabs(array(
			array(__('Admin::title.users'), URL::to_action('admin@users')),
			array(__('Admin::title.usergroups'), URL::to_action('admin@usergroups')),
			array(__('Admin::title.add'), URL::to_action('admin@usergroups@add'))
		));
	}

	/**
	 * Admin/User_Groups::get_index()
	 */
	public function get_index(){
		// Retrieve list of groups from the database
		$groups = User_Groups::order_by('name')->get();

		$this->layout->title = __('Admin::title.usergroups');
		$this->layout->nest('content', 'admin::user_groups.index', array(
			'groups' => $groups
		));
	}

	public function get_add(){
		$this->layout->title = __('Admin::title.addusergroup');
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
		$rules = array('name' => array('required'));
		$validator = Validator::make(Input::all(), $rules);

		// Failed validation?
		if( $validator->fails() ){
			Session::flash('error', 'Invalid Input');
			return Redirect::to(URL::to('/admin/usergroups/add'));
		}
		// Passed validation
		else {
			User_Groups::insert(array('name' => Input::get('name')));

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
			return Notify::set('error', 'invalidid', URL::to_action('admin@usergroups'));
		}

		// retrieve group
		$group = User_Groups::find($id);
		if( empty($group) ){
			return Notify::set('error', 'nogroupfound', URL::to_action('admin@usergroups'));
		}

		$this->layout->title = __('Admin::title.editusergroup', array('name' => $group->name));;
		$this->layout->nest('content', 'admin::user_groups.edit', array(
			'group' => $group
		));
	}

	/**
	 * Admin/Usergroups::post_edit($id)
	 * Handle form submission on user group edit
	 *
	 * @param int $id
	 * @return mixed
	 */
	public function post_edit($id = 0){
		if( empty($id) ){
			Session::flash('error', 'ID required');
			return Redirect::to(URL::to_action('admin@usergroups'));
		}

		// Set rules and validate input
		$rules = array(
			'name' => array('required', 'unique:user_groups,name,'.$id)
		);
		$validator = Validator::make(Input::all(), $rules);

		// If form submission fails, go back to edit
		if( $validator->fails() ){
			Session::flash('error', 'Invalid Input');
			return Redirect::to(URL::to_action('admin@usergroups@edit@' . $id));
		}

		// If validator does not fail
		User_Groups::where('id', '=', $id)->update(array('name' => Input::get('name')));
		return Notify::set('success', 'usergroupsedit', URL::to_action('admin@usergroups'));
	}

	/**
	 * Admin/usergroups::get_delete($id)
	 * removes a usergroup from the database
	 *
	 * @param int $id
	 * @return mixed
	 */
	public function get_delete($id = 0){
		if( empty($id) ){
			Notify::set('error', 'invalidid', URL::to_action('admin@usergroups'));
		}

		// Get the group to ensure it exists and for the notification
		$group = User_Groups::find($id);
		if( empty($group) ){
			return Notify::set('error', 'nogroupfound', URL::to_action('admin@usergroups'));
		}

		// delete the usergroup
		User_Groups::where('id', '=', $id)->delete();

		return Notify::set('success', array('groupdeleted', array('name' => $group->name)), URL::to_action('admin@usergroups'));
	}
}