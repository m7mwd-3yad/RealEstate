  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar">
      <div class="sidebar-header">
          <a href="#" class="sidebar-brand">
              Noble<span>UI</span>
          </a>
          <div class="sidebar-toggler not-active">
              <span></span>
              <span></span>
              <span></span>
          </div>
      </div>
      <div class="sidebar-body">
          <ul class="nav">
              <li class="nav-item nav-category">Main</li>
              <li class="nav-item">
                  <a href="{{ route('admin.dashboard') }}" class="nav-link">
                      <i class="link-icon" data-feather="box"></i>
                      <span class="link-title">Dashboard</span>
                  </a>
              </li>
              <li class="nav-item nav-category">RealEsatat</li>


              <!-- Property Type Section -->
              @if (Auth::User()->can('type.menu'))


                  <li class="nav-item">

                      <a class="nav-link" data-bs-toggle="collapse" href="#propertyTypeSection" role="button"
                          aria-expanded="false" aria-controls="propertyTypeSection">
                          <i class="link-icon" data-feather="mail"></i>
                          <span class="link-title">Property Type</span>
                          <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>

                      <div class="collapse" id="propertyTypeSection">
                          <ul class="nav flex-column sub-menu">
                              @if (Auth::User()->can('all.type'))
                                  <li class="nav-item">
                                      <a href="{{ route('all.type') }}" class="nav-link">All Types</a>
                                  </li>
                              @endif
                              @if (Auth::User()->can('add.type'))
                                  <li class="nav-item">
                                      <a href="{{ route('add.type') }}" class="nav-link">Add Type</a>
                                  </li>
                              @endif
                          </ul>
                      </div>
                  </li>
              @endif
              <!-- Amenities Section -->
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#amenitiesSection" role="button"
                      aria-expanded="false" aria-controls="amenitiesSection">
                      <i class="link-icon" data-feather="mail"></i>
                      <span class="link-title">Amenities</span>
                      <i class="link-arrow" data-feather="chevron-down"></i>
                  </a>
                  <div class="collapse" id="amenitiesSection">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item">
                              <a href="{{ route('all.amenities') }}" class="nav-link">All Amenities</a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('add.amenities') }}" class="nav-link">Add Amenity</a>
                          </li>
                      </ul>
                  </div>
              </li>



              <li class="nav-item">
                  <a href="pages/apps/calendar.html" class="nav-link">
                      <i class="link-icon" data-feather="calendar"></i>
                      <span class="link-title">Calendar</span>
                  </a>
              </li>
              <li class="nav-item nav-category">Components</li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button"
                      aria-expanded="false" aria-controls="uiComponents">
                      <i class="link-icon" data-feather="feather"></i>
                      <span class="link-title">UI Kit</span>
                      <i class="link-arrow" data-feather="chevron-down"></i>
                  </a>
                  <div class="collapse" id="uiComponents">
                      <ul class="nav sub-menu">
                          <li class="nav-item">
                              <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                          </li>

                      </ul>
                  </div>
              </li>
              <li class="nav-item nav-category">Rule & Permission </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false"
                      aria-controls="advancedUI">
                      <i class="link-icon" data-feather="anchor"></i>
                      <span class="link-title">Rule & Permission</span>
                      <i class="link-arrow" data-feather="chevron-down"></i>
                  </a>
                  <div class="collapse" id="advancedUI">
                      <ul class="nav sub-menu">
                          <li class="nav-item">
                              <a href="{{ route('all.permission') }}" class="nav-link">All Permission</a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('all.role') }}" class="nav-link">All Roles</a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('add.role.permission') }}" class="nav-link">Role in Permission</a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('all.role.permission') }}" class="nav-link">All Role in Permission</a>
                          </li>

                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false"
                      aria-controls="admin">
                      <i class="link-icon" data-feather="anchor"></i>
                      <span class="link-title">Manage Admin User</span>
                      <i class="link-arrow" data-feather="chevron-down"></i>
                  </a>
                  <div class="collapse" id="admin">
                      <ul class="nav sub-menu">
                          <li class="nav-item">
                              <a href="{{ route('all.admin') }}" class="nav-link">All Admin</a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('add.admin') }}" class="nav-link">Add Admin</a>
                          </li>


                      </ul>
                  </div>
              </li>





              <li class="nav-item nav-category">Docs</li>
              <li class="nav-item">
                  <a href="#" target="_blank" class="nav-link">
                      <i class="link-icon" data-feather="hash"></i>
                      <span class="link-title">Documentation</span>
                  </a>
              </li>
          </ul>
      </div>
  </nav>
