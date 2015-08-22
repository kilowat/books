<?php
namespace App\Widgets;
use Arrilot\Widgets\AbstractWidget;
use App\Model\Comment;
class LastCommentAll extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];
    /*
    select users.name as user_name, categories.name as category_name, comments.message as comments_message, publications.created_at,publications.id as publication_id
    from comments
    join users on users.id = comments.user_id
    join publications on publications.id=comments.publication_id
    join categories on categories.id = publications.category_id;
    */
    public function run()
    {
         $comments= \DB::table('comments')
            ->select(
                'users.name as user_name',
                'users.id as user_id', 
                'categories.slug as category_slug', 
                'comments.message as comment_message', 
                'comments.created_at as comment_created_at',
                'publications.id as publication_id',
                'publications.name as publication_name')
            ->join('users','users.id','=','comments.user_id')
            ->join('publications','publications.id','=','comments.publication_id')
            ->join('categories','categories.id','=','publications.category_id')
            ->get();
        return view("widgets.last_comment_all", [
            'config' => $this->config,
        ])->with(['comments'=>$comments]);
    }
}