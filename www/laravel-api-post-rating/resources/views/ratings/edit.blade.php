@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a Post Rating</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('ratings.update', $post_rating->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="post_id">Post ID:</label>
                    <input type="text" class="form-control" name="post_id" value="{{ $post_rating->post_id }}" />
                </div>

                <div class="form-group">
                    <label for="post_title">Post Title:</label>
                    <input type="text" class="form-control" name="post_title" value="{{ $post_rating->post_title }}" />
                </div>

                <div class="form-group">
                    <label for="user_rating">User Rating:</label>
                    <input type="number" class="form-control" name="user_rating" min="0" max="5" value="{{ $post_rating->user_rating }}" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
