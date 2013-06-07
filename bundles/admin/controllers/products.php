<?php
use Admin\Libraries\Notify;
use Admin\Models\Category;
use Admin\Models\Product;

class Admin_Products_Controller extends Admin_Base_Controller{

	public function __construct(){
		parent::__construct();

		$this->tabs(array(
			array(__('admin::title.products'), \Laravel\URL::to_action('admin@products')),
			array(__('admin::title.add'), \Laravel\URL::to_action('admin@products@add'))
		));
	}

	public function get_index(){
		// Get products list
		$products = Product::with('category')->order_by('name')->get();

		$this->layout->title = __('Admin::title.products');
		$this->layout->nest('content', 'Admin::products.index', array(
			'products' => $products
		));
	}

	/**
	 * Admin/Products::get_add()
	 * display the add product form
	 * @return \Laravel\Redirect
	 */
	public function get_add(){
		// retrieve array list of categories for drop down list
		$categories = Category::getList();
		if( empty($categories) ){
			return Notify::set('error', 'categoryrequired', \Laravel\URL::to_action('admin@categories@add'));
		}

		// render and display template
		$this->layout->title = __('Admin::title.addproduct');
		$this->layout->nest('content', 'admin::products.add', array(
			'categories' => $categories
		));
	}

	/**
	 * Admin/Products::post_add()
	 * handle form submission from add form
	 *
	 * @return \Laravel\Redirect
	 */
	public function post_add(){
		$rules = array('name' => 'required');
		$validator = new \Laravel\Validator(Input::all(), $rules);

		if( $validator->fails() ){
			return Notify::set('error', array('isrequired', array('field' => 'Product name')), \Laravel\URL::to_action('admin@products@add'));
		}

		// Add new product to the database
		Product::insert(Input::all());

		// Notify user of success and redirect back to products list
		return Notify::set('success', 'productadded', \Laravel\URL::to_action('admin@products'));
	}

	public function get_edit($id = 0){
		if( empty($id) ){
			return Notify::set('error', 'invalidid', \Laravel\URL::to_action('admin@products'));
		}

		// retrieve product from database
		$product = Product::find($id);
		if( empty($product) ){
			return Notify::set('error', 'noproductfound', \Laravel\URL::to_action('admin@products'));
		}

		// retrieve an array based list of categories for the drop down list
		$categories = Category::getList();

		$this->layout->title = __('admin::title.editproduct', array('name' => $product->name));
		$this->layout->nest('content', 'admin::products.edit', array(
			'product' => $product,
			'categories' => $categories
		));
	}

	public function post_edit($id = 0){
		if( empty($id) ){
			return Notify::set('error', 'invalidid', \Laravel\URL::to_action('admin@products'));
		}

		$rules = array('name' => 'required');
		$validator = new \Laravel\Validator(Input::all(), $rules);

		if( $validator->fails() ){
			return Notify::set('error', array('isrequired', array('field' => 'Product name')), \Laravel\URL::to_action('admin@products@edit', array($id)));
		}

		Product::update($id, Input::all());

		return Notify::set('success', 'productupdated', \Laravel\URL::to_action('admin@products'));
	}
}