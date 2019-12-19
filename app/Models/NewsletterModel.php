<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsletterModel extends Model
{
    protected $table = 'newsletter';
    protected $primaryKey = 'id';

    public function getNewsletter($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()->where(['id' => $id])->first();
    }
}
