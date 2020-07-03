<div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Meniu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{ route('admin.dashboard') }}" ><i class="fa fa-fw fa-user-circle"></i>Pagrindinis <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Užsakymai</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ route('orders.index') }}">Visi užsakymai <span class="badge badge-secondary">New</span></a>
                                        </li>
                                       
                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categories.index') }}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Kategorijos</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('categories.index') }}">Visos kategorijos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('categories.create')}}">+ Pridėti kategorija</a>
                                        </li>
                                       
                                     
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{  route('brands.index') }}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Prekės ženklai</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{  route('brands.index') }}">Visi prekės ženklai</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('brands.create') }}">+ Pridėti prekės ženklą</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products.index') }}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Produktai</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('products.index') }}">Visi produktai</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('products.create')}}">+ Pridėti produktą</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-divider">
                                Kita
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i>Vartotojai </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('user.index') }}">Visi vartotojai</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('subscribers.index') }}">Prenumeratoriai</a>
                                        </li>
                                        
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('shippings.index') }}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Pristatymas <span class="badge badge-secondary"></span></a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('shippings.index')}}">Visi pristatymo būdai</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('shippings.create')}}">+ Pridėti pristatymo būdą</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('banners.index')}}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>Papildomai</a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('banners.index')}}">Info mini juosta</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('afterSlider.index')}}">Kita informacija</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sliders.index') }}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-map-marker-alt"></i>Skaidrės</a>
                                <div id="submenu-9" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('sliders.index') }}">Skaidrės</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            
                    </div>
                </nav>
            </div>
        </div>