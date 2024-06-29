<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
<h2>Список запросов:</h2>
<table border="1">
    <thead>
    <td>
        id
    </td>
    <td>
        Текст запроса
    </td>
    <td>
        Имя администратора
    </td>
    <td>
        Фамилия администратора
    </td>
    <td>
        Отчество администратора
    </td>
    </thead>
    @foreach($queries as $query)
        <tr>
            <td>
                {{$query->id}}
            </td>
            <td>
                {{$query->query_text}}
            </td>
            <td>
                {{$query->admin->first_name}}
            </td>
            <td>
                {{$query->admin->middle_name}}
            </td>
            <td>
                {{$query->admin->last_name}}
            </td>
        </tr>
    @endforeach

</table>
</body>
</html>
