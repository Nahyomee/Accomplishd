<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <link rel="icon" href="{{asset('assets/img/logo-light.png')}}">
    <title>Accomplishd - {{$title ?? 'Dashboard'}}</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/select2.css')}}">

    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{asset('backend/css/app-dark.css')}}" id="darkTheme" disabled>
    <style>
      .dropdown-item.has-icon i {
      margin-top: -1px;
      font-size: 13px; }

    .dropdown-menu {
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.03);
      border: none;
      width: 200px; }
      .dropdown-menu.show {
        display: block !important; }
      .dropdown-menu a {
        font-size: 13px; }
      .dropdown-menu .dropdown-title {
        text-transform: uppercase;
        font-size: 10px;
        letter-spacing: 1.5px;
        font-weight: 700;
        color: #191d21 !important;
        padding: 10px 20px;
        line-height: 20px;
        color: #98a6ad; }
      .dropdown-menu.dropdown-menu-sm a {
        font-size: 14px;
        letter-spacing: normal;
        padding: 10px 20px;
        color: #6c757d; }

    a.dropdown-item {
      padding: 10px 20px;
      font-weight: 500;
      line-height: 1.2; }
      a.dropdown-item:focus, a.dropdown-item:active, a.dropdown-item.active {
        background-color: #6777ef;
        color: #fff !important; }

    .dropdown-divider {
      border-top-color: #f9f9f9; }

    .dropdown-list {
      width: 350px;
      padding: 0; }
      .dropdown-list .dropdown-item {
        display: inline-block;
        width: 100%;
        padding-top: 15px;
        padding-bottom: 15px;
        font-size: 13px;
        border-bottom: 1px solid #f9f9f9; }
        .dropdown-list .dropdown-item.dropdown-item-header:hover {
          background-color: transparent; }
        .dropdown-list .dropdown-item .time {
          margin-top: 10px;
          font-weight: 600;
          text-transform: uppercase;
          font-size: 10px;
          letter-spacing: .5px; }
        .dropdown-list .dropdown-item .dropdown-item-avatar {
          float: left;
          width: 40px;
          text-align: right;
          position: relative; }
          .dropdown-list .dropdown-item .dropdown-item-avatar img {
            width: 100%; }
          .dropdown-list .dropdown-item .dropdown-item-avatar .is-online {
            position: absolute;
            bottom: 0;
            right: 0; }
        .dropdown-list .dropdown-item .dropdown-item-desc {
          line-height: 24px;
          white-space: normal;
          color: #34395e;
          margin-left: 60px; }
          .dropdown-list .dropdown-item .dropdown-item-desc b {
            font-weight: 600;
            color: #666; }
          .dropdown-list .dropdown-item .dropdown-item-desc p {
            margin-bottom: 0; }
        .dropdown-list .dropdown-item:focus {
          background-color: #6777ef; }
          .dropdown-list .dropdown-item:focus .dropdown-item-desc {
            color: #fff !important; }
            .dropdown-list .dropdown-item:focus .dropdown-item-desc b {
              color: #fff !important; }
        .dropdown-list .dropdown-item.dropdown-item-unread:active .dropdown-item-desc {
          color: #6c757d; }
          .dropdown-list .dropdown-item.dropdown-item-unread:active .dropdown-item-desc b {
            color: #6c757d; }
        .dropdown-list .dropdown-item:active .dropdown-item-desc {
          color: #fff; }
          .dropdown-list .dropdown-item:active .dropdown-item-desc b {
            color: #fff; }
        .dropdown-list .dropdown-item.dropdown-item-unread {
          background-color: #fbfbfb;
          border-bottom-color: #f2f2f2; }
          .dropdown-list .dropdown-item.dropdown-item-unread:focus .dropdown-item-desc {
            color: #6c757d !important; }
            .dropdown-list .dropdown-item.dropdown-item-unread:focus .dropdown-item-desc b {
              color: #6c757d !important; }
      .dropdown-list .dropdown-footer,
      .dropdown-list .dropdown-header {
        letter-spacing: .5px;
        font-weight: 600;
        padding: 15px; }
        .dropdown-list .dropdown-footer a,
        .dropdown-list .dropdown-header a {
          font-weight: 600; }
      .dropdown-list .dropdown-list-content {
        height: 350px;
        overflow: hidden; }
        .dropdown-list .dropdown-list-content:not(.is-end):after {
          content: ' ';
          position: absolute;
          bottom: 46px;
          left: 0;
          width: 100%;
          background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.8));
          height: 60px; }
      .dropdown-list .dropdown-list-icons .dropdown-item {
        display: flex; }
        .dropdown-list .dropdown-list-icons .dropdown-item .dropdown-item-icon {
          flex-shrink: 0;
          border-radius: 50%;
          width: 40px;
          height: 40px;
          line-height: 42px;
          text-align: center; }
          .dropdown-list .dropdown-list-icons .dropdown-item .dropdown-item-icon i {
            margin: 0; }
        .dropdown-list .dropdown-list-icons .dropdown-item .dropdown-item-desc {
          margin-left: 15px;
          line-height: 20px; }
          .dropdown-list .dropdown-list-icons .dropdown-item .dropdown-item-desc .time {
            margin-top: 5px; }

    .dropdown-flag .dropdown-item {
      font-weight: 600; }
      .dropdown-flag .dropdown-item .flag-icon {
        width: 20px;
        height: 13px;
        margin-right: 7px;
        margin-top: -6px; }
      .dropdown-flag .dropdown-item.active {
        background-color: #6777ef;
        color: #fff; }

    @media (max-width: 575.98px) {
      .dropdown-list-toggle {
        position: static; }
        .dropdown-list-toggle .dropdown-list {
          left: 10px !important;
          width: calc(100% - 20px); } }
    /* 3.20 Dropdown */
</style>
    @stack('styles')
    @livewireScripts
    @livewireStyles
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
          <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
              <i class="fe fe-sun fe-16"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
              <span class="fe fe-grid fe-16"></span>
            </a>
          </li>
      <livewire:layouts.notifbar />
         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="{{auth()->user()->thumbnail}}" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{route('profile')}}" wire:navigate>Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
             <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();  
              document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" method="POST" action="{{ route('logout') }}" >
                @csrf
            </form> 
            </div>
          </li>
        </ul>
      </nav>
    
      <livewire:layouts.sidebar />
      <main role="main" class="main-content">
        <div class="container-fluid">
          <p class="alert alert-warning" wire:offline>
            Whoops, your device has lost connection. The web page you are viewing is offline.
        </p>
          {{$slot}}
          <!-- .row -->
        </div> <!-- .container-fluid -->
        {{-- Shortcuts --}}
        {{-- <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('backend/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/js/moment.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/simplebar.min.js')}}"></script>
    <script src="{{asset('backend/js/daterangepicker.js')}}"></script>
    <script src="{{asset('backend/js/jquery.stickOnScroll.js')}}"></script>
    <script src="{{asset('backend/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('backend/js/select2.min.js')}}"></script>
    <script src="{{asset('backend/js/config.js')}}"></script>
    <script src="{{asset('backend/js/d3.min.js')}}"></script>
    <script src="{{asset('backend/js/apps.js')}}"></script>
    <script src="https://kit.fontawesome.com/faa41a2bb3.js" crossorigin="anonymous"></script>
    @auth
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script type="module" src="{{asset('firebase.js')}}"></script>
      
    @endauth
    <script>
      $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
      $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
    </script>
    @stack('scripts')
  </body>
</html>