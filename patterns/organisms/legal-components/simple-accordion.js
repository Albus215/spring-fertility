export default class SimpleAccordion {

    constructor() {
        this.selectorToggle = '[data-legal-accordion="toggle"]';
        this.selectorContent = '[data-legal-accordion="content"]';
        this.toggleClass = 'active';
        $('body').on('click', this.selectorToggle, this.onAccordionToggle.bind(this))
    }

    onAccordionToggle(event) {
        event.preventDefault();
        let accordionToggle = $( event.target );
        let accordionContent = accordionToggle.parent().find(this.selectorContent);
        accordionToggle.toggleClass(this.toggleClass);
        accordionContent.toggleClass(this.toggleClass);
        accordionContent.slideToggle();
    }
}
