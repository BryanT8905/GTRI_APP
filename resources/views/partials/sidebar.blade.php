<!--Side Nav Bar Code Begins-->
<div  id="body-row" style="position:fixed;">
      <!-- Sidebar -->
      <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
          <!-- Separator with title -->
          <li class="sidebar-separator-title text-muted d-flex align-items-center mx-2 menu-collapsed">
            <small>MAIN MENU</small>
          </li>
          <!-- /END Separator -->
          <!-- Menu with submenu -->
            <a href="{{ route('home') }}" class="bg-dark list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="iconify fa-fw mx-1" data-icon="clarity:dashboard-line" data-width="30" data-height="30"></span>
                <span class="menu-collapsed">Dashboard</span>
              </div>
            </a>

            <a href="#" class="bg-dark list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="iconify fa-fw mx-1" data-icon="file-icons:microsoft-project" data-width="30" data-height="30"></span>
                  <span class="menu-collapsed">Projects</span>
              </div>
            </a>


            <a href="#" class="bg-dark list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="iconify-inline fa-fw mx-1" data-icon="octicon:checklist-24" data-width="30" data-height="30"></span>
                <span class="menu-collapsed">Tasks</span>
              </div>
            </a>

            <a href="#" class="bg-dark list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="iconify faw-fw mx-1" data-icon="material-symbols:inventory-2-outline" data-width="20" data-height="20"></span>
                <span class="menu-collapsed">Inventory</span>
              </div>
            </a>

            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-start align-items-center">
                  <span class="iconify fa-fw mx-1" data-icon="codicon:tools" data-width="30" data-height="30"></span>
                   <span class="menu-collapsed">Tools</span>
                   <span class="submenu-icon ml-auto"></span>
               </div>
            </a>
            <!-- Submenu content -->

           
            <div id='submenu2' class="collapse sidebar-submenu">
              @can('isAdmin')
                <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed text-align-center">User Management</span>
                </a>
              @endcan
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed">License Tracking</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed">Asset Tracking</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed">Self Servicing</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed">Issue Management</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed">Procurement Management</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed">Budget Management</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed">Ticketing</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <span class="menu-collapsed">Labor Management</span>
              </a>
            </div>
            <a href="#" class="bg-dark list-group-item list-group-item-action">
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

        </ul>
         <!-- List Group END-->
      </div>
    </div>
    <!-- Side Nav Bar Complete -->

<script>
$('#body-row .collapse').collapse('hide');

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left');

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
    SidebarCollapse();
});

function SidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    $('#mainPage').toggleClass('mainPageCollapsed mainPageExpanded');
    $('#indexPage').toggleClass('indexPageCollapsed indexPageExpanded');


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

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("body-row").style.top = "0";
  } else {
    document.getElementById("body-row").style.top = "-50px";
  }
}
</script>
