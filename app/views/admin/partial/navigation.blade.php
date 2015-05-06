<?php //echo Request::segment(2); ?>

<div class="col-sm-3 col-md-2 sidebar"> 
    <ul class="nav nav-sidebar">
        <li class="tophead">{{ HTML::link('admin/user/members', 'Users') }}</li>
    </ul>
    <ul class="nav nav-sidebar">
        @if (Request::segment(2) === 'user')
            @if(Auth::user()->user_type === 'Manager' || Auth::user()->user_type === 'ADMIN' )
                <li <?php echo (Request::segment(3) === 'members')? 'class="active"' : 'class=""' ; ?>>{{ HTML::link('admin/user/members', 'Members') }}</li>
            @endif 
        @endif
    </ul>

    <ul class="nav nav-sidebar">
        <li class="head">{{ HTML::link('logout', 'Logout') }}</li>
    </ul>
</div>