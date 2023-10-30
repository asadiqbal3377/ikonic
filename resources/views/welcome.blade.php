@extends('layouts.main')
@section('content')

        {{-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"> --}}
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-sm-12">
        
                    <h1>Submit Feedback</h1>
                    
                    <form action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" required placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="select">Example select</label>
                            <select class="form-control" required name="category" id="select">
                                <option value="">Select something...</option>
                                <option value="bug_report">Bug Report</option>
                                <option value="feature_request">Feature Request</option>
                                <option value="improvement">Improvement</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="textarea">Example textarea</label>
                            <textarea class="form-control" name="description" required id="textarea" placeholder="Enter your feedback here..." rows="3"></textarea>
                          </div>
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection