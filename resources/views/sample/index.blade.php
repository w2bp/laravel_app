<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>Index</title>
    </head>
    <body>
        <h1>Hello/Index</h1>
        <p>@if(!empty($msg)) {{ $msg }} @endif</p>
        @if(!empty($data))
            @foreach($data as $item)
            <li>{{ $item }}</li>
            @endforeach
        @endif

        <p><a href="/download">Download</a></p>

        <form action="/flash" method="post">
            @csrf
            <div>NAME:<input type="text" name="name" value="{{old('name')}}"/></div>
            <div>MAIL:<input type="text" name="mail" value="{{old('mail')}}"/></div>
            <div>TEL:<input type="text" name="tel" value="{{old('tel')}}"/></div>
            <input type="submit"/>
        </form>
    </body>
</html>