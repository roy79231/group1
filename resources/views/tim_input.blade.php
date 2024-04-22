
@extends('layouts.app')<!--因為有 extends所以不需要再做layout(nmsl TimLin)的部分，另外因為有session(我不懂，記得問人)的關係，這裡的文件不需要用html作為開頭-->
<!--bootstrap很好用，要學一下-->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ Auth::user()->name }}   
                        @if(Auth::user()->name == 'TimLin')
                            <br>
                            奶油好讚
                        @endif
                    </div>

                    <div>
                        <form action="{{route('timcreate')}}" method='POST'><!--上傳資料 其他有 Delete update-->
                                @csrf
                                <div class="name">
                                    <p>留言人</p>
                                        <input type="text" name="inputer" >
                                </div>
                                <div class="comment">
                                    <p>留言區</p>
                                    <textarea   name='content'
                                                row='6'
                                                cols='40'
                                                placeholder="想說啥"></textarea>
                                </div>
                                <div class="submit_comment">
                                    <input type="submit" value="送出留言" name="submit">
                                    <br/>
                                </div>
                        </form>
                    </div>   

                </div>
            </div>
        </div>
    </div>
</div>
            <!--{$post}會直接輸出物件-->
@endsection
