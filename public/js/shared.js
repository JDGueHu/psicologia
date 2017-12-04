var autocomplete;
var componentForm = {
locality: 'long_name',
administrative_area_level_1: 'short_name',
country: 'long_name',
};

function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('ciudad')),
        {types: ['geocode']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);

}

function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];

      if (place.address_components[i].types[0] == 'locality') {          
            document.getElementById('ciudad').value = place.address_components[i].long_name;
        } else if (place.address_components[i].types[0] == 'administrative_area_level_1') {
            document.getElementById('departamento').value = place.address_components[i].long_name;
        } else if (place.address_components[i].types[0] == 'country') {
            document.getElementById('pais').value = place.address_components[i].long_name;
        }

    }
}