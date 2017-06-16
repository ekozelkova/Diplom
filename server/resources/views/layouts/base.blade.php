<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/common.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/overview.min.css') }}">

    <script src="{{ URL::to('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ URL::to('js/bootstrap.min.js') }}"></script>

    <title>@yield('title')</title>
</head>
<body>
<div class="container">
    <h1>Центр европейских квалификаций ЮУрГУ</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('index') }}">О проекте <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Контакты</a></li>
                    @if (Auth::check())
						<li><a href="{{ route('logout') }}">Выход</a></li>
					@else
						<li><a href="{{ route('getLogin') }}">Вход</a></li>
					@endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="row">
        <ul class="nav nav-pills nav-stacked col-xs-4">
			@foreach(App\Profession::all() as $profession)
				<li>
					<a href="{{ route('professions', ['id' => $profession->id]) }}">
						{{ $profession->name }}
					</a>
				</li>
			@endforeach
        </ul>

        <section class="col-xs-8">
            @yield('content')
        </section>
    </div>
</div>

<footer>
    <br class="container">
    Сделано на кафедре ЭВМ Южно-Уральского госудаственного университета (национальный исследовательский университет)<br>
    <a>http://www.comp.susu.ru/</a>
</footer>

</body>
</html>
