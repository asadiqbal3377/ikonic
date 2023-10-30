<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feedback;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        if (auth()->user()->type === 'admin') {
            $users = User::all();
            $user  = count($users);

            $feedbacks = Feedback::all();
            $feedback  = count($users);



            return view('admin.dashboard',compact('user', 'feedback'));
        } else {
            return redirect()->back()->with('error', 'Only admin can access these pages');
        }
    }

    public function adminUser()
    {
        if (auth()->user()->type === 'admin') {
            $users = User::where('type', '!=', 'admin')->get();
            $feedbacks = Feedback::all();

            $paginate = User::latest()->paginate(6);

            return view('admin.user',compact('users', 'feedbacks', 'paginate'));
        } else {
            return redirect()->back()->with('error', 'Only admin can access these pages');
        }
    }


    public function adminFeedback()
    {
        if (auth()->user()->type === 'admin') {
            $users = User::where('type', '!=', 'admin')->get();

            $feedbacks = Feedback::all();

            $paginate = Feedback::latest()
            ->paginate(6);


            return view('admin.feedback',compact('users', 'feedbacks', 'paginate'));
        } else {
            return redirect()->back()->with('error', 'Only admin can access these pages');
        }
    }

    public function userDestroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function feedbackDestroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->back()->with('success', 'Feedback deleted successfully');
    }

}
