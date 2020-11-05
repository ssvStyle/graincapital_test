<?php

namespace App\Service;


use App\Models\Content;
use Core\Storage\Bases\Mysql;

class ContentService
{
    protected $data;

    public function __construct($post)
    {
        $this->data = $post;
    }

    public function save()
    {
        $db = new Mysql();
        $uid = (new Authorization($db))->getUid();

        foreach ($this->data as $value) {
            $sql = 'INSERT INTO `content` (`id`,`title`,`body`,`user_id`,`user_id_btn`) VALUES (NULL , :title, :body, :user_id, :user_id_btn)';

            $db->execute($sql, [
                ':title' => $value["title"],
                ':body' => $value["body"],
                ':user_id_btn' => (int)$value["btnId"],
                ':user_id' => $uid
            ]);
        }

        return json_encode(['succses' => true]);

    }

}