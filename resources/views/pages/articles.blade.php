@extends('layouts.app')

@section('content')

  @foreach($article as $a)
    {{$a->title}} <br/>
    {{$a->body}}
  @endforeach
@stop