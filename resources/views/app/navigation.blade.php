 <nav class="navigation navbar-default">
     <div class="header-center row">
        <img src="/images/site/balloons_1.png" id="balloons_1">
                <img src="/images/site/balloons_2.png" id="balloons_2">
                <img src="/images/site/balloons_3.png" id="balloons_3">
                <img src="/images/site/balloons_1.png" id="balloons_4">
         <div class="col-md-4">
             <a href="/">
                <img class="logo" src="/images/site/logo.png" alt="Logo">
             </a>
         </div>
         <div class="col-md-4 col-md-offset-4">
             <form action="/search" method="get">
                 <div class="input-group search">
                     <input type="text" class="form-control" name="text" placeholder="Search for any item.."/>
                     <span class="input-group-addon" role="button" type="submit">
                        Search
                     </span>
                 </div>
             </form>
         </div>
     </div>
     <div class="hidden-xs hidden-sm">
         @include('partials.navlist')
     </div>
 </nav>