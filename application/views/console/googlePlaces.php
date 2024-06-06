<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>


<div class="container mt-5">
<div class="row">
<div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12 m-auto">
<div class="card shadow">
<div class="card-header bg-primary">
<h5 class="card-title text-white"> Google Autocomplete Address</h5>
</div>
<div class="card-body">
<div class="form-group">
<label for="autocomplete"> Location/City/Address </label>
<input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Select Location">
</div>
<div class="form-group" id="lat_area">
<label for="latitude"> Latitude </label>
<input type="text" name="latitude" id="latitude" class="form-control">
</div>
<div class="form-group" id="long_area">
<label for="latitude"> Longitude </label>
<input type="text" name="longitude" id="longitude" class="form-control">
</div>
</div>
</div>
</div>
</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXJQGl6TomlsjP_YVPFaLgtpLwilaVNM8&libraries=places&callback=initAutocomplete" type="text/javascript"></script>
<script>
var axios = require('axios');

var config = {
  method: 'get',
  url: 'https://maps.googleapis.com/maps/api/place/autocomplete/json?input=amoeba&types=establishment&location=37.76999%2C-122.44696&radius=500&key=AIzaSyAXJQGl6TomlsjP_YVPFaLgtpLwilaVNM8',
  headers: {}
};

axios(config)
.then(function (response) {
  console.log(JSON.stringify(response.data));
})
.catch(function (error) {
  console.log(error);
});
</script>