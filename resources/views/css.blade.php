@foreach($fontFamilies as $name => $font)
    @font-face {
    font-family: {{$font['family']}};
    src: url('./{{$font['family']}}/{{$font['file']}}') format('{{$font['type']??'truetype'}}');
    font-weight: {{$font['weight']??300}};
    }
    .{{$name}}{
    font-family: '{{$font['family']}}';
    font-weight: {{$font['weight']??300}};
    }
@endforeach
