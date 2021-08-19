@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">

                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <h1 class="display-3">Post Rating List</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('ratings.create')}}" class="btn btn-primary">New Post Rating</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>ID</th>
                    <th>Post ID</th>
                    <th>Post Title</th>
                    <th>User Rating</th>
                    <th colspan = 2>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($post_ratings as $post_rating)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{$post_rating->id}}</td>
                        <td>{{$post_rating->post_id}}</td>
                        <td>{{$post_rating->post_title}}</td>
                        <td>{{$post_rating->user_rating}}</td>
                        <td>
                            <a href="{{ route('ratings.edit',$post_rating->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('ratings.destroy', $post_rating->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $post_ratings->links() !!}
            </div>

            </div>
            </div>

@endsection
