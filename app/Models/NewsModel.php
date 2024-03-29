<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'slug', 'body'];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $createdField = 'created_at';
    protected $deletedtField = 'deleted_at';
    protected $upadatedField = 'update_at';

    public function getNews($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }


        return $this->asArray()->where(['id' => $id])->first();
    }
}
