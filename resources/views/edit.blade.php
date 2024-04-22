@extends('layouts.app')

@section('content')
<body>
    
    
    <p>編輯文章</p>
    <form action='{{route('update',$posts)}}'method='POST'>
        
        @csrf
        @method('patch')
            <textarea name='content'>
            </textarea>
            <button type='submit'>送出</button>
    <form>
    <i class="bi bi-cart-dash-fill" style="font-size: 100px"></i>

</body>
</html>
@endsection