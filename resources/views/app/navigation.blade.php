 <nav class="navigation navbar-default">
     <div class="logo row">
         <div class="col-md-4">
             <a href="/">{{ \App\Configuration::getValue('name', config('app.name')) }}</a>
         </div>
         <div class="col-md-4">
             <form action="/search" method="get">
                 <div class="input-group">
                     <input type="text" class="form-control" name="text" placeholder="Search for any item.."/>
                     <span class="input-group-addon" role="button" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                     </span>
                 </div>
             </form>
         </div>

         <div class="col-md-4 text-right">
             <a href="/book-a-party" class="btn btn-primary">Book a party</a>
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
         </ul>
     </div>
 </nav>