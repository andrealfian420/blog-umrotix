<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_temp_Model extends CI_Model
{
    public function insertKategori($data)
    {
        $this->db->insert('kategori_temp', $data);
    }

    public function getKategori()
    {
        return $this->db->get('kategori_temp')->result_array();
    }

    public function insertArtikel()
    {
        $this->load->helper('text');

        $data = [
            'nama_artikel' => $this->input->post('nama_artikel'),
            'slug' => strtolower(url_title($this->input->post('nama_artikel'))),
            'artikel_short' => $this->input->post('artikel_short'),
            'artikel_text' => $this->input->post('artikel_text'),
            'image' => $this->_uploadImage(),
            'created_at' => date('Y-m-d'),
            'author' => $this->input->post('author'),
            'kategori_id' => $this->input->post('kategori_id'),
        ];

        $this->db->insert('post_temp', $data);
    }

    public function getNewestArticle()
    {
        return $this->db->order_by('id', 'DESC')->limit(1)->get('post_temp')->row_array();
    }

    public function getMiddleArticle()
    {
        return $this->db->order_by('id', 'DESC')->limit(3)->get('post_temp')->result_array();
    }

    public function getOldArticle()
    {
        return $this->db->limit(5)->get('post_temp')->result_array();
    }

    public function getLowerArticle()
    {
        return $this->db->order_by('id', 'ASC')->limit(2)->get('post_temp')->result_array();
    }

    public function getPopularArticle()
    {
        return $this->db->order_by('view_count', 'DESC')->limit(6)->get('post_temp')->result_array();
    }

    public function getRelatedArticle($id)
    {
        $query = "SELECT * FROM post_temp WHERE id <> ? ORDER BY id DESC LIMIT 3";

        return $this->db->query($query, $id)->result_array();
    }

    public function getArticleBySlug($slug)
    {
        return $this->db->get_where('post_temp', ['slug' => $slug])->row_array();
    }

    public function addViewersNumber($id)
    {
        $view_before = $this->db->get_where('post_temp', ['id' => $id])->row_array();

        $this->db->where('id', $id);
        $this->db->update('post_temp', ['view_count' => $view_before['view_count'] + 1]);
    }

    private function _uploadImage()
    {
        $this->load->library('image_lib');

        $config['upload_path']          = './assets/content-img/';
        $config['allowed_types']        = 'jpg|png';
        $config['encrypt_name']         = true;
        $config['overwrite']            = true;
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $image = $this->upload->data();

            $config_image = [
                'image_library' => 'gd2',
                'source_image' => $image['full_path'],
                'maintain_ratio' => true,
                'width' => 730,
                'height' => 441
            ];

            $this->image_lib->clear();
            $this->image_lib->initialize($config_image);
            $this->image_lib->resize();

            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('uploadFailed', $this->upload->display_errors());
            return redirect('posting_temp/artikel');
            die;
        }
    }
}
