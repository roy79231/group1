@extends('layouts.app')

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
                    @if(Auth::user()->name == '楊博仁')
                    123
                    @endif
                    
                    
                </div>
            </div>
        </div>
        
    </div>
    @foreach ($rposts as $rpost)
        {{$rpost->content}}
        {{$rpost->inputer}}
        @if($rpost->inputer==Auth::user()->name)
            如果該rpost的inputer=現在登入人的名字 就會顯示這行            
        @endif
        </br>
    @endforeach
    <form action="{{route('rcreate')}}" method="POST">
        @csrf
            <textarea name="content">
            </textarea>
            <button type="submit">送出</button>
    </form>
</div>
@endsection
