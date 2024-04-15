@extends('layouts.app')

@section('title', 'about us')

@section('content')
    <h2>about us</h2>
    <hr>
    <p>Developer : {{ $name }}</p>
    <p>CreateAt: : {{ $date }}</p>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et, odio saepe aut pariatur earum sit aperiam deleniti
        autem placeat adipisci eius error perspiciatis vero, officia eos! Recusandae accusantium ad unde!</p>
@endsection
