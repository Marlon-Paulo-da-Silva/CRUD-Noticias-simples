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

    public function store()
    {
        helper('form');

        $model = new NewsModel();

        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'body' => 'required'
        ];

        if ($this->validate($rules)) {
            $model->save([
                'id' => $this->request->getVar('id'),
                'title' => $this->request->getVar('title'),
                'slug' => url_title($this->request->getVar('title')),
                'body' => $this->request->getVar('body')
            ]);

            echo view('templates/header');
            echo view('news/success');
            echo view('templates/footer');
        } else {
            echo view('templates/header');
            echo view('news/form');
            echo view('templates/footer');
        }
    }
    public function edit($id = null)
    {
        $model = new NewsModel();

        $data['news'] = $model->getNews($id);
        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nao pude encontrar essa noticia: ' . $id);
        }
        $data = [
            'title' => $data['news']['title'],
            'slug' => url_title($data['news']['body']),
            'body' => $data['news']['title'],
            'id' => $data['news']['id']
        ];

        echo view('templates/header');
        echo view('news/form', $data);
        echo view('templates/footer');
    }
}
