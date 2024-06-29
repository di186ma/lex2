<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>ID пользователя</th>
        <th>ID консультанта</th>
        <th>Текст запроса</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($queries as $query)
        <tr>
            <td>{{ $query->id }}</td>
            <td>{{ $query->user_id }}</td>
            <td>{{ $query->lawyer_id }}</td>
            <td>{{ $query->query_text }}</td>
            <td>
                <a href="{{ route('queries.edit', $query->id) }}">Редактировать</a>
                <form action="{{ route('queries.destroy', $query->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <title>609-31</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<h2>Список запросов:</h2>--}}
{{--<table border="1">--}}
{{--    <thead>--}}
{{--    <td>--}}
{{--        id--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        Текст запроса--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        Имя администратора--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        Фамилия администратора--}}
{{--    </td>--}}
{{--    <td>--}}
{{--        Отчество администратора--}}
{{--    </td>--}}
{{--    </thead>--}}
{{--    @foreach($queries as $query)--}}
{{--        <tr>--}}
{{--            <td>--}}
{{--                {{$query->id}}--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                {{$query->query_text}}--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                {{$query->admin->first_name}}--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                {{$query->admin->middle_name}}--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                {{$query->admin->last_name}}--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}

{{--</table>--}}
{{--</body>--}}
{{--</html>--}}
