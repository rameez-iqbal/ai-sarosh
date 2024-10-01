<?php

namespace App\Serivces\Articles;

interface ArticlesInterface
{
    public function createOrUpdateArticle( $data );
    public function deleteArticle( $id );
}
