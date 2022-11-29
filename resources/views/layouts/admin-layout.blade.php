<!DOCTYPE html>
<html lang="en">
@include('admin.fixed.head')

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper mt-5">
@include('admin.fixed.nav')


@yield('content')
    </div>
</div>
@include('admin.fixed.scripts')
</body>

</html>
