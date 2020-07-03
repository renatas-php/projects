<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    @include('inc.titledashboard')
    <!-- Bootstrap CSS -->
    @include('inc.css')

    
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Valdymo panelė</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Paieška">
                            </div>
                        </li>
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title">Pranešimai</div>
                                    <div class="notification-list">
                                        <div class="list-group">@foreach($ordersNote as $orderNote)
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">{{ $orderNote->bil_name}}</span>{{ $orderNote->total_price }}.00 eur
                                                        <div class="notification-date">{{ $orderNote->created_at }}</div>
                                                        <div class="notification-date">Užsakymo būsena: {{ $orderNote->status }}</div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </a>@endforeach
                                            
                                            
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="{{ route('orders.index')}}">Visi užsakymai</a></div>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user mr-2"></i></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">@foreach($admin as $admi)
                                @endforeach
                                    <h5 class="mb-0 text-white nav-user-name">{{ $admi->email }}</h5>
                                    <span class="status"></span><span class="ml-2">Prisijunges</span>
                                </div>
                               
                   
                                <a class="dropdown-item" href="{{ route('/') }}"><i class="fas fa-power-off mr-2"></i>Į parduotuvę</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        @include('inc.leftbar')
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">El. parduotuvės valdymo panelė</h2>
                                <p class="pageheader-text"></p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Valdymo panelė</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">El. parduotuvės valdymo panelė</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">@foreach($orders as $order)
                                @endforeach
                               
                                    <div class="card-body">
                                        <h5 class="text-muted">Viso užsakyta už:</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">€{{ $order->sum('total_price') }}</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                            <span>-2.00%</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue4"></div>
                                </div>
                            </div>
                                    
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Naujienlaiškį prenumeruoja</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{ $subscribers->count() }}</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue2"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Prekių kiekis</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{ $products->count() }}</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            <span>VNT.</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue3"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                <div class="card-body">
                                        <h5 class="text-muted">Registruotų vartotojų</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{ $users->count() }}</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Naujausi užsakymai</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Numeris</th>
                                                        <th class="border-0">Data</th>
                                                        <th class="border-0">Kliento vardas</th>
                                                       
                                                        <th class="border-0">Suma</th>
                                                        <th class="border-0">Pristatymo būdas</th>
                                                        <th class="border-0">Statusas</th>
                                                        <th class="border-0">Veiksmas</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>@foreach($orders as $order)
                                                        <td>{{ $order->id }}</td>
                                                        <td>
                                                            {{ $order->created_at}}
                                                        </td>
                                                        <td>{{ $order->bil_name }} </td>
                                                        
                                                        <td>{{ $order->total_price}}.00 Eur</td>
                                                        <td>{{ $order->shipping}}</td>
                                                        <td><form action="{{ route ('orders.update', $order->id) }}" method="POST">
                            @csrf 
                            @method('PATCH')
                                
                                
                                
                                 <select class="btn btn-lg btn-outline-light" name="status" data-id="">
                                    <option {{ $order->status == 'Vykdomas' ? 'selected' : ''}} >Vykdomas</option>
                                    <option {{ $order->status == 'Išsiųstas' ? 'selected' : '' }} >Išsiųstas</option>
                                    <option {{ $order->status == 'Pristatytas' ? 'selected' : '' }} >Pristatytas</option>
                                    <option {{ $order->status == 'Sustabdytas' ? 'selected' : '' }}>Sustabdytas</option>
                                    
                                    </select>
                                    <button type="submit" class="btn  btn-outline-light float-right">Atnaujinti</button>
                                     
                       
                                
                               
                        </form>
                        </td>
                                                        <td><a href="{{ route('orders.show', $order->id ) }}" class="btn btn-outline-light float-right">Peržiurėti</a></td>
                                                       
                                                    </tr>@endforeach
                                                    <tr>
                                                       
                                                       
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

    
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->
                           
                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            <!-- ============================================================== -->
                        </div>
                        
                            <!-- ============================================================== -->
                            <!-- end product category  -->
                                   <!-- product sales  -->
                            <!-- ============================================================== -->
                           
                            <!-- ============================================================== -->
                            <!-- end product sales  -->
                            <!-- ============================================================== -->
                            
                                <!-- ============================================================== -->
                                <!-- end top perfomimg  -->
                           

                       
                            <!-- ============================================================== -->
                            <!-- end sales traffice source  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- sales traffic country source  -->
                            <!-- ============================================================== -->
                          
                            <!-- ============================================================== -->
                            <!-- end sales traffice country source  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                           <p class="text-right">Testinė el. parduotuvė sukurta nuo nulio su Laravel.</p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
@include('inc.scripts')
</body>
 
</html>