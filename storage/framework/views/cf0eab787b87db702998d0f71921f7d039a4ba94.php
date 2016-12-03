<nav class="navbar-default navbar-static-top">
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            <?php if(Auth::guest()): ?>
                <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
            <?php endif; ?>
            <li>
                <a href="<?php echo e(url('/contact-us')); ?>">Contact us</a>
            </li>
            <li>
                <a href="<?php echo e(url('/')); ?>">Track order</a>
            </li>
            <?php if(!Auth::guest()): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <?php if(\Auth::user()->is_admin): ?>
                                <a href="<?php echo e(url('/admin')); ?>">
                                    Admin
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo e(url('/logout')); ?>"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <li>
                <a href="/checkout">
                    Basket (<span data-type="cart_items_count"><?php echo e($totalCartItems); ?></span>)
                </a>
            </li>
        </ul>
    </div>
</nav>