@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb_2">
            <div class="card-body">
                <h5 class="card-title">{{$article->title}}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{$article->created_at->diffForHumans()}}
                </div>

                <p class="card-text">{{$article->body}}</p>
            <a class="btn btn-warning" href="{{url("articles/delete/$article->id")}}">
                DELETE
            </a>
            </div>
        </div>

        {{-- Comment session --}}
        <ul class="list-group">
            <li class="list-group-item active">
                <b>Comments {{ count($article->comments)}}</b>
            </li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    {{$comment->content}}
                    <a href="{{url("/comments/delete/$comment->id")}}" class="close">&times;</a>
                </li>
            @endforeach
        </ul>

        <form action="{{url("/comments/add")}}" method="POST">
            @csrf
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <textarea name="context" class="form-control mb-2 @error('context') is-invalid @enderror"  placeholder="New Comment"></textarea>
            @error('context')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            <input type="submit" value="Add Comment" class="btn btn-secondary">
        </form>
    </div>
@endsection
