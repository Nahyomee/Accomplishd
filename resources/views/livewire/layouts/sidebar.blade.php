<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('index')}}">
          <img height="50px" src="{{asset('assets/img/logo-light.png')}}">
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item {{request()->is('dashboard')? 'active': ''}}">
          <a wire:navigate href="{{route('dashboard')}}" class="nav-link">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
          </a>
        </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>TASKS</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item">
          <a href="{{route('tasks.all', ['status' => 'upcoming'])}}" aria-expanded="false" class="nav-link">
            <i class="fe fe-corner-down-right fe-16"></i>
            <span class="ml-3 item-text">Upcoming</span>
            <span class="badge badge-pill badge-danger">{{$upcoming}}</span>
          </a>
        </li>
        <li class="nav-item w-100">
          <a class="nav-link" href="{{route('tasks.all', ['status' => 'today'])}}">
            <i class="fe fe-list fe-16"></i>
            <span class="ml-3 item-text">Today</span>
            <span class="badge badge-pill badge-primary">{{$today_task}}</span>
          </a>
        </li>
        <li class="nav-item">
            <a href="#" aria-expanded="false" class="nav-link">
              <i class="fe fe-calendar fe-16"></i>
              <span class="ml-3 item-text">Calendar</span>
            </a>
        </li>
        <li class="nav-item">
        <a href="#" aria-expanded="false" class="nav-link">
            <i class="fe fe-file fe-16"></i>
            <span class="ml-3 item-text">Sticky Wall</span>
        </a>
        </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>LISTS</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        @foreach ($lists as $list)
            <li class="nav-item ">
            <a href="{{route('category.tasks', ['category' => $list])}}" aria-expanded="false" class="nav-link">
                <i class="fe fe-square fe-16" style="color: {{$list->colour}}"></i>
                <span class="ml-3 item-text">{{$list->category}}</span>
            </a>
            </li>
        @endforeach
        <li class="nav-item">
            <a wire:navigate href="{{route('categories.create')}}" aria-expanded="false" class="nav-link {{request()->is('tag/create')? 'active': ''}}">
            <i class="fe fe-plus fe-16"></i>
            <span class="ml-3 item-text">Add New List </span>
            </a>
        </li>
        <li class="nav-item">
            <a wire:navigate href="{{route('categories.index')}}" aria-expanded="false" class="nav-link {{request()->is('tag/create')? 'active': ''}}">
            <i class="fe fe-grid fe-16"></i>
            <span class="ml-3 item-text">List </span>
            </a>
        </li>
      </ul>
      <p class="text-muted fw-bolder nav-heading mt-4 mb-1">
        <span style="font-weight: 500">TAGS</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        @foreach ($sideTags as $sidetag)
            <li class="nav-item ">
            <a href="{{route('tag.tasks', ['tag' => $sidetag])}}" aria-expanded="false" class="nav-link">
                <i class="fe fe-square fe-16" style="color: {{$sidetag->colour}}"></i>
                <span class="ml-3 item-text">{{$sidetag->tag}}</span>
            </a>
            </li>
        @endforeach
        <li class="nav-item">
            <a wire:navigate href="{{route('tags.create')}}" aria-expanded="false" class="nav-link {{request()->is('tag/create')? 'active': ''}}">
              <i class="fe fe-plus fe-16"></i>
              <span class="ml-3 item-text">Add New Tag </span>
            </a>
        </li>
        <li class="nav-item">
            <a wire:navigate href="{{route('tags.index')}}" aria-expanded="false" class="nav-link {{request()->is('tag/create')? 'active': ''}}">
              <i class="fe fe-grid fe-16"></i>
              <span class="ml-3 item-text">Tags </span>
            </a>
        </li>
      </ul>
    </nav>
  </aside>