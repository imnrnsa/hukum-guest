@extends('layouts.app')

@section('content')
<div class="container">

    <h3>{{ $data->judul }}</h3>
    <p>{{ $data->deskripsi }}</p>
    <hr>

    <h4>Lampiran</h4>
    @foreach($data->files as $f)
        @if(Str::contains($f->file_type, 'image'))
            <img src="{{ asset($f->file_path) }}" width="200" class="mb-3">
        @else
            <a href="{{ asset($f->file_path) }}" target="_blank" class="btn btn-success btn-sm d-block mb-2">
                Download: {{ basename($f->file_path) }}
            </a>
        @endif
    @endforeach

</div>
@endsection
