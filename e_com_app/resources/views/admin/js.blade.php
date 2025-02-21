<script type="text/javascript">
    function confirmation(ev)
    {
        // Prevent the default action (i.e., following the link)
        ev.preventDefault();

        // Get the URL for the delete action
        var urlToRedirect = ev.currentTarget.getAttribute('href');

        // Log the URL to the console for debugging
        console.log(urlToRedirect);

        // Show the confirmation dialog
        swal({
            title: "Are you sure you want to delete this?",
            text: "This delete will be permanent.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            // If the user confirms, redirect to the URL (perform deletion)
            if (willDelete) {
                window.location.href = urlToRedirect;
            }
        });
    }
</script>

<!-- JavaScript files-->
<script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
<script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
<script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('admincss/js/charts-home.js')}}"></script>
<script src="{{asset('admincss/js/front.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
