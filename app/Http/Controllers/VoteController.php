<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use Auth;

class VoteController extends Controller
{
   public function vote(Request $request)
   {
    //  return $request;
    $check = Vote::where('user_id',Auth::user()->id)->where('feedback_id',$request->id)->first();
   
    $flage = 0;
    
    if (!empty($check)) {
        $check->delete();
        $flage = 0;

    } else {
        Vote::create([
            'user_id' => Auth::user()->id,
            'feedback_id' => $request->id,
        ]);
        $flage = 1;

    }
    $vote = Vote::where('feedback_id',$request->id)->count();

    return array(
       'status' => $flage,
       'vote' => $vote
    );
   }
}
