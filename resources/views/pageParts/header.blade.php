<style>
    .navbar-custom {
    background-color: #ff5500;
}
/* change the brand and text color */
.navbar-custom .navbar-brand,
.navbar-custom .navbar-text {
    color: rgba(255,255,255,.8);
}
/* change the link color */
.navbar-custom .navbar-nav .nav-link {
    color: rgba(255,255,255,.5);
}
/* change the color of active or hovered links */
.navbar-custom .nav-item.active .nav-link,
.navbar-custom .nav-item:hover .nav-link {
    color: #ffffff;
}
</style>
<nav class="navbar navbar-expand-md bg-primary navbar-dark"> 
        <!-- Brand --> 
        <a class="navbar-brand" href="/"> <img id="logo" alt="Logo" src="{{asset('svg/Osijek.svg')}}" width="100" height="100"> <span><b>FC Osijek</b></span> </a> 
        
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span> </button>
        
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" href="/about">about us</a> </li>
            <li class="nav-item"> <a class="nav-link" href="/categories">categories</a> </li>
            <li class="nav-item"> <a class="nav-link" href="/contact">contact</a> </li>
            <li class="nav-item"> <a class="nav-link" href="/employee">employees</a> </li>
            <li class="nav-item"> <a class="nav-link" href="/coach">coaches</a> </li>
            <li class="nav-item"> <a class="nav-link" href="/trainings">trainings</a> </li>
            <li class="nav-item"> <a class="nav-link" href="/login">login</a> </li>
          </ul>
        </div>
      </nav>