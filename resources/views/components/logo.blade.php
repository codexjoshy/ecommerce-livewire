@props(['showName'=> false])

<div class="d-flex align-items-center">
 <div style="width:60px;height:60px;">
  <a class="navbar-brand" href="/" style="width: 100%; height:100%;">
   <img src="{{ asset('assets/images/logo.png') }}" class="logo" style="width: 100%; height:100%; object-fit: cover">
  </a>
 </div>
 @if ($showName)
 <strong>JoshStore</strong>
 @endif
</div>