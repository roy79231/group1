<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.app')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box{
            background-color: aliceblue;
            margin: 20px;
            border: 1px solid black;
        }
        .right-align{
            text-align: right;
            white-space: nowrap;
        }
    </style>
</head>
<body>

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ Auth::user()->name }}
                        @if(Auth::user()->name == '劉威佑')
                            你好 大帥哥
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($posts as $post)
        <div class=box>
            <p>{{$post->content}}</p>
            <p class = right-align>{{$post->inputer}} {{$post->created_at}}</p>
            @if($post->inputer==Auth::user()->name)
                <form action="{{route('n_delete',$post)}}" method="POST">
                    @csrf
                        @method('delete')
                            <div class=right-align>
                            <button type="submit">刪除</button>
                            </div>
                </form>
                <div class='right-align'>
                    <a href="{{route('n_edit',$post)}}">編輯</a> 
                </div>
            @endif

        </div>
    @endforeach

        <a href="{{route('n_create')}}">新增文章</a>

@endsection
    
</body>
</html>