@extends('layouts.app')

@section('content')
<body>
    <p>2</p>
    <form action='{{route('create')}}'method='POST'>
        @csrf
            <textarea name='content'>
            </textarea>
            <button type='submit'>送出</button>
    </form>
    @foreach ( $posts as $post1)
    @if($post1->inputer==Auth::user()->name)
        <p>{{$post1->inputer}}</p>
        <p>{{$post1->content}}</p>
        <a href='{{ route('edit',[$post1->id])}}'>編輯</a>
    
    
    
    <form action="{{route('delete',$post1->id)}}" method="POST">
        @csrf
             @method('delete')
                <button type="submit">刪除</button>
                </div>
    </form>
    @endif
    @endforeach
    <!--<i class="bi bi-cart-dash-fill" style="font-size: 100px"></i>-->

</body>
@endsection