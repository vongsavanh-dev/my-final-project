<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if(isset($student))

    {{$student->st_id}}
    {{$student->st_name}}
    {{$student->st_surname}}
    {{$student->st_dob}}
    {{$student->major->major_name}}

    @else
    No data
    @endif
</body>

</html>
