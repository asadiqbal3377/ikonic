@extends('layouts.main')
@section('content')

<div class="container mt-4">
  <h1 class="text-center mb-3">
    Feedback Lists
  </h1>
    <div class="card">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">User Name</th>
                <th scope="col">Feedback title</th>
                <th scope="col">Votes</th>
                <th scope="col">comments</th>
                <th scope="col">Description</th>
                <th scope="col">Details</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($feedbacks as $key => $item)
                <tr>

                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->title }}</td>
                    
                    <td>{{ count($item->votes) }}</td>
                    <td>{{ count($item->comments) }}</td>
                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                      {{ implode(' ', array_slice(str_word_count($item->description, 1), 0, 5)) }}
                  </td>
                    <td>
                      <form action="{{ route('feedback.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-remove text-dark"></i>
                            </button>
                        </form>
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