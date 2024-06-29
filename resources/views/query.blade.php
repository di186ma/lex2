<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
<h2>{{$query ? "Данные администраторов с запросом: ".$query->query_text : "Неверный id"}}</h2>
@if($query)
<table border="1">
    <thead>
    <td>
        id
    </td>
    <td>
        Имя
    </td>
    <td>
        Фамилия
    </td>
    <td>
        Отчество
    </td>
    <td>
        Никнейм
    </td>
    </thead>
    @foreach($query->admins as $admin)
        <tr>
            <td>
                {{$admin->id}}
            </td>
            <td>
                {{$admin->first_name}}
            </td>
            <td>
                {{$admin->middle_name}}
            </td>
            <td>
                {{$admin->last_name}}
            </td>
            <td>
                {{$admin->username}}
            </td>
        </tr>
    @endforeach

</table>
@endif
</body>
</html>
