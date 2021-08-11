<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Vote;
use App\Models\Post;

class CommentController extends Controller
{

    public $post_id;
    public $vote_sum;
    public $vote;
    public $voted=false;


    public function addComment(Request $request)
    {
        $request ->validate([
            'comment'=>'required'
        ]);
        //$post=Post::where('id',$id);
        $comment=new Comment();
        $comment->user_id=$request->user_id;;//$request->user()->id;
        $comment->post_id=$request->post_id;
        $comment->comment=$request->comment;
        $comment->save();
        return $comment . response()->json(['success','The Comment has been added'],200);

    }

   /* public function mountupvote(Request $request){

      /* $this->post_id=$request->post_id;
        $this->vote_sum=$request->vote_sum;
        if(auth()->user()->votes->where('post_id',$this->post_id)->count()>0)
        {
            $this->voted=true;
            return;
        }
        Vote::create([
            'post_id'=>$this->post_id,
            'user_id'=>$this->usr_id,
            'vote'=>$vote
        ]);
        Comment::find($this->post_id)->increment('vote_sum',$vote);
        $this-vote_sum += $vote;*/


      /*  $data       = 0;
        $id         = isset( $this->id ) ? $this->id : $id;
        $comment = Comment::find( $id );
        if ( $comment && count( $comment->votes ) ) {
           $data = $comment->votes()->where( 'vote', 1 )->count();
        }

        return $data;*/


       /* if(Auth::check()){

            //checks if ajax request
            if (Request::ajax())
            {
                                //get my data
                $post = Input::comment('comment');
                                $vote = Input::comment('vote');
                $user = Auth::user()->id;

                //checks if user voted
                $vote = querythatisnotyetcoded

                //if row exists
                if($vote->count() > 0){
                    //change row AKA DOWNVOTE
                    Vote->vote = $vote; // however you change values
                }
                else{
                    //add new row AKA UPVOTE
                    Vote::create([
                        'user_id' => $user,
                        'post_id' => $post,
                        'vote' => $vote
                    ]);
                }

            }
        }
    }*/
}
