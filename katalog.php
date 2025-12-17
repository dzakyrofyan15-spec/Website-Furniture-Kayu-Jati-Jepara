<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mebel_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $data['products'] = $this->Mebel_model->get_all_products();
        $data['categories'] = $this->Mebel_model->get_all_categories();
        $this->load->view('katalog_view', $data);
    }

    public function detail($id_produk) {
        $data['product'] = $this->Mebel_model->get_product_detail($id_produk);
        
        if (empty($data['product'])) {
            show_404();
        }
        
        $this->load->view('detail_produk_view', $data);
    }

    public function tentang_kami() {
        $this->load->view('tentang_kami_view'); 
    }
}