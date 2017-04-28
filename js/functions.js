//js functions
function emptyPost() {
    alert("Your post cannot be empty!");
}

function emptySearch() {
    alert("You need to enter a search term!");
}

function editPost(id, post_text){
    let edited_post = prompt("Edit you post", post_text);
    
}
function myMap() {
    const myCenter = new google.maps.LatLng(51.508742,-0.120850);
    const mapCanvas = document.getElementById("googleMap");
    const mapOptions = {center: myCenter, zoom: 5};
    const map = new google.maps.Map(mapCanvas, mapOptions);
    const marker = new google.maps.Marker({position:myCenter});
    marker.setMap(map);
}
