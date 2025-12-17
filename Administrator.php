<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mebel_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url')); // Memastikan helper dimuat
        
        // Cek login dan level
        if ($this->session->userdata('status') != 'login' || $this->session->userdata('level') != 'admin') {
            redirect(base_url('login'));
        }
    }

    public function index() {
        $data['products'] = $this->Mebel_model->get_all_products();
        $this->load->view('admin/dashboard_view', $data);
    }

    // --- FUNGSI TAMBAH PRODUK ---

    public function add() {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        $data['categories'] = $this->Mebel_model->get_all_categories();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/add_product_view', $data);
        } else {
            // Konfigurasi Upload Gambar
            $config['upload_path']   = './assets/img/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 5000; // 5MB
            $config['encrypt_name']  = TRUE; // Ganti nama file agar unik

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar_utama')) {
                // Jika upload gagal atau tidak ada file
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="alert-error">Gagal Upload: ' . strip_tags($error['error']) . '</div>');
                $this->load->view('admin/add_product_view', $data);
            } else {
                // Jika upload berhasil
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                
                $product_data = array(
                    'nama_produk' => $this->input->post('nama_produk'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'deskripsi'   => $this->input->post('deskripsi'),
                    'gambar_utama' => $file_name // Simpan nama file unik ke database
                );

                $this->Mebel_model->insert_product($product_data);
                $this->session->set_flashdata('message', '<div class="alert-success">Produk berhasil ditambahkan!</div>');
                redirect('administrator');
            }
        }
    }

    // --- FUNGSI EDIT PRODUK ---

    public function edit($id_produk) {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        $data['product'] = $this->Mebel_model->get_product_detail($id_produk);
        $data['categories'] = $this->Mebel_model->get_all_categories();

        if (empty($data['product'])) {
            show_404();
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/edit_product_view', $data);
        } else {
            $old_image = $data['product']['gambar_utama'];
            $new_file_name = $old_image;

            // Cek apakah ada file gambar baru yang diupload
            if (!empty($_FILES['gambar_utama']['name'])) {
                $config['upload_path']   = './assets/img/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 5000;
                $config['encrypt_name']  = TRUE;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar_utama')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert-error">Gagal Upload Gambar Baru: ' . strip_tags($error['error']) . '</div>');
                    $this->load->view('admin/edit_product_view', $data);
                    return;
                } else {
                    $upload_data = $this->upload->data();
                    $new_file_name = $upload_data['file_name'];
                    
                    // Hapus gambar lama jika bukan salah satu dari 22 file dummy
                    // NOTE: Hati-hati menghapus file dummy, ini hanya contoh!
                    $dummy_files = array('kursi_jati_minimalis.jpg', 'sofa_katun_premium.jpg', /* ... file dummy lainnya ... */); 
                    if (!in_array($old_image, $dummy_files) && file_exists('./assets/img/' . $old_image)) {
                        unlink('./assets/img/' . $old_image);
                    }
                }
            }

            $product_data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'id_kategori' => $this->input->post('id_kategori'),
                'deskripsi'   => $this->input->post('deskripsi'),
                'gambar_utama' => $new_file_name
            );

            $this->Mebel_model->update_product($id_produk, $product_data);
            $this->session->set_flashdata('message', '<div class="alert-success">Produk berhasil diperbarui!</div>');
            redirect('administrator');
        }
    }

    // --- FUNGSI HAPUS PRODUK ---

    public function delete($id_produk) {
        $product = $this->Mebel_model->get_product_detail($id_produk);

        if ($product) {
            $file_name = $product['gambar_utama'];
            
            // Hapus file fisik (jika ada)
            // NOTE: Sekali lagi, hati-hati jika ini file dummy!
            $dummy_files = array('kursi_jati_minimalis.jpg', 'sofa_katun_premium.jpg', /* ... file dummy lainnya ... */); 
            if (!in_array($file_name, $dummy_files) && file_exists('./assets/img/' . $file_name)) {
                unlink('./assets/img/' . $file_name);
            }

            $this->Mebel_model->delete_product($id_produk);
            $this->session->set_flashdata('message', '<div class="alert-success">Produk berhasil dihapus!</div>');
        }
        redirect('administrator');
    }

    // --- FUNGSI UPDATE DESKRIPSI PRODUK ---
    
    public function update_descriptions() {
        $products = $this->Mebel_model->get_all_products();
        $updated_count = 0;
        
        foreach ($products as $product) {
            $nama_produk = $product['nama_produk'];
            $kategori = $product['nama_kategori'];
            
            // Generate deskripsi yang sesuai dengan nama produk
            $deskripsi = $this->generate_description($nama_produk, $kategori);
            
            // Update produk dengan deskripsi baru
            $this->Mebel_model->update_product($product['id_produk'], array(
                'deskripsi' => $deskripsi
            ));
            $updated_count++;
        }
        
        $this->session->set_flashdata('message', '<div class="alert-success">' . $updated_count . ' deskripsi produk berhasil diperbarui!</div>');
        redirect('administrator');
    }
    
    private function generate_description($nama_produk, $kategori) {
        $templates = array(
            'kursi' => "Hadirkan kenyamanan dan keeleganan dengan %s kami. Didesain dengan ergonomis untuk memberikan kenyamanan maksimal saat duduk. Dibuat dari material berkualitas tinggi dengan finishing premium. Cocok untuk melengkapi ruang tamu, ruang kerja, atau area makan Anda. Tersedia dalam berbagai pilihan warna yang dapat disesuaikan dengan interior ruangan Anda.",
            
            'meja' => "Tingkatkan estetika ruangan Anda dengan %s yang menawan. Dibuat dengan presisi tinggi dari bahan pilihan untuk memberikan tampilan elegan dan tahan lama. Permukaan yang halus dan kokoh, ideal untuk berbagai keperluan harian. Sentuhan modern yang sempurna untuk ruang kerja, ruang makan, atau ruang tamu Anda.",
            
            'lemari' => "Maksimalkan penyimpanan Anda dengan %s yang fungsional dan stylish. Dirancang dengan ruang penyimpanan yang luas dan rak yang dapat disesuaikan. Material premium dengan finishing yang tahan lama dan mudah dibersihkan. Menambah kesan rapi dan terorganisir pada interior rumah Anda.",
            
            'rak' => "Tampilkan koleksi favorit Anda dengan %s yang elegan. Desain modern dengan struktur kokoh untuk menampung berbagai barang. Ideal untuk buku, dekorasi, atau koleksi pribadi Anda. Mudah dipasang dan menambah nilai estetika ruangan.",
            
            'sofa' => "Nikmati kenyamanan superior dengan %s kami. Bantalan empuk berkualitas tinggi dengan busa premium untuk duduk yang nyaman sepanjang hari. Dilapis dengan kain atau kulit pilihan yang tahan lama dan mudah dibersihkan. Desain kontemporer yang menyempurnakan ruang tamu Anda.",
            'default' => "Lengkapi rumah Anda dengan %s berkualitas premium dari MEBELISA. Dibuat dengan keahlian tukang kayu profesional menggunakan material terbaik. Desain yang timeless dan finishing yang sempurna untuk memberikan kesan mewah pada ruangan Anda. Produk ini menggabungkan fungsionalitas dengan estetika untuk memenuhi kebutuhan hunian modern."
        );
        $template = $templates['default'];
        $nama_lower = strtolower($nama_produk . ' ' . $kategori);
        
        foreach ($templates as $key => $value) {
            if ($key != 'default' && strpos($nama_lower, $key) !== false) {
                $template = $value;
                break;
            }
        }
        
        return sprintf($template, $nama_produk);
    }
}