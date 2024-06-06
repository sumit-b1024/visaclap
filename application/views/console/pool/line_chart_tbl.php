<div class="row row-sm">
   <div class="col-lg-12">
    <div class="card">
     <div class="card-header">
        <div class="row">
           <div class="col-10">
              <h3 class="card-title"><?= $title; ?></h3>
           </div>

        </div>
     </div>
     <div class="card-body">
       <div class="table-responsive">

         <div id="curve_chart" style="width: 100%; height: 500px"></div>
         
      </div>
   </div>
</div>
</div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   var ids = [];
   function drawChart() {
     $.ajax({
      type: 'POST',
      url: base_url + 'pool_master/fetch_chart_tbl_data',
   // dataType: 'json',
   success: function(result) {

     var data = new google.visualization.DataTable(result);
       // console.log(array);
       var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
     };
     var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

     chart.draw(data, options);
  }
});

  }
</script>
<!-- <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);

   var ids = [];
   function drawChart() {
     $.ajax({
      type: 'POST',
      url: base_url + 'pool_master/fetch_chart_tbl_data',
   // dataType: 'json',
   success: function(result) {

     var data = new google.visualization.DataTable(result);
       // console.log(array);
       var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
     };
     var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

     chart.draw(data, options);
  }
});

  }
</script> -->