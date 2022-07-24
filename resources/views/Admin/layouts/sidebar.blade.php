<header class="main-nav">
  
    <nav>
        <div class="main-navbar">
          
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                 
                  <br>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="user"></i><span>قائمه العملاء </span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('customers.index') }}"><span>العملاء</span> </a></li>
                           
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="file-text"></i><span>قائمه الاصناف</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('products.index') }}"><span>الاصناف</span></a></li>
                           
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                data-feather="layout"></i><span> المبيعات</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('invoices.index') }}"><span>اضافه فاتوره</span></a></li>
                     
                        </ul>
                    </li>
          
                  
                 
    </nav>
</header>