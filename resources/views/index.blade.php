<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Font Cache</title>
    <style>
        /*声明 WebFont*/
        @foreach($fontFamilies as $name => $font)
                @font-face {
            font-family: {{$font['family']}};
            src: url('{{$fontPath}}/{{$font['family']}}/{{$font['file']}}') format('{{$font['type']??'truetype'}}');
            font-weight: {{$font['weight']??300}};
        }

        .{{$name}}    {
            font-family: '{{$font['family']}}';
            font-weight: {{$font['weight']??300}};
        }
        @endforeach
    </style>
</head>
<body>
@foreach($fontFamilies as $name=>$font)
    <p class="{{$name}}">{{$strings}}ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-=</p>
@endforeach
</body>
</html>
