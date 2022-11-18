<!--Side Nav Bar Code Begins-->

      <!-- Sidebar -->
      <div id="sidebar-container" class="sidebar-expanded  d-md-block bg-dark" style="position:fixed ;">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group py-0">
          <!-- Separator with title -->
          <li class="sidebar-separator-title text-muted d-flex align-items-center mx-0 menu-collapsed" style="height:40px ;">
            <small class="mx-1">MAIN MENU</small>
          </li>
          <!-- /END Separator -->
          <!-- Menu with submenu -->
          <li>
            <a href="{{ route('home') }}"  class="bg-dark list-group-item list-group-item-action {{Request::is('home') ? 'active':''}}">
              <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="iconify fa-fw mx-1" data-icon="clarity:dashboard-line" data-width="30" data-height="30"></span>
                <span class="menu-collapsed">Dashboard</span>
              </div>
            </a>
          </li>

          <li>
            <a href="#" class="bg-dark list-group-item list-group-item-action {{Request::is('') ? 'active':''}}">
              <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="iconify fa-fw mx-1" data-icon="file-icons:microsoft-project" data-width="30" data-height="30"></span>
                  <span class="menu-collapsed">Projects</span>
              </div>
            </a>
          </li>

            <a href="#" class="bg-dark list-group-item list-group-item-action {{Request::is('') ? 'active':''}}">
              <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="iconify-inline fa-fw mx-1" data-icon="octicon:checklist-24" data-width="30" data-height="30"></span>
                <span class="menu-collapsed">Tasks</span>
              </div>
            </a>

            <a href="#" class="bg-dark list-group-item list-group-item-action {{Request::is('') ? 'active':''}}">
              <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="iconify faw-fw mx-1" data-icon="material-symbols:inventory-2-outline" data-width="20" data-height="20"></span>
                <span class="menu-collapsed">Inventory</span>
              </div>
            </a>

          <li>
            <a href="{{url('#submenu2')}}" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start {{Request::is('admin/*', 'tools/*') ? 'active':''}}">
              <div class="d-flex w-100 justify-content-start align-items-center">
                  <span class="iconify fa-fw mx-1" data-icon="codicon:tools" data-width="30" data-height="30"></span>
                   <span class="menu-collapsed">Tools</span>
                   <span class="submenu-icon ml-auto"></span>
               </div>
            </a>
          </li>
            <!-- Submenu content -->


            <div id='submenu2' class="collapse sidebar-submenu">
            <li>
                <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-dark text-white {{Request::is('admin/users') ? 'active':''}}">
                <span class="menu-collapsed text-align-center ">User Management</span>
                </a>
            </li>
              <a href="{{ route('assets.index') }}" class="list-group-item list-group-item-action bg-dark text-white {{Request::is('tools/assets') ? 'active':''}}">
                <span class="menu-collapsed">Asset Management</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white {{Request::is('') ? 'active':''}}">
                <span class="menu-collapsed">License Tracking</span>
              </a>
              <a href="{{ url('tools/permissions') }}" class="list-group-item list-group-item-action bg-dark text-white {{Request::is('tools/permissions') ? 'active':''}}">
                <span class="menu-collapsed">Permissions</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white {{Request::is('') ? 'active':''}}">
                <span class="menu-collapsed">Self Servicing</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white {{Request::is('') ? 'active':''}}">
                <span class="menu-collapsed">Issue Management</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white {{Request::is('') ? 'active':''}}">
                <span class="menu-collapsed">Procurement Management</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white {{Request::is('') ? 'active':''}}">
                <span class="menu-collapsed">Budget Management</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white {{Request::is('') ? 'active':''}}">
                <span class="menu-collapsed">Ticketing</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white {{Request::is('') ? 'active':''}} ">
                <span class="menu-collapsed">Labor Management</span>
              </a>
            </div>
            <a href="#" class="bg-dark list-group-item list-group-item-action {{Request::is('') ? 'active':''}}">
              <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="iconify fa-fw mx-1" data-icon="simple-line-icons:organization" data-width="30" data-height="30"></span>
                <span class="menu-collapsed">Organization </span>
              </div>
            </a>

            <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
              <div class="d-flex w-100 justify-content-start align-items-center">
                <span id="collapse-icon" class="fa fa-2x mx-1"></span>
                <span id="collapse-text" class="menu-collapsed">Collapse</span>
              </div>
            </a>
            <br><br>
            <br><br>
            <br><br>

        </ul>
         <!-- List Group END-->

    </div>

    <!-- Side Nav Bar Complete -->

<script>

$('#body-row .collapse').collapse('hide');

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left');

// Collapse click
$(document).ready(function(){
  $('[data-toggle=sidebar-colapse]').click(function() {
    SidebarCollapse();
  })
});


function SidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    $('#mainPage').toggleClass('mainPageCollapsed mainPageExpanded');



    // Treating d-flex/d-none on separators with title
    var SeparatorTitle = $('.sidebar-separator-title');
    if ( SeparatorTitle.hasClass('d-flex') ) {
        SeparatorTitle.removeClass('d-flex');
    } else {
        SeparatorTitle.addClass('d-flex');
    }

    // Collapse/Expand icon
    $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}

</script>
