<div class="header ">

<a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar">
</a>

<div class="">
<div class="brand inline   ">
<a href="/"><img src="{{ asset('/assets/img/logo.png') }}" alt="logo" data-src="{{ asset('/assets/img/logo.png') }}" data-src-retina="{{ asset('/assets/img/logo_2x.png') }}" width="78" height="22"></a>
</div>
<a href="#" class="search-link d-lg-inline-block d-none" data-toggle="search"><i class="pg-search"></i>Type anywhere to <span class="bold">search</span></a>
</div>
<div class="d-flex align-items-center">

<div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none">
<span class="semi-bold">{{ Auth::user()->name }}</span>
</div>
<div class="dropdown pull-right d-lg-block d-none">
<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="thumbnail-wrapper d32 circular inline">
<img src="{{ asset('/assets/img/profiles/avatar.jpg') }}" alt="" data-src="{{ asset('/assets/img/profiles/avatar.jpg') }}" data-src-retina="{{ asset('/assets/img/profiles/avatar_small2x.jpg') }}" width="32" height="32">
</span>
</button>
<div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
{{-- <a href="#" class="dropdown-item"><i class="pg-settings_small"></i> Settings</a>
<a href="#" class="dropdown-item"><i class="pg-outdent"></i> Feedback</a>
<a href="#" class="dropdown-item"><i class="pg-signals"></i> Help</a> --}}
<a href="#" class="clearfix bg-master-lighter dropdown-item">
    <a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
     {{ __('Logout') }}<span class="pull-right"><i class="pg-power"></i></span>
 </a>

 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     @csrf
 </form>
</a>
</div>
</div>

</div>
</div>
