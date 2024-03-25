/**
 * If the URL has a hashtag then it opens the collapsed section.
 */
export default function knowledgeFaqHashtag() {
  const $mainSection = $( '.js-knowledge-faq-content' );

  if ( !$mainSection.length ) {
    return;
  }

  const hash = window.location.hash;

  if ( hash ) {
    $( `${hash} a` ).trigger( 'click' );
  }
}