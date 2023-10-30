@extends('layouts.main')
@section('content')
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <a href="{{route('admin.user')}}">
                <div class="card text-center card-1">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <div class="text-center">
                            <i class="fa fa-user" style="font-size:65px;"></i>
                        </div>
                    <h4 class="card-title">Users</h4>
                    <p class="card-text">Users:{{$user}}</</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <a href="{{route('admin.feedback')}}">
                <div class="card text-center card-2">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <div class="text-center">
                            <i class="fa fa-comment" style="font-size:65px;"></i>
                        </div>
                      <h4 class="card-title">Feedbacks</h4>
                      <p class="card-text">Feedbacks:{{$feedback}}</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>


@endsection