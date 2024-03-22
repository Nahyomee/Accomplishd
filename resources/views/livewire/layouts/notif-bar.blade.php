<li wire:poll.15s  class="nav-item nav-notif dropdown dropdown-list-toggle">
    <a href="#" data-toggle="dropdown" class="nav-link text-muted my-2">
      <i class="fe fe-bell fe-16"></i>
      <span class="{{count($notifications) > 0 ? 'dot dot-md bg-success': ''}}"></span>
    </a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Notifications
          <div class="float-right">
            <span class="text-primary" wire:click='markAsRead'>Mark All As Read</span>
          </div>
        </div>
        <div class="dropdown-list-content dropdown-list-icons"  style="overflow-y: scroll">
            @forelse ($notifications as $notification)
            <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-primary text-white">
                  <i class="fe fe-list"></i>
                </div>
                <div class="dropdown-item-desc">
                  <h6>{{$notification->data['title']}}</h6>
                  <span>{{$notification->data['description']}}</span>
                  <div class="time text-muted">{{$notification->created_at->diffForHumans()}}</div>
                </div>
              </a>
            @empty
            <div class="text-center">
                No Notifications
            </div>
                
            @endforelse
        </div>
        <div class="dropdown-footer text-center">
          <a href="#">View All <i class="fe fe-chevron-right"></i></a>
        </div>
      </div>
  </li>
