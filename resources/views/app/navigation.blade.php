 <nav class="navigation navbar-default">
     <div class="header-center row">
         <div class="col-md-4">
             <a href="/">
                 <!-- <img class="logo" src="/images/site/logo.png" alt="Logo"> -->
                <span class="app-name">{{ \App\Configuration::getValue('name', config('app.name')) }}</span>
             </a>
         </div>
         <div class="col-md-4">
             <form action="/search" method="get">
                 <div class="input-group">
                     <input type="text" class="form-control" name="text" placeholder="Search for any item.."/>
                     <span class="input-group-addon" role="button" type="submit">
                        Search
                     </span>
                 </div>
             </form>
         </div>
     </div>
     <div class="list-navigation">
         <ul class="list-inline ">
             <li>
                 <a href="/shop">Shop online</a>
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
             <li>
                 <a href="/book-a-party" >Book a party</a>
             </li>
         </ul>
     </div>
 </nav>