<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Comment;
use Auth;

class FeedbackController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedback = Feedback::latest()->get();
        $paginate = Feedback::latest()->paginate(6);
        return view('feedback.index', compact('feedback', 'paginate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => ['required', 'string', 'in:bug_report,feature_request,improvement'],
        ]);

        $feedback = Feedback::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
        ]);

        return redirect(route('feedback.show', $feedback->id))->with('success', 'Feedback successfully created!', compact('feedback'));
    }

    /**
     * Show the profile for a given user.
     */
    public function show(string $id)
    {
        $feedback = feedback::find($id);
        if (!$feedback) {
            return redirect()->back()->with('error');
        }
        $paginate = $feedback->comments()
        ->latest()
        ->paginate(5);
        return view('feedback.show' , compact('feedback', 'paginate'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function addComment(Feedback $feedback, request $request)
    {
        
        $feedback->comments()->create([
            'body' => request()->input('body'),
            'user_id' => Auth::user()->id,
            'feedback_id' => $feedback->id,
        ]);

        $count = $feedback->comments()->count();
        // $user = $feedback->comment->user->id;
        return response()->json([
            'id' => $feedback->comments()->latest()->first()->id,
            'body' => $feedback->comments()->latest()->first()->body,
            'user' => $feedback->comments()->latest()->first()->user,
            'user_id' => $feedback->comments()->latest()->first()->user->id,
            'comments' => $count
        ]);
    }


    
    public function like(Request $request)
    {
        // Handle the form submission
        $like = $request->input('like');
    
        // You can save the like status to your database or perform other actions as needed
    
        // Redirect back to the page
        return redirect()->back()->with('success');
    }
    


}
