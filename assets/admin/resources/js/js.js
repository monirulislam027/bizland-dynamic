function imagePreview(file, targetBlock) {

    if (file.files && file.files[0]) {

        const reader = new FileReader();
        reader.onload = function (event) {
            document.querySelector(targetBlock).setAttribute('src' , event.target.result )
        }
        reader.readAsDataURL(file.files[0]);

    }

}