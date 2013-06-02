<?php
use \Admin\Models\Category;

class Admin_Categories_Controller extends Admin_Base_Controller {

	public function __construct(){
		parent::__construct();

		$this->tabs(array(
			array(__('Admin::title.categories'), URL::to_action('admin@categories')),
			array(__('Admin::title.add'), URL::to_action('admin@categories@add'))
		));
	}

	public function get_index(){
		// Retrieve list of categories from the database
		$categories = Category::order_by('name')->get();

		// Template info
		$this->layout->title = __('Admin::title.categories');
		$this->layout->nest('content', 'Admin::categories.index', array(
			'categoryList' => $categories
		));
	}

	public function get_add(){
		$this->layout->title = __('Admin::title.addcategory');
		$this->layout->nest('content', 'admin::categories.add');
	}

	/**
	 * Admin\Categories::post_add()
	 * Adds category to database
	 *
	 * @return \Laravel\Redirect
	 */
	public function post_add(){
		// rules
		$rules = array('name' => array('required'));
		$validator = \Laravel\Validator::make(Input::all(), $rules);

		if( $validator->fails() ){
			return \Admin\Libraries\Notify::set('error', array('isrequired', array('field' => 'Name')), \Laravel\URL::to_action('admin@categories@add'));
		}

		// Put input vars here so that we can slugify the name cleanly without turning it into a huge mess of code on one lines
		$name = Input::get('name');
		$slug = \Admin\Libraries\Slug::make($name);

		// Add data to database
		Category::insert(array('name' => $name, 'slug' => $slug));

		// Notify and redirect
		return \Admin\Libraries\Notify::set('success', 'categoryadded', \Laravel\URL::to_action('admin@categories'));
	}

	/**
	 * Admin\Categories::get_edit($id)
	 * Display edit form for specified category
	 *
	 * @param int $id
	 * @return \Laravel\Redirect
	 */
	public function get_edit($id = 0){
		// Not id in the param list
		if( empty($id) ){
			return \Admin\Libraries\Notify::set('error', 'invalidid', \Laravel\URL::to_action('admin@categories'));
		}

		// Retrieve category details from the database
		$category = Category::find($id);
		if( empty($category) ){
			return \Admin\Libraries\Notify::set('error', 'nocategoryfound', \Laravel\URL::to_action('admin@categories'));
		}

		$this->layout->title = __('admin::title.editcategory', array('name' => $category->name));
		$this->layout->nest('content', 'admin::categories.edit', array(
			'category' => $category
		));
	}

	public function post_edit($id = 0){

	}
}