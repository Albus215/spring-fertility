import HideExtraMenu from '../molecules/navigation/extra-menu';
import ShowExtraMenu from '../molecules/navigation/more-nav';

import HeroVideoModal from '../molecules/inside-video-hero/inside-video-hero';

export default () => {
    new HideExtraMenu($('.extramenu-close'));
    new ShowExtraMenu($('.extramenu-open'));

    new HeroVideoModal($('.hero-btn'));

};