<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class VoteController extends Controller
{
    public function vote($id)
    {
        if (Auth::user()) {

            if (Request::ajax())  {

            $vote = "1";
            $user = Auth::user()->id;

            $post = Comment::find($id);

            $checkvotes = Vote::where('post_id', $post->id)
                ->where('user_id', $user)
                ->first();

            if (empty($checkvotes))
                    {
                        $entry = new Vote;
                        $entry->user_id = $user;
                        $entry->post_id = $post->id;
                        $entry->vote ="1";
                        $entry->save();

                    }

            }


        }
        else
        {
            return "Not an AJAX request.";
        }

////////// mo4 3arfa a3mlha
    }
}


