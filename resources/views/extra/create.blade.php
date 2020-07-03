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
                            <h2 class="pageheader-title">Meniu info juosta </h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}" class="breadcrumb-link">Pagrindinis</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('banners.index')}}" class="breadcrumb-link">Meniu info juosta</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Redagavimas</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
               
                    <div class="row">
                       
                        <!-- ============================================================== -->
                        <!-- input forma -->
                        <!-- ============================================================== -->
                       
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                   
                                </div>
                                <div class="card">
                                    <h5 class="card-header">{{ isset($menubanner) ? 'Redaguoti informacija' : 'Pridėti informacija'  }}</h5>
                                    <div class="card-body">
                                    
                                        <form action="{{ isset($menubanner) ? route('banners.update', $menubanner->id) : route('banners.store') }}" method="POST" enctype="multipart/form-data">
                                                                                                        
                                        @csrf
                                        @if(isset($menubanner))
                                        @method('PUT')
                                        @endif
                                            <div class="form-group">
                                                <label for="text" class="col-form-label">Info tekstas</label>
                                                <input id="text" name="text" value="{{ isset($menubanner) ? $menubanner->text  : ''   }}" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                
                                                <br>
                                                @if(isset($product))
                                                <img src="{{  asset("storage/$menubanner->icon")  }}" width="50px" heigh="50px">
                                                @endif
                                                </div>
                                                <div class="form-group">
                                                <label for="icon" class="col-form-label">Ikona</label>
                                                <input id="icon" name="icon"  type="file" class="form-control">
                                            </div>
                                        <button type="submit" class="btn btn-success btn-sm">Išsaugoti</button>
                                        </form>
                                      
                                    
                        <!-- ============================================================== -->
                        <!-- input forma baigiasi -->
                        <!-- ============================================================== -->
                  
                    
                        
                  
                 </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div> <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Testinė el. parduotuvė sukurta nuo nulio su Laravel.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                           
                        </div>
                    </div>
                </div>
            </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
   @include('inc.scripts')
   
</body>
 
</html>