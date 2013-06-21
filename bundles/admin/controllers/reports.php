<?php

class Admin_Reports_Controller extends Admin_Base_Controller {

    public function __construct(){
        parent::__construct();

    $this->tabs( array(
        array('Customer Orders', '#'),
        array('Taxable Sales', '#'),
        array('Non-Taxable Sales', '#'),
        array('Products Ordered', '#'),
        array('Dealer Sales', '#'),
        array('End of Day', '#'),
        array('Shipping Charges', '#'),
        array('FFLLocate Data', '#')
    ));

}

    public function get_index(){
        $this->layout->title = 'Reports';
        $this->layout->nest('content', 'admin::reports.index');
    }

    public function get_add(){
        $this->layout->title = 'Add Report';
        $this->layout->nest('content', 'admin::reports.add');
    }
}
?>