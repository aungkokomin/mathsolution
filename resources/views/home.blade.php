<!DOCTYPE html>
<html>
<head>
    <title>Equation Solutions</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        
    </style>
</head>
<body>
    <h1>Equation Solutions</h1>

    @if ($solutions->isEmpty())
        <p>No solutions found yet. Wanna start find it?</p>
        <button><a href="{{url('/solve-equation')}}">Press here!</a></button>
    @else
        <ul>
            @foreach ($solutions as $solution)
                <li>
                    HIER: {{ $solution->hier }},
                    GIBT: {{ $solution->gibt }},
                    ES: {{ $solution->es }},
                    NEUES: {{ $solution->neues }}
                </li>
            @endforeach
        </ul>
        <p>Wanna try again? <button class="btn"><a href="{{url('/solve-equation')}}">Press here!</a></button></p>
    @endif
</body>
</html>
