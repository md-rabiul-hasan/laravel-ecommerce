    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('backend/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.min.js')}}"></script>
	@stack('js')
    <script src="{{ asset('backend/assets/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('backend/assets/js/plugins/pace.min.j')}}s"></script>
    <script src="{{ asset('backend/assets/js/cute-alert/cute-alert.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create( document.querySelector( '#editor1' ) );
        ClassicEditor.create( document.querySelector( '#editor2' ) );
        ClassicEditor.create( document.querySelector( '#editor3' ) );
</script>
   <script>
       function loaderStart() {
        $(".loader-bg").show();
    }

    function loaderEnd() {
        $(".loader-bg").hide();
    }

    function cuteError(title) {
        cuteAlert({
            type: "error",
            title: title,
            message: "",
            buttonText: "Okay"
        })
    }

    function cuteSuccess(title, path) {
        cuteAlert({
            type: "success",
            title: title,
            message: "",
            buttonText: "Okay"
        }).then((e) => {
            window.location.replace(path);
        });
    }

    function onlyCuteSuccess(title) {
        cuteAlert({
            type: "success",
            title: title,
            message: "",
            buttonText: "Okay",
            timer: 10000
        });

    }

    loaderEnd();

    function imagePreviewModal(image_src){
      $("#show-img").attr('src',image_src);
      $(".image-modal").modal('show');
    }
   </script>