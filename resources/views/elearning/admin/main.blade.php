 @include('elearning.admin.partials.header')
    
    <div class="container-fluid">
      <div class="row">
        <!-- navbar -->
        @include('elearning.admin.partials.navbar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('contents')
        </main>
      </div>
    </div>
        
    
 @include('elearning.partials.footer')    
    
