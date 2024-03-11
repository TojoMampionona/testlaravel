function checkFileSize(inputId, maxSize, errorId) {
    var input = document.querySelector("." + inputId);
    var files = input.files;
    var errorElement = document.getElementById(errorId);

    if (files.length > 0) {
        var fileSize = files[0].size;
        var maxSizeInBytes = maxSize * 1024;
        if (fileSize > maxSizeInBytes) {
            input.value = "";
            errorElement.textContent = "Image trop grande, taille max: 2048ko";
        }
    }
}

document.querySelector(".img_pdp").addEventListener("change", function () {
    checkFileSize("img_pdp", 2048, "img_pdp_error");
});
document.querySelector(".img_pdc").addEventListener("change", function () {
    checkFileSize("img_pdc", 2048, "img_pdc_error");
});
