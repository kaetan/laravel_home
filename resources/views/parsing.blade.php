@extends('layouts.one-col')

@section('content')
    <h1>Hi there, parsing here!</h1>
    <form action="{{ route('parsing.parse') }}" method="post">
        @csrf
        <label for="wikiLink">Введите ссылку на вики-страницу определенной личности, чтобы получить дату рождения:</label>
        <input id="wikiLink" name="wikiLink" type="text" placeholder="Ссылку сюда">
        <input type="submit" value="Узнать!">
    </form>

    @if (isset($result))
    <div class="parsingResult">
        <p class="birthday">Дата рождения: {{ $result['birthday'] ?? '' }}</p>
    </div>
    @endif
@endsection
