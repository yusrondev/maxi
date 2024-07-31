@include('admin.layouts.header')    
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{ url('/dashboard') }}" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img style="width:130px" src="{{ asset('/assets/image_content/logo.jpg') }}">
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

            @include('admin.layouts.cms.menuCms')
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          
        <!-- Navbar -->
        @include('admin.layouts.navbar')