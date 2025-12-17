<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mebel_model extends CI_Model {

    // --- FUNGSI PRODUK (Katalog & CRUD) ---

    public function get_all_products() {
        $this->db->select('p.*, c.nama_kategori');
        $this->db->from('products p');
        $this->db->join('categories c', 'c.id_kategori = p.id_kategori', 'left'); 
        $this->db->order_by('p.id_produk', 'DESC');
        $query = $this->db->get();
        return $query ? $query->result_array() : []; 
    }

    public function get_all_categories() {
        $query = $this->db->get('categories');
        return $query ? $query->result_array() : [];
    }

    public function get_product_detail($id_produk) {
        $this->db->select('p.*, c.nama_kategori');
        $this->db->from('products p');
        $this->db->join('categories c', 'c.id_kategori = p.id_kategori', 'left');
        $this->db->where('p.id_produk', $id_produk);
        $query = $this->db->get();
        return $query ? $query->row_array() : NULL;
    }

    public function insert_product($data) {
        return $this->db->insert('products', $data);
    }

    public function update_product($id_produk, $data) {
        $this->db->where('id_produk', $id_produk);
        return $this->db->update('products', $data);
    }

    public function delete_product($id_produk) {
        $product = $this->get_product_detail($id_produk);
        // Hapus file gambar jika ada
        if ($product && file_exists('./assets/img/' . $product['gambar_utama'])) {
            unlink('./assets/img/' . $product['gambar_utama']); 
        }
        $this->db->where('id_produk', $id_produk);
        return $this->db->delete('products');
    }

    // --- FUNGSI USER/AUTH ---

    public function cek_login($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query ? $query->row_array() : NULL;
    }
}