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
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Individualus užsakymas</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="breadcrumb-link">Pagrindinis</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('orders.index') }}" class="breadcrumb-link">Visi užsakymai</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Individualus užsakymas</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
               
                   
                      
                       
                               <!-- ============================================================== -->
                        <!-- striped table -->
                        <!-- ============================================================== -->
                        <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">
                                     <a class="pt-2 d-inline-block btn btn-sm btn-info" href="{{ route('orders.index') }}">Atgal</a>
                                   
                                    <div class="float-right"> <h3 class="mb-0">Užsakymo id: {{ $order->id }}</h3>
                                   Užsakymo data: {{ $order->created_at->format('Y/m/d') }}</div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                       
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">Kliento informacija: </h5>
                                            <h3 class="text-dark mb-1">Vardas: {{ $order->bil_name }}</h3>                                            
                                            <div>Adresas: {{ $order->bil_adress}}</div>
                                            <div>Miestas: {{ $order->bil_city}}</div>
                                            <div>El. paštas: {{ $order->bil_email }}</div>
                                            <div>Tel: {{ $order->bil_phone }}</div>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">Nr.</th>
                                                    <th>Pavadinimas</th>
                                                    <th>Nuotrauka</th>
                                                    <th class="right">Kaina</th>
                                                    <th class="center">Kiekis</th>
                                                    <th class="right">Iš viso:</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>@foreach($orderProducts as $product)
                                                    <td class="center">{{$product->order_id}}</td>
                                                    <td class="left strong">{{ $product->product_name}}</td>
                                                    <td class="left"><img src="{{ asset("/storage/$product->product_img")}}" width="50px" height="50px"></td>
                                                    <td class="right">{{ $product->product_price}} Eur</td>
                                                    <td class="center">{{ $product->qty }}</td>
                                                    <td class="right">{{ $totalP = $product->qty * $product->product_price}} Eur</td>
                                                </tr>@endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">
                                        </div>
                                        <div class="col-lg-4 col-sm-5 ml-auto">
                                            <table class="table table-clear">
                                                <tbody>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Suma</strong>
                                                        </td>
                                                        <td class="right">{{ $order->total_price - $order->ship_price}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">{{$order->shipping}}</strong>
                                                        </td>
                                                        <td class="right">{{ $order->ship_price }} Eur</td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Bendra suma</strong>
                                                        </td>
                                                        <td class="right">
                                                            <strong class="text-dark">{{$order->total_price}} Eur</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <p class="mb-0">Pardavėjo rekvizitai</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <!-- ============================================================== -->
                        <!-- end striped table -->
                        <!-- ============================================================== -->
                  
                    
                        
                  
                 </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                       <p class="text-right"> Testinė el. parduotuvė sukurta nuo nulio su Laravel. </p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
   @include('inc.scripts')
   <script>
   function handleDelete(id){
    var form = document.getElementById('deleteCategoryForm')
    form.action = '/categories/' + id
    $('#deleteModal').modal('show')
   }
   
   </script>

</body>
 
</html>