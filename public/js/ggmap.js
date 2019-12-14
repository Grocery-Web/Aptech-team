var latglob, lngglob;
// Initialize and add the map
function initMap() {
    var location = "75-81 Stirling Rd, Acton, London 8DJ, United Kingdom";
    axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
        params: {
            address: location,
            key: 'AIzaSyACeIxi113HPQEQ8bNnmnnxx_ICDkKpCuQ'
        }
    })
        .then(function (response) {
            // Log full response
            // Formatted Address
            var formattedAddress = response.data.results[0].formatted_address;
            // Address Components
            var addressComponents = response.data.results[0].address_components;
            // Geometry
            latglob = response.data.results[0].geometry.location.lat;
            lngglob = response.data.results[0].geometry.location.lng;

            var uluru = {
                lat: latglob,
                lng: lngglob
            };
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {
                zoom: 15,
                center: uluru
            });
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        })
        .catch(function (error) {
            console.log(error);
        });
}
