

    
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin/dashboardAD" class="nav-link">Acceuil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link ">Front End</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashboard" class="nav-link ">Documentation</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
         
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">



          <div class="dropdown-divider"></div>
          <a href="{{route('admin.show',Auth::guard('admin')->user()->id)}}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/photo/profile/{{Auth::guard('admin')->user()->image}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                {{Auth::guard('admin')->user()->prenom}}{{" "}}{{Auth::guard('admin')->user()->name}}
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">{{Auth::guard('admin')->user()->email}} </p>
                <p class="text-sm text-muted"><i class="far fa-user mr-1"></i>Profile</p>
              </div>
            </div>
            <!-- Message End -->
          </a>

          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">

              <div class="media-body">

               <p> <i class="fas fa-user"></i>Verrouiller</p>
              </div>
            </div>
            <!-- Message End -->
          </a>

          <form method="POST" action="{{ route('admin.logout') }}"  >
            @csrf
          <a href="route('admin.logout')"  onclick="event.preventDefault();
          this.closest('form').submit();"class="dropdown-item">
            <!-- Message Start -->
            <div class="media">

              <div class="media-body">

               <p> <i class="fas fa-right-to-bracket"></i>
              
               Deconnecter</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          </form>

        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      

      {{-- Parametrage --}}

      <!-- Messages Dropdown Menu -->
      <?php 
          if(Auth::guard('admin')->user()->statut==1){

          
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-cog" aria-hidden="true"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" >
          <a href="/admin/Module" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">

              <div class="media-body">
                <h3 class="dropdown-item-title">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                  Gestion des modules

                </h3>


              </div>
            </div>
            <!-- Message End -->
          </a>

          <a href="/admin/groupe" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">

              <div class="media-body">
                <h3 class="dropdown-item-title">
                    <i class="fas fa-users mr-2"></i>
                  Gestion des groupes

                </h3>


              </div>
            </div>
            <!-- Message End -->
          </a>

          <a href="/admin/acces" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">

              <div class="media-body">
                <h3 class="dropdown-item-title">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                  Gestion d'accées

                </h3>


              </div>
            </div>
            <!-- Message End -->
          </a>

          <a href="/admin/Attribution" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">

              <div class="media-body">
                <h3 class="dropdown-item-title">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                  Gestion d'attribution

                </h3>


              </div>
            </div>
            <!-- Message End -->
          </a>


          <a href="/admin/utilisateurs" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">

              <div class="media-body">
                <h3 class="dropdown-item-title">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                  Gestion d'utilisateur

                </h3>


              </div>
            </div>
            <!-- Message End -->
          </a>







        </div>
      </li>
      <?php } ?>
      <!-- {{Auth::guard('admin')->user()->name}} -->
     
      <!-- Notifications Dropdown Menu -->
      {{-- parametrage --}}
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
         
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
        
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
