 <nav class="navigation navbar-default">
    <div class="container">
            <h1>
                <a href="/">{{ \App\Configuration::getValue('name', config('app.name')) }}</a>
            </h1>
            <ul class="nav navbar-nav">
                <li>
                    <a href="">Book a party</a>
                </li>
                <li>
                    <a href="">Shop online</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    We decorate
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach($services as $service)
                        <li>
                            <a href="/service/{{ $service->slug }}">{{ $service->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Themes
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach($themes as $theme)
                            <li>
                                <a href="/theme/{{ $theme->slug }}">{{ $theme->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
    </div>
</nav>