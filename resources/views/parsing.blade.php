@extends('layouts.one-col')

@section('content')
    <h1>Hi there, parsing here!</h1>
    <form action="{{ route('parsing.parse') }}" method="post">
        @csrf
        <label for="wikiLink">Введите ссылку на вики-страницу определенной личности, чтобы получить дату рождения:</label>
        <input id="wikiLink" name="wikiLink" type="text" placeholder="Ссылку сюда">
        <input type="submit" value="Узнать!">
    </form>

    @if (isset($data))
    <div class="parsingResult">
        <p class="name">Имя: </p>
        <p class="birthday">Дата рождения: </p>
    </div>
    @endif
@endsection
