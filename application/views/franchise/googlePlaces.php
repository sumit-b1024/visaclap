<link rel="stylesheet" href="https://stackpathh.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 m-auto">
<div class="card shadow">
<div class="card-header bg-primary">
<h5 class="card-title text-white">Google Autocomplete Address</h5>
</div>
<div class="card-body">
<div class="form-group">
<label for="autocomplete"> Location/City/Address </label>
<input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Select Location">
</div>
<div class="spinner-border text-primary mt-4 status d-none" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="placeData mt-4">
</div>
<div class="form-group" id="lat_area">
<label for="latitude"> Latitude </label>
<input type="text" name="latitude" id="latitude" class="form-control">
</div>
<div class="form-group" id="long_area">
<label for="longitude"> Longitude </label>
<input type="text" name="longitude" id="longitude" class="form-control">
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyAXJQGl6TomlsjP_YVPFaLgtpLwilaVNM8&libraries=places&callback=initAutocomplete" type="text/javascript"></script>
<script>
$(document).ready(function() {
$("#lat_area").addClass("d-none");
$("#long_area").addClass("d-none");
});
</script>
<script>
google.maps.event.addDomListener(window, 'load', initialize);
function initialize() {
var input = document.getElementById('autocomplete');
var autocomplete = new google.maps.places.Autocomplete(input);
autocomplete.addListener('place_changed', function() {

 $(".status").removeClass("d-none");
var place = autocomplete.getPlace();
$('#latitude').val(place.geometry['location'].lat());
$('#longitude').val(place.geometry['location'].lng());
		var base_url = "<?php echo base_url(); ?>";

		$.ajax({
            url:base_url+"franchise/dashboard/getPlaceList",    //the page containing php script
            type: "post",    //request type,
            // dataType: 'json',
            data: {lat: place.geometry['location'].lat(), long : place.geometry['location'].lng()},
            success:function(result){
            	$(".status").addClass("d-none");
                $(".placeData").html(result);
            }
        });

// --------- show lat and long ---------------
// $("#lat_area").removeClass("d-none");
// $("#long_area").removeClass("d-none");
});
}
</script>
</html>

