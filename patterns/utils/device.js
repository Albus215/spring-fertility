export const MOBILE_SIZE = 768;
export const TABLET_SIZE = 1024;
export const DESKTOP_SIZE = 1280;
export const WIDE_SIZE = 1920;

module.exports = () => {

  return {
    MOBILE_SIZE:MOBILE_SIZE,
    TABLET_SIZE:TABLET_SIZE,
    DESKTOP_SIZE:DESKTOP_SIZE,
    WIDE_SIZE:WIDE_SIZE,
    isMobile() {
      return ( window.innerWidth <= MOBILE_SIZE );
    },
    isTablet() {
      return ( window.innerWidth <= TABLET_SIZE );
    },
    isDesktop() {
      return ( window.innerWidth <= DESKTOP_SIZE );
    },
    isWide() {
      return ( window.innerWidth <= WIDE_SIZE );
    }
  };
};

