export default class JsEmbedVideoCover {
  constructor() {
    let embedVideoCover = $('[data-embed-video-cover]');
    if (embedVideoCover.length) {
      embedVideoCover.on('click', function (event) {
        let theCover = $(this);
        let theVideo = $(theCover.parent().find('[data-embed-video-script]').html());
        theVideo[0].src += "&autoplay=1";
        theVideo.insertBefore(theCover);
        theCover.fadeOut();
      });
    }
  }
}
