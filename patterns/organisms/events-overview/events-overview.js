export default class EventsOverview {
  constructor() {
    this.container = $('[data-eo-container]');

    this.form = $('[data-eo-filter]');
    this.formFieldCountry = $('[data-eo-filter-country]');
    this.formFieldType = $('[data-eo-filter-type]');

    this.btnLocation = $('[data-eo-filter-location]');

    this.groups = $('[data-eo-group]');
    this.events = $('[data-eo-event]');

    if (this.form.length && this.container.length) {

      this.locationsList = [];
      this.formFieldCountry.find('option[data-eo-filter-coords]').each((idx, el) => {
        let locatonElement = $(el);
        this.locationsList.push({
          name: locatonElement.attr('value'),
          lat: parseFloat(locatonElement.attr('data-eo-filter-coords').split('|')[0]),
          lng: parseFloat(locatonElement.attr('data-eo-filter-coords').split('|')[1]),
        });
      });

      this.form.on('submit', this.onFormSubmit.bind(this));
      this.btnLocation.on('click', this.onBtnLocationClick.bind(this));
      // this.filterEvents();
    }
  }

  onBtnLocationClick(e) {
    e.preventDefault();
    this.geolocationFilterEvents();
  }

  onFormSubmit(e) {
    e.preventDefault();
    this.filterEvents();
  }

  geolocationFilterEvents() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (pos) => {
          let userLat = pos.coords.latitude;
          let userLng = pos.coords.longitude;

          // let userLat = 38.9764495;
          // let userLng = -107.7940158;

          let closestLocation = this.geolocationFindClosest(userLat, userLng);

          this.formFieldCountry.val(closestLocation.name);
          this.formFieldCountry.trigger('change');
          this.filterEvents();

        },
        (failure) => {
          console.log('Geolocation Error');
        }
      );
    } else {
      console.log('User disalowed Geolocation');
    }
  }

  geolocationFindClosest(userLat, userLng) {
    let closestLocation = {};
    let minDistance = -1;
    let distance = 0;
    this.locationsList.forEach((location) => {
      distance = this.geolocationCalculateDitance(userLat, userLng, location.lat, location.lng);
      if (minDistance === -1 || distance < minDistance) {
        minDistance = distance;
        closestLocation = location;
      }
    });
    return closestLocation;
  }

  geolocationCalculateDitance(lat1, lon1, lat2, lon2) {
    let radlat1 = Math.PI * lat1 / 180;
    let radlat2 = Math.PI * lat2 / 180;
    let theta = lon1 - lon2;
    let radtheta = Math.PI * theta / 180;
    let dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
    if (dist > 1) dist = 1;
    dist = Math.acos(dist);
    dist = dist * 180 / Math.PI;
    dist = dist * 60 * 1.1515;
    return dist;
  }

  filterEvents() {
    let eType = this.formFieldType.val();
    let eCountry = this.formFieldCountry.val();

    this.container.slideUp(500, () => {

      this.groups.each((idx, el) => {
        let group = $(el);

        group.find('[data-eo-event]').removeClass('eo-element-show').hide();

        if (eType !== 'all' && eCountry !== 'all') {
          if (eType === 'virtual') {
            group.find('.o_eo__list-attr-type-' + eType).addClass('eo-element-show').show();
          } else {
            group.find('.o_eo__list-attr-type-' + eType + '.o_eo__list-attr-country-' + eCountry).addClass('eo-element-show').show();
          }
        } else if (eType !== 'all' && eCountry === 'all') {
          group.find('.o_eo__list-attr-type-' + eType).addClass('eo-element-show').show();
        } else if (eType === 'all' && eCountry !== 'all') {
          group.find('.o_eo__list-attr-country-' + eCountry + ', o_eo__list-attr-type-virtual').addClass('eo-element-show').show();
        } else {
          group.find('[data-eo-event]').addClass('eo-element-show').show();
        }

        if (group.find('[data-eo-event].eo-element-show').length) {
          group.show();
        } else {
          group.hide();
        }

      });

    });

    this.container.slideDown();

  }
}
