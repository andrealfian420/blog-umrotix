<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Artikel extends RestController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_Model', 'artikel');
    }

    public function index_get()
    {
        $this->response([
            'status' => true,
            'data' => $this->artikel->getPublishedArtikel()
        ], 200);
    }
}
