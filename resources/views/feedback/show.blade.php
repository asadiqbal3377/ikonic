@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row mt-4 justify-content-center">
    <div class="col-lg-8 col-md-12 col-sm-12">
        <h1 class="text-center mb-4">
          <b>
            Feedback
        </b>
      </h1>

      <div class="card">
        <div class="card-header">
          <h2>Title: {{ $feedback->title }}</h2>
        </div>
        <div class="card-body p-1">
          <ul class="list-group">
            {{-- {{$feedback}} --}}
              <li class="list-group-item m-1">
                <div>
                  <span class="user-icon ">
                  <i class="fa fa-user"></i>
                </span>
                <span class="ml-3">
                  <b >Category: {{$feedback->category}}</b>
                </span>
              </div>
              <div class="p-2 mt-3">
                <p>Coment: {{$feedback->description}}</p>
              </div>

               @php
                   $check = \App\Models\Vote::where('user_id',Auth::user()->id)->where('feedback_id',$feedback->id)->first();
                   $vote = \App\Models\Vote::where('feedback_id',$feedback->id)->count();
                  
               @endphp
              <button id="heart-button"  onclick="vote({{$feedback->id}})" >
                <i class="fa fa-heart text-dark vote-icon {{!empty($check) ? 'heart' : ''}} "></i>
                <span class="text-dark vote-count">{{$vote}}</span>
              </button>
              </li>
          </ul>
        </div>
        <div class="card-footer">
          <h3 class="mb-3">Comments <span class="comments-counter">({{count($feedback->comments)}})</span></h3>
          <ul class="list-group comments">

            @foreach ($paginate as $comment)
              <li class="list-group-item m-1">
                <p> 
                  <span class="user-icon ">
                    <i class="fa fa-user"></i>
                  </span>
                  <span><b>{{ optional($comment->user)->name }}</b></span>

                </p>
                <p>{{ $comment->body }}</p>
              </li>
            @endforeach
            <div class="comments-paginate mt-4">
              {!!$paginate->withQueryString()->links('pagination::bootstrap-5')!!}
      
            </div>
          </ul>
          <form id="comment-form" method="post" class="mt-3">
            @csrf
            <textarea name="body" required class="form-control" rows="5" placeholder="Add a comment"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
  </div>

  <!-- Ajax code for comments -->
@include('includes.comment-ajax')

  <!-- Ajax code for voting -->
  @include('includes.vote-ajax')



@endsection