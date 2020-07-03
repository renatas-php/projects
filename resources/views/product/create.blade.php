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
                            <h2 class="pageheader-title">Visos prekės </h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="breadcrumb-link">Pagrindinis</a></li>
                                  
                                        <li class="breadcrumb-item active" aria-current="page">Visos prekės</li>
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
                                    
                                    @if($errors->any())
                                    @foreach($errors->all() as $error)
                                    <div class="alert alert-secondary" role="alert">{{  $error  }}</div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="card">
                                    <h5 class="card-header">{{  isset($product) ? 'Redaguoti produkto informacija' : 'Pridėti produktą' }}</h5>
                                    <div class="card-body">
                                    
                                        <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store')  }}"  method="POST" enctype="multipart/form-data">
                                                                                                        
                                        @csrf
                                        @if(isset($product))
                                        @method('PUT')
                                        @endif
                                       
                                            <div class="form-group">
                                                <label for="name" class="col-form-label">Produkto pavadinimas</label>
                                                <input id="name" name="name" value="{{  isset($product) ? $product->name : ''  }}" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                            <label id="description">Aprašymas</label>
                                            <textarea name="description" class="form-control" rows="7" cols="7">{{  isset($product) ? $product->description : ''  }}</textarea>
                                            
                                            </div>
                                            <div class="form-group">
                                            <label id="price">Kaina</label>
                                            <input type="text" name="price" value="{{  isset($product) ? $product->price : '' }}"class="form-control">
                                            
                                            </div>
                                            <div class="form-group">
                                                <label for="category" class="col-form-label">Kategorija</label>
                                                <div class="input-group mb-3">
                                            <select class="custom-select" name="category" id="category">
                                            @foreach($categories as $category)
                                                <option value="{{  $category->id  }}"
                                                @if(isset($product))
                                                @if($category->id == $product->category->id)
                                                selected
                                                @endif
                                                @endif
                                               
                                                
                                                >{{  $category->name  }}</option>
                                               
                                                @endforeach
                                            </select>
                                            
                                            </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label for="brand" class="col-form-label">Prekės ženklas</label>
                                            <div class="input-group mb-3">
                                           
                                            <select class="custom-select" name="brand" id="brand">
                                                @foreach($brands as $brand)
                                                
                                                <option value="{{  $brand->id  }}"
                                                @if(isset($product))
                                                @if($brand->id == $product->brand->id)
                                                selected
                                                @endif
                                                @endif
                                                > {{    $brand->name    }}</option>
                                                @endforeach
                                            </select>
                                            
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                
                                                <br>
                                                @if(isset($product))
                                                <img src="{{  asset("storage/$product->image")  }}" width="150px" heigh="150px">
                                                @endif
                                                </div>
                                                <div class="form-group">
                                                <label for="image" class="col-form-label">Produkto nuotrauka</label>
                                                <input id="image" name="image"  type="file" class="form-control">
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