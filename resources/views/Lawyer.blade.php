<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
<h2>{{$lawyer ? "Данные о запросах консультанта с id: ".$lawyer->id : "Неверный id"}}</h2>
@if($lawyer)
    <table border="1">
        <thead>
        <td>
            id
        </td>
        <td>
            Текст запроса
        </td>
        </thead>
        @foreach($lawyer->queries as $query)
            <tr>
                <td>
                    {{$query->id}}
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
