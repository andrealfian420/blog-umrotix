<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_Model extends CI_Model
{
    public function insertArtikel()
    {
        $this->load->helper('text');

        $data = [
            'nama_artikel' => $this->input->post('nama_artikel'),
            'slug' => strtolower(url_title($this->input->post('nama_artikel'))),
            'artikel_text' => $this->input->post('artikel_text'),
            'image' => $this->_uploadImage(),
            'created_at' => date('Y-m-d'),
            'author_id' => $this->input->post('author_id'),
            'kategori_id' => $this->input->post('kategori_id'),
            'tag' => json_encode($this->input->post('tag[]'))
        ];

        $this->db->insert('artikel', $data);
    }

    public function getArticleByKeyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->like('nama_artikel', $keyword);
        $this->db->or_like('artikel_text', $keyword);
        return $this->db->get()->result_array();
    }

    public function getNewestArticle()
    {
        return $this->db->order_by('id', 'DESC')->limit(1)->get('artikel')->row_array();
    }

    public function getMiddleArticle($mainArticleId)
    {
        $query = "SELECT * FROM artikel WHERE id <> ? ORDER BY id DESC LIMIT 3";

        return $this->db->query($query, $mainArticleId)->result_array();
    }

    public function getOldArticle()
    {
        return $this->db->limit(5)->get('artikel')->result_array();
    }

    public function getLowerArticle()
    {
        return $this->db->order_by('id', 'ASC')->limit(2)->get('artikel')->result_array();
    }

    public function getPopularArticle()
    {
        return $this->db->order_by('view_count', 'DESC')->limit(6)->get('artikel')->result_array();
    }

    public function getRelatedArticle($id)
    {
        $query = "SELECT * FROM artikel WHERE id <> ? ORDER BY id DESC LIMIT 3";

        return $this->db->query($query, $id)->result_array();
    }

    public function getArticleByRole($role_id, $author_id)
    {
        if ($role_id == 1) {
            return $this->db->get('artikel')->result_array();
        } else if ($role_id == 2) {

            return $this->db->get_where('artikel', ['author_id' => $author_id])->result_array();
        }
    }

    public function getArticleBySlug($slug)
    {
        return $this->db->get_where('artikel', ['slug' => $slug])->row_array();
    }

    public function getArticleById($id)
    {
        return $this->db->get_where('artikel', ['id' => $id])->row_array();
    }

    public function addViewersNumber($id)
    {
        $view_before = $this->db->get_where('artikel', ['id' => $id])->row_array();

        $this->db->where('id', $id);
        $this->db->update('artikel', ['view_count' => $view_before['view_count'] + 1]);
    }

    public function deleteArtikelById($id)
    {
        $old = $this->getArticleById($id);
        unlink(FCPATH . 'assets/content-img/' . $old['image']);

        $this->db->delete('artikel', ['id' => $id]);
    }

    public function updateArtikel()
    {
        $this->db->set('nama_artikel', $this->input->post('nama_artikel'));
        $this->db->set('kategori_id', $this->input->post('kategori_id'));
        $this->db->set('artikel_text', $this->input->post('artikel_text'));
        $this->db->set('author_id', $this->input->post('author_id'));
        $this->db->set('tag', json_encode($this->input->post('tag[]')));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('artikel');
    }

    public function updateImageArtikel($newImage)
    {
        $this->db->set('image', $newImage);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('artikel');
    }

    private function _uploadImage()
    {
        $this->load->library('image_lib');

        $config['upload_path']          = './assets/content-img/';
        $config['allowed_types']        = 'jpg|png|jpeg';
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
            return redirect('artikel_list/tambahArtikel');
            die;
        }
    }

    public function countTotalViews($author_id)
    {
        if ($this->session->userdata('role_id') == 1) {
            // Master admin shows all views
            $this->db->select_sum('view_count');
            $result = $this->db->get('artikel')->row_array();
            return $result['view_count'];
        } else if ($this->session->userdata('role_id') == 2) {
            // Admin shows his/her post's view
            $this->db->select_sum('view_count');
            $this->db->where('author_id', $author_id);
            $result = $this->db->get('artikel')->row_array();
            return $result['view_count'];
        }
    }

    public function countTotalPosts($author_id)
    {
        if ($this->session->userdata('role_id') == 1) {
            // Master admin shows all amount of posts 
            $result = $this->db->get('artikel');

            return $result->num_rows();
        } else if ($this->session->userdata('role_id') == 2) {
            // Admin shows his/her post's amount
            $result = $this->db->get_where('artikel', ['author_id' => $author_id]);

            return $result->num_rows();
        }
    }
}
