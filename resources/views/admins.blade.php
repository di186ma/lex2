<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
<h2>Список админов:</h2>
<table border="1">
    <thead>
    <td>
        id
    </td>
    <td>
        Имя
    </td>
    <td>
        Отчество
    </td>
    <td>
        Фамилия
    </td>
    </thead>
    @foreach($admins as $admin)
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
        </tr>
    @endforeach

</table>
</body>
</html>
