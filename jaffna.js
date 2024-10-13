// Mobile menu toggle functionality
document.getElementById('mobile-menu').addEventListener('click', function() {
    const nav = document.querySelector('.navbar ul');
    nav.classList.toggle('active');
});
// Initialize Google Map
function initMap() {
    var jaffna = {lat: 9.6615, lng: 80.0255}; // Coordinates for University of Jaffna
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: jaffna
    });
    var marker = new google.maps.Marker({
        position: jaffna,
        map: map
    });
}