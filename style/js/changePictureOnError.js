$(window).load(function() {
    $('img').each(function() {
        if (!this.complete || typeof this.naturalWidth == "undefined" || this.naturalWidth == 0) {
            // image was broken, replace with your new image
            this.src = '/larsenUTC/style/img/user-default.png';
        }
    });
});