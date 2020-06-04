//image preview
$(".image").change(function() {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.image_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]); // convert to base64 string
    }

});