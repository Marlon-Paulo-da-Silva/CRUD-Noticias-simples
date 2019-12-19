<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NewsModel;

class News extends Controller
{
    public function index()
    {
        $model = new NewsModel();

        $data = [
            'news' => $model->getNews()
        ];

        echo view('templates/header');
        echo view('news/overview', $data);
        echo view('templates/footer');
    }

    public function view($id = null)
    {
        $model = new NewsModel();
        $data['news'] = $model->getNews($id);

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nao pude encontrar este item: ' . $id);
        }

        $data['title'] = $data['news']['title'];
        echo view('templates/header');
        echo view('news/view', $data);
        echo view('templates/footer');
    }

    public function create()
    {
        helper('form');

        echo view('templates/header');
        echo view('news/form');
        echo view('templates/footer');
    }
}
