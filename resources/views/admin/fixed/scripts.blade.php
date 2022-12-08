<!-- base:js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{asset('admin-assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('admin-assets/js/off-canvas.js')}}"></script>
<script src="{{asset('admin-assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin-assets/js/template.js')}}"></script>
<script src="{{asset('admin-assets/js/settings.js')}}"></script>
<script src="{{asset('admin-assets/js/todolist.js')}}"></script>
<script>



    $('#product').change(function (){
        var id = $('#product').val();
        $.ajax({
            url: '/prices/create',
            method: 'GET',
            data: {id:id},
            success: function (res){
                console.log('success')
            },
            error: function (err){
                console.log(err)
            }
        })
    })
</script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->
