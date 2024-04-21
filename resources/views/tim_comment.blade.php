@extends('layouts.app')
@section('content')
                <p style="align-center">o0留言紀錄0o</p>
                    <table border="1">
                        <thread>
                        <tr>
                            <th>留言人</th>
                            <th>留言</th>
                            <th>修改</th>
                            <th>刪除</th>
                        </tr>
                        </thread>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                        <td><p>{{$post->inputer}}</p></td>
                        <td>
                            <form action="{{route('timchange',$post->id)}}" method="POST">
                                @csrf
                            <textarea name='content'> {{$post->content}}</textarea>
                        </td>
                        <td>
                            @if(Auth::user()->name == $post->inputer)
                                <input type="submit" name='change' value="修改">
                            @else
                                不可修改
                            @endif

                        </td>
                    </form>
                        <td>
                                @if(Auth::user()->name == $post->inputer)
                                    <form action="{{route('timdelete',$post->id)}}" method="POST">
                                        @csrf
                                        <input type="submit" name="刪除" value="刪除">
                                @else  
                                    不可刪除
                                @endif
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
        <form action="{{route('timlastpage')}}" method="POST">
            @csrf
            <button name="lastpage">回留言區</button>
        </form>
@endsection