$(document).ready(function (e) {
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#dropzone", {
        url: Routing.generate('upload_rest_upload'),
        maxFiles: 1
    });

    myDropzone.on("success", function (file, response) {
        var fileUrl = response.url;
        $("#pimterest_add_contribution_mediaUrl").val(fileUrl);
        file.previewElement.addEventListener("click", function () {
            myDropzone.removeFile(file);
            $("#pimterest_add_contribution_mediaUrl").val('');
        });
    });

    myDropzone.on("error", function (file) {
        myDropzone.removeFile(file);
    });
});
