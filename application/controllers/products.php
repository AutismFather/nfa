<?php
class Products_Controller extends Base_Controller {

    public function action_index($id = 0){
        if( empty($id) ){
            // Pagination
            $per_page = Input::get('limit', 20);
            $products = Product::order_by('name', 'asc')->paginate($per_page);

            $this->layout->title = 'Products';
            $this->layout->nest('content', 'products.list', array(
                'products' => $products
            ));
        }
        else {
            // Retrieve product's details
            $product = Product::find($id);

            $this->layout->title = 'Product Details - ' . $product->name;
            $this->layout->nest('content', 'products.index', array(
                'product' => $product
            ));
        }
    }

    public function action_list(){
        $this->layout->title = 'Products';
        $this->layout->nest('content', 'products.index', array(
            'products' => Product::getList()
        ));
    }
}