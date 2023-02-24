const primaryInput = document.getElementById("fileInput");
const primaryPreview = document.getElementById("previewImage");
const primaryIcon = document.getElementById("icon");

primaryInput.addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.addEventListener("load", function() {
            primaryPreview.style.display = "block";
            primaryPreview.setAttribute("src", this.result);
            primaryIcon.style.display = "none";
        });
        reader.readAsDataURL(file);
    } else {
        primaryPreview.style.display = "none";
        primaryPreview.setAttribute("src", "#");
        primaryIcon.style.display = "block";
    }
});

const secondaryInputs = document.querySelectorAll(".secondary-image-wrapper input[type=file]");
const secondaryPreviews = document.querySelectorAll(".secondary-image-wrapper .previewImage");
const secondaryIcons = document.querySelectorAll(".secondary-image-wrapper img:not(.previewImage)");

secondaryInputs.forEach(function(input, index) {
    input.addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.addEventListener("load", function() {
                secondaryPreviews[index].style.display = "block";
                secondaryPreviews[index].setAttribute("src", this.result);
                secondaryIcons[index].style.display = "none";
            });
            reader.readAsDataURL(file);
        } else {
            secondaryPreviews[index].style.display = "none";
            secondaryPreviews[index].setAttribute("src", "#");
            secondaryIcons[index].style.display = "block";
        }
    });
});
