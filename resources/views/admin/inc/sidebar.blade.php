<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      {{-- Link section  --}}

      
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/all-link') || Request::is('admin/create-link')  ? '' : 'collapsed' }}" data-bs-target="#forms-nav-link" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Manage Link</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav-link" class="nav-content collapse  {{ Request::is('admin/all-link') || Request::is('admin/create-link')  ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('all_link') }}" class="{{ Request::is('admin/all-link') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>All Links</span>
            </a>
          </li>
          <li>
            <a href="{{ route('link_create') }}" class="{{ Request::is('admin/create-link')  ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Create Link</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      {{-- link section  --}}

      @if (Auth::user()->user_type == 'admin')
        
      <li class="nav-item">
        <a class="nav-link  {{ Request::is('admin/contacts')  ? '' : 'collapsed' }}" href="{{ route('contacts') }}">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      @endif

      

    </ul>

  </aside>