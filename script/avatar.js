const previewAvatar = (event) => {
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;

    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const avatarPreviewElement = document.querySelector("#preview-selected-avatar");
        avatarPreviewElement.src = imageSrc;
        avatarPreviewElement.style.display = "block";
    }
};