@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10 mt-6">
        <div class="card-body">
            <h1 class="mt4">新規投稿</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session('message'))
            <p class="alert alert-success">{{session('message')}}</p>
            @endif
            <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">件名</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="{{old('title')}}">
                </div>
                <div class="form-group mt-3">
                    <label for="body">本文</label>
                    <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{old('body')}}</textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="image">画像 </label>
                    <div class="col-md-6">
                        <input id="image" type="file" name="image">
                    </div>
                </div>
                <button type="submit" class="btn btn-success  mt-3">送信する </button>
            </form>
        </div>
    </div>
</div>
@endsection