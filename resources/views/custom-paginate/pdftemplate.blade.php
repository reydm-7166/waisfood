<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Fontawesome 6 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@1&display=swap" rel="stylesheet">

    <style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap'); </style>

    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            padding: 1rem 2rem;
            font-family: "Montserrat", sans-serif;
        }
        body {
            height: fit-content;
            min-height: 100%;
            width: 100%;
        }
        #title {
            font-size: 40px;
            color: blue;
            display: inline-block;
        }
        #nav {
            width: 100%;
            padding: 1rem;
            text-align: center;
            margin: 0 auto;
        }
        main {
            height: fit-content;
            width: 100%;
            border-radius: .5rem;
        }
        #ingredients, #directions {
            width: 100%%;
            vertical-align: top;
        }
        main #title-inside {
            margin: 0 auto;
            padding: 0;
        }
        main #list {
            width: 100%;
            border-radius: .3rem;
        }
        #list li {
            font-size: 13px;
        }
        .bullet-none {
            list-style-type: none;
        }
    </style>
</head>
<body>
    <nav id="nav">
        <p id="title">{{ $recipe[0]->recipe_name }}</p>
    </nav>
    <main>
        <div id="ingredients">
            <div id="title-inside">
                <p>INGREDIENTS</p>
            </div>

            <div id="list">
                <ul>
                    @foreach ($recipe as $recipes)
                        <li> {{ $recipes->measurement }} of {{ $recipes->ingredient }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div id="directions">
            <div id="title-inside">
                <p>DIRECTIONS</p>
            </div>

            <div id="list">
                <ul>
                    @foreach ($direction as $directions)
                        <li class="bullet-none">{{ $directions->direction_number }}.&nbsp;&nbsp;&nbsp;&nbsp; {{ $directions->direction}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

    </main>
</body>
</html>
