@extends('layouts.app')
@section('content')
@if(session('message'))
<p class="alert alert-success">{{session('message')}}</p>
@endif
<p>{{$user->name}}さん、こんにちは!</p>
@foreach ($posts as $post)
<div class="container-fluid mt-20" style="margin-left:-10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
                        <div class="text-muted small">{{$post->user->name ?? '削除されたユーザー'}}</div>
                        <div class="media-body ml-3">
                            <img src="{{asset('storage/avatar/'.($post->user->avatar ?? 'user_default.jpg'))}}" alt="" class="rounded-circle" style="width:40px;height:auto;">
                            <a href="{{route('post.show',$post)}}">{{$post->title}}</a>
                        </div>
                        <div class="text-muted small mt-2">
                            <div>投稿日 : <strong>{{$post->created_at->diffForHumans()}}</strong></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>{{Str::limit($post->body,100,'・・・')}}</p>
                </div>
                <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                    <div class="px-4 pt-3">
                        @if ($post->comments->count())
                        <span>返信 {{$post->comments->count()}}件</span>
                        @else
                        <span>コメントはまだありません。</span>
                        @endif
                    </div>
                    <div class="px-4 pt-3"> 
                       <button type="button" class="btn btn-primary">
                          <a class="text-decoration-none" href="{{route('post.show', $post)}}" style="color:white;">コメントする</a>
                      </button> </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection