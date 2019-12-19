<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\NewsletterModel;


class  Newsletter extends Controller
{
    public function index()
    {
        $model = new NewsletterModel();

        $data = [
            'newsletter' => $model->getNewsletter()
        ];

        echo view('templates/header');
        echo view('newsletter/overview', $data);
        echo view('templates/footer');
    }
}
