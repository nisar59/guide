<header class="container py-3">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
      <div class="dropdown d-flex align-items-center col-lg-4">
        <a href="{{url('/')}}" class=" mb-2 mb-lg-0  text-decoration-none">
          <img src="{{url('public/img/settings/'.Settings()->portal_logo)}}" width="70" height="70">

        </a>          
        <a href="javascript:void(0)" class="dropdown-toggle link-dark" data-bs-toggle="dropdown" aria-expanded="false">
          	<i class="fa-sharp fa-solid fa-bars fa-2xl"></i>
          </a>
        <ul class="dropdown-menu text-small shadow" style="">
          @foreach(AllDevices() as $device)
          <li class="border-bottom"><a class="dropdown-item" href="{{url('guide/'.$device->slug)}}" aria-current="page">{{$device->name}}</a></li>
          @endforeach
        </ul>
      </div>
        <form class="w-100 me-3 d-flex align-items-center" role="search">
          <input type="search" id="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>
    </div>
  </header>