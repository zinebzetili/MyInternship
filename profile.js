window.addEventListener('load', function() {
    var profileImage = document.getElementById('profile-image');

    profileImage.addEventListener('load', function() {
        fitImageIntoContainer(profileImage);
    });

    function fitImageIntoContainer(image) {
        var containerWidth = image.parentElement.offsetWidth;
        var containerHeight = image.parentElement.offsetHeight;
        var imageWidth = image.naturalWidth;
        var imageHeight = image.naturalHeight;

        var widthRatio = containerWidth / imageWidth;
        var heightRatio = containerHeight / imageHeight;

        var scaleRatio = Math.min(widthRatio, heightRatio);

        var scaledWidth = imageWidth * scaleRatio;
        var scaledHeight = imageHeight * scaleRatio;

        image.style.width = scaledWidth + 'px';
        image.style.height = scaledHeight + 'px';
    }
});