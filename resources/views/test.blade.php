<h1>{{$heading}}</h1>
@foreach($test as $value)
<<h2>
    {{$value['tytul']}}
</h2>
<p>
    {{$value['opis']}}
</p>
@endforeach