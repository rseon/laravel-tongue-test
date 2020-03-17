<!DOCTYPE html>
<html lang="{{tongue()->current()}}" dir="{{tongue()->leftOrRight()}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Tongue Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {

            }

            .title {
                font-size: 84px;
                text-align: center;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ $h1 ?? 'Laravel' }}
                </div>

                <ul>
                	<li>{{ __('Langue en cours') }} : <strong>{{ tongue()->current() }}</strong></li>
                	<li>{{ __('Langues disponibles') }} : {{ implode(', ', tongue()->speaking()->keys()->all()) }}</li>
                </ul>

                <ul>
                	<li>
                		{{ __('URL en cours') }} :
                		<ul>
                			<li>FR : <a href="{{ dialect()->current('fr') }}">{{ dialect()->current('fr') }}</a></li>
                			<li>EN : <a href="{{ dialect()->current('en') }}">{{ dialect()->current('en') }}</a></li>
                			<li>ES : <a href="{{ dialect()->current('es') }}">{{ dialect()->current('es') }}</a></li>
                		</ul>
                	</li>
                	<li>
                		{{ __('Toutes les URL traduites sauf l\'URL actuelle') }} :
                		<ul>
                			@foreach (dialect()->translateAll() as $locale => $url)
					            <li>{{ $locale }} : <a href="{{ $url }}">{{ $url }}</a></li>
					        @endforeach
                		</ul>
                	</li>
                	<li>
						{{ __('Changer de langue') }} :
						<ul>
							@foreach(tongue()->speaking()->all() as $localeCode => $properties)
								<li>
									{{ $properties['native'] }} :
									<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ dialect()->current($localeCode) }}">
										{{ dialect()->current($localeCode) }}
									</a>
								</li>
							@endforeach
						</ul>
                	</li>
                </ul>

                <hr>

                <ul>
                    <li>Not localized page : <a href="{{ route('not-localized') }}">{{ route('not-localized') }}</a></li>
                    <li>{{ __('Page traduite') }} : <a href="{{ route('localized') }}">{{ route('localized') }}</a></li>
                    <li>
                        {{ __('Afficher la page traduite') }} :
                        <ul>
                            <li>In French : <a href="{{ dialect()->redirectUrl(route('localized'), 'fr') }}">{{ dialect()->redirectUrl(route('localized'), 'fr') }}</a></li>
                            <li>In English : <a href="{{ dialect()->redirectUrl(route('localized'), 'en') }}">{{ dialect()->redirectUrl(route('localized'), 'en') }}</a></li>
                            <li>In Spanish : <a href="{{ dialect()->redirectUrl(route('localized'), 'es') }}">{{ dialect()->redirectUrl(route('localized'), 'es') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
