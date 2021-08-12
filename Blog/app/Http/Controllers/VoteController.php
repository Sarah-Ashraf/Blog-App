<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Vote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class VoteController extends Controller
{
    public $comment_id;
        public $votes_sum;
        //public $value=0;
        public $voted=false;

        public function mount ($comment_id,$votes_sum){

            $comment = Comment::where('comment_id',$comment_id )->first();
            $this->votes_sum=$votes_sum;
        }
        public function vote(Request $request)
        {
            if(Comment::where('comment_id',$this->comment_id)
            ->count()>0){
                $this->voted=true;
                //$this->$value=$request->$value++;
                return;
            }

            $request ->validate([
                'user_id'=>'required',
                'comment_id'=>'required'
            ]);

            $comment=new Vote();
            $comment->user_id=$request->user_id;
            $comment->comment_id=$request->comment_id;
            $comment->save();
            //$this->votes_sum += $value;
        }

}


