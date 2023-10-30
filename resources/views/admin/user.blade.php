@extends('layouts.main')
@section('content')

<div class="container mt-4">
  <h1 class="text-center mb-3">
    Users Lists
  </h1>
    <div class="card">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">User Name</th>
                <th scope="col">Feedbacks</th>
                <th scope="col">Votes</th>
                <th scope="col">comments</th>
                <th scope="col">Remove</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $key => $item)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ count($item->feedbacks) }}</td>
                    <td>{{ count($item->votes) }}</td>
                    <td>{{ count($item->comments) }}</td>
                    <td>
                        <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-remove text-dark"></i>
                            </button>
                        </form>
                      </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
          <div class="comments-paginate mt-4">
            {!!$paginate->withQueryString()->links('pagination::bootstrap-5')!!}
    
          </div>
    </div>
  </div>

@endsection