<?php
namespace App\Serivces\Articles;

use App\Models\Article;
use App\Models\Webinar;
use App\Serivces\Articles\ArticlesInterface;
use App\Trait\Image;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticlesService implements ArticlesInterface
{
    use Image;
    public function createOrUpdateArticle($data)
    {
        DB::beginTransaction();
        try 
        {
            if(array_key_exists('image',$data)){
                $image = $data['image'];
            }

            if( array_key_exists('article_id',$data) && $data['article_id'] != 0 && !is_null( $data['article_id'] ))
            {
                $article = Article::find( $data['article_id'] );
                if(array_key_exists('image',$data)){
                    $image = $data['image'] ?? $article->image;
                }
                if( $article &&  $article->image !=  $image->getClientOriginalName())
                    $this->deleteImage( $article->image,Article::PATH );
            }
            else 
                $article = new Article();
            $article->title            = array_key_exists('title',$data) ? $data['title'] : null;
            $article->sub_title            = array_key_exists('sub_title',$data) ? $data['sub_title'] : null;
            $article->library_type_id = array_key_exists('library_type_id',$data) ? $data['library_type_id'] : 1;
            $article->article_date = array_key_exists('article_date',$data) ? $data['article_date'] : Carbon::now()->format('Y-m-d');
            $article->redirect_url     = array_key_exists('redirect_url',$data) ? $data['redirect_url'] : null;
            $article->image           = ($article->image !=  $image->getClientOriginalName()) ? $this->storeImage($image, Article::PATH) : $article->image;
            $article->save();
            DB::commit();
            return true;
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
            Log::info("Article  => ".$ex->getMessage());
            return $ex->getMessage();
        }        
    }

    public function deleteArticle( $id )
    {
        try 
        {
            $article = Article::find($id);
            $this->deleteImage( $article->image,Article::PATH );
            $article->delete();
            return true;
        } 
        catch (Exception $ex) 
        {
            Log::info("Delete Article". $ex->getMessage() );
            return $ex->getMessage();
        }
    }
}
