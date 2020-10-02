@extends('layouts.app')
@section('content')
    <div class="container">

        {{-- just error messages  --}}
        {{-- @if ($errors->any())
        <div class="alert alert-warning">
            <ol>

                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ol>

        </div> --}}

        <form method="POST">
            @csrf
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" placeholder="" aria-describedby="helpId">
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea type="text" name="body" id="" class="form-control  @error('body') is-invalid @enderror" placeholder="" aria-describedby="helpId">
                </textarea>
                @error('body')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id" id="">
                    @foreach ($categories as $category)
                        <option value="{{$category['id']}}">
                        {{$category['name']}}
                        </option>
                    @endforeach
                </select>
              </div>
              <input type="submit" value="Add Article" class="btn btn-primary">
        </form>

    </div>
@endsection
