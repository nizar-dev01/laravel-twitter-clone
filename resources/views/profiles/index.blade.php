@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img
                src="/images/home_logo.jpg"
                class="rounded-circle"
                style="height: 120px"
            />
        </div>
        <div class="col-9">
            <div class="d-flex align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create" class="ml-auto">Add new post</a>
            </div>
            <div class="d-flex">
                <div class="pr-3">
                <strong>{{ $user->posts->count() }}</strong> posts
                </div>
                <div class="pr-3">
                    <strong>152k</strong> followers
                </div>
                <div class="pr-3">
                    <strong>152k</strong> following
                </div>
            </div>
            <div class="pt-4 font-weight-bold">
                {{ $user->profile->title }}
            </div>
            <div class="w-100">
                {{ $user->profile->description }}
            </div>
            <a href="{{ URL($user->profile->url) }}" target="_blank">
                {{ $user->profile->url }}
            </a>
        </div>
    </div>

    <div class="row pt-4" style="margin:-15px">
        @foreach ($user->posts as $post)
            <div class="col-4" style="padding:15px;">
            <a href="/p/{{$post->id}}">
                    <img
                        src="/storage/{{$post->image }}"
                        style="width:100%;"
                    />
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
