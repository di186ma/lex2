<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
<h2>{{$admin ? "Запросы админстратора с id ".$admin->id : "Неверный id"}}</h2>
@if($admin)
    <table border="1">
        <th>
        <td>
            id запроса
        </td>
        <td>
            id пользователя
        </td>
        <td>
            id консультанта
        </td>
        <td>
            id администратора
        </td>
        <td>
            Текст запроса
        </td>
        </th>
        @foreach($admin->queries as $query)
            <tr>
                <td></td>
                <td>
                    {{$query->id}}
                </td>
                <td>
                    {{$query->user_id}}
                </td>
                <td>
                    {{$query->lawyer_id}}
                </td>
                <td>
                    {{$query->admin_id}}
                </td>
                <td>
                    {{$query->query_text}}
                </td>
            </tr>
        @endforeach

    </table>
@endif
</body>
</html>
