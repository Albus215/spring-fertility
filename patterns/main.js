import ready from './utils/ready';
import organisms from './organisms/index';
import molecules from './molecules/index';



/**
 * Function that is fired once the page is Reaady to fire any JS, add anything
 * required to be executed after the page is ready.
 */
function onReady() {
    window.fu = window.fu || {};
    organisms();
    molecules();
}

// The callback is fired when the dom is ready.
ready(onReady);