<?php

namespace App\GuestBook;


class GuestBook
{
    public $full_name = null;
    public $comment = null;

    public function __construct($data)
    {
       if(array_key_exists('full_name', $data)){
           $this->full_name = $data['full_name'];
       }

        if(array_key_exists('comment', $data)){
            $this->comment = $data['comment'];
        }
    }
}