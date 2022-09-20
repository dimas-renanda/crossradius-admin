
<!DOCTYPE html>
<html>
	<head>
		<title>MikroX</title>
		<meta charset="utf-8">
		<meta http-equiv="cache-control" content="private" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Theme color -->
		<meta name="theme-color" content="#3a4149" />
		<!-- Font Awesome -->
		<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome/css/font-awesome.min.css" />
		<!-- Mikhmon UI -->
		<link rel="stylesheet" href="../assets/css/mikhmon-ui.light.min.css">
		<!-- favicon -->
		<link rel="icon" href="./img/favicon.png" />
		<!-- jQuery -->
		<script src="../assets/js/jquery.min.js"></script>
		<!-- pace -->
		<link href="../assets/css/pace.light.css" rel="stylesheet" />
		<script src="../assets/js/pace.min.js"></script>

		
	</head>
	<body>
		<div class="wrapper">

			
<span style="display:none;" id="idto">disable</span>



<div id="navbar" class="navbar">
  <div class="navbar-left">
  <a> <?php echo '<img class="brand" src="http://localhost/xradius/crossradius-admin/assets/img/xnet.png" alt="XNET Logo" height="30">'; ?>
     <a>Crossnet</a>

<a id="openNav" class="navbar-hover" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
<a id="closeNav" class="navbar-hover" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
<a> </a>

</div>
 <div class="navbar-right">
  <a id="logout" href="../dashboard/" ><i class="fa fa-sign-out mr-1"></i> Logout</a>
</div>
</div>

<div id="sidenav" class="sidenav">
  <div class="menu text-center align-middle card-header" style="border-radius:0;"><h3>MikroX</h3></div>
  <a href="" class="menu active"><i class="fa fa-dashboard"></i> Dashboard</a>
  <!--hotspot-->
  <div class="dropdown-btn "><i class="fa fa-wifi"></i> Hotspot
    <i class="fa fa-caret-down"></i>
  </div>
  <div class="dropdown-container ">
   <!--users--> 
  <div class="dropdown-btn "><i class="fa fa-users"></i> Users    <i class="fa fa-caret-down"></i>
  </div>
  <div class="dropdown-container ">
    <a href="./?hotspot=users&profile=all&session=Soda2a-ip150" class=""> &nbsp;&nbsp;&nbsp;<i class="fa fa-list "></i> User List </a>
    <a href="./?hotspot-user=add&session=Soda2a-ip150" class=""> &nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus "></i> Add User </a>
    <a href="./?hotspot-user=generate&session=Soda2a-ip150" class=""> &nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus"></i> Generate </a>        
  </div>
  <!--profile-->
  <div class="dropdown-btn "><i class=" fa fa-pie-chart"></i>  User Profile    <i class="fa fa-caret-down"></i>
  </div>
  <div class="dropdown-container ">
    <a href="./?hotspot=user-profiles&session=Soda2a-ip150" class=" "> &nbsp;&nbsp;&nbsp;<i class="fa fa-list "></i> Profile List </a>
    <a href="./?user-profile=add&session=Soda2a-ip150" class=" "> &nbsp;&nbsp;&nbsp;<i class="fa fa-plus-square "></i> Add Profile </a>

  </div>
  <!--active-->
  <a href="./?hotspot=active&session=Soda2a-ip150" class="menu "><i class=" fa fa-wifi"></i> Hotspot Active</a>
  <!--hosts-->
  <a href="./?hotspot=hosts&session=Soda2a-ip150" class="menu "><i class=" fa fa-laptop"></i> Hosts</a>
  <!--ip bindings-->
  <a href="./?hotspot=ipbinding&session=Soda2a-ip150" class="menu "><i class=" fa fa-address-book"></i> IP Bindings</a>
  <!--cookies-->
   <a href="./?hotspot=cookies&session=Soda2a-ip150" class="menu "><i class=" fa fa-hourglass"></i> Cookies</a>
  </div>

     <!--PPOE-->
     <div class="dropdown-btn "><i class=" fa fa-home"></i> PPOE    <i class="fa fa-caret-down"></i>
    </div>
  <div class= "dropdown-container ">
    <a href="./?hotspot=log&session=Soda2a-ip150" class=""> <i class="fa fa-wifi "></i> PPOE User </a>
    <a href="./?report=userlog&idbl=sep2022&session=Soda2a-ip150" class=" "> <i class="fa fa-users "></i> PPOE Add </a>
  </div>

   <!--log-->
  <div class="dropdown-btn "><i class=" fa fa-align-justify"></i> Log    <i class="fa fa-caret-down"></i>
  </div>
  <div class="dropdown-container ">
    <a href="./?hotspot=log&session=Soda2a-ip150" class=""> <i class="fa fa-wifi "></i> Hotspot Log </a>
    <a href="./?report=userlog&idbl=sep2022&session=Soda2a-ip150" class=" "> <i class="fa fa-users "></i> User Log </a>
  </div>
  <!--system-->
  <div class="dropdown-btn "><i class=" fa fa-gear"></i> System    <i class="fa fa-caret-down"></i> &nbsp;
  </div>
  <div class="dropdown-container ">
    <a href="./admin.php?id=reboot&session=Soda2a-ip150" class=""> <i class="fa fa-power-off "></i> Reboot </a>            
    <a href="./admin.php?id=shutdown&session=Soda2a-ip150" class=""> <i class="fa fa-power-off "></i> Shutdown </a> 
  </div>

  <!--traffic monitor-->
  <a href="./?interface=traffic-monitor&session=Soda2a-ip150" class="menu "><i class=" fa fa-area-chart"></i> Traffic Monitor</a>
  <!--report-->
 
  <div class="dropdown-container ">
  <a href="./admin.php?id=settings&session=Soda2a-ip150" class="menu "> <i class="fa fa-gear "></i> Session Settings </a>
  <a href="./admin.php?id=sessions" class="menu "> <i class="fa fa-gear "></i> Admin Settings </a>
  <a href="./?hotspot=uplogo&session=Soda2a-ip150" class="menu "> <i class="fa fa-upload "></i> Upload Logo </a>
  <a href="./?hotspot=template-editor&template=default&session=Soda2a-ip150" class="menu "> <i class="fa fa-edit "></i> Template Editor </a>          
  </div>


</div>
<script>
$(document).ready(function(){
  $(".connect").change(function(){
    notify("Connecting");
    connect(this.value)
  });
  $(".stheme").change(function(){
    notify("Loading theme");
    stheme(this.value)
  });
});
</script>
<div id="notify"><div class="message"></div></div>
<div id="temp"></div>

<div id="main">  
<div id="loading" class="lds-dual-ring"></div>
<div class="main-container" style="display:none">
    
<div id="reloadHome">

    <div id="r_1" class="row">
      <div class="col-4">
        <div class="box bmh-75 box-bordered">
          <div class="box-group">
            <div class="box-group-icon"><i class="fa fa-calendar"></i></div>
              <div class="box-group-area">
                <span >System date & time<br>
                    Sep/20/2022 18:41:13<br>
                    Uptime : 9w 2d  12:13:09                </span>
              </div>
            </div>
          </div>
        </div>
      <div class="col-4">
        <div class="box bmh-75 box-bordered">
          <div class="box-group">
          <div class="box-group-icon"><i class="fa fa-info-circle"></i></div>
              <div class="box-group-area">
                <span >
                    Board Name : hAP<br/>
                    Model : RB951Ui-2nD<br/>
                    Router OS : 6.49.2 (stable)                </span>
              </div>
            </div>
          </div>
        </div>
    <div class="col-4">
      <div class="box bmh-75 box-bordered">
        <div class="box-group">
          <div class="box-group-icon"><i class="fa fa-server"></i></div>
              <div class="box-group-area">
                <span >
                    CPU Load : 12%<br/>
                    Free Memory : 30.2 MiB<br/>
                    Free HDD : 1.95 MiB                </span>
                </div>
              </div>
            </div>
          </div> 
      </div>

        <div class="row">
          <div  class="col-8">
            <div id="r_2"class="row">
            <div class="card">
              <div class="card-header"><h3><i class="fa fa-wifi"></i> Hotspot</h3></div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-3 col-box-6">
                      <div class="box bg-blue bmh-75">
                        <a onclick="cancelPage()" href="./?hotspot=active&session=Soda2a-ip150">
                          <h1>99                              <span style="font-size: 15px;">items</span>
                            </h1>
                          <div>
                            <i class="fa fa-laptop"></i> Hotspot Active                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-3 col-box-6">
                    <div class="box bg-green bmh-75">
                      <a onclick="cancelPage()" href="./?hotspot=users&profile=all&session=Soda2a-ip150">
                            <h1>46                              <span style="font-size: 15px;">items</span>
                            </h1>
                      <div>
                            <i class="fa fa-users"></i> Hotspot User                          </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-3 col-box-6">
                    <div class="box bg-yellow bmh-75">
                      <a onclick="cancelPage()" href="./?hotspot-user=add&session=Soda2a-ip150">
                        <div>
                          <h1><i class="fa fa-dollar"></i>
                              <span style="font-size: 15px;">Today's</span>
                          </h1>
                        </div>
                        <div>
                            <i class="fa fa-user-plus"></i> Income                       </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-3 col-box-6">
                    <div class="box bg-red bmh-75">
                      <a onclick="cancelPage()" href="./?hotspot-user=generate&session=Soda2a-ip150">
                        <div>
                          <h1><i class="fa fa-area-chart"></i>
                              <span style="font-size: 15px;">Report</span>
                          </h1>
                        </div>
                        <div>
                            <i class="fa fa-user-plus"></i> Income                        </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
            <div class="card">
              <div class="card-header"><h3><i class="fa fa-user"></i> Active User </h3></div>

              <div class="card-body">
  
                                    
                  <script type="text/javascript"> 
                    var chart;
                    var sessiondata = "crossradius";
                    var interface = "Hotspot";
                    var n = 3000;
                    function requestDatta(session,iface) {
                      $.ajax({
                        url: './traffic/traffic.php?session='+session+'&iface='+iface,
                        datatype: "json",
                        success: function(data) {
                          var midata = JSON.parse(data);
                          if( midata.length > 0 ) {
                            var TX=parseInt(midata[0].data);
                            var RX=parseInt(midata[1].data);
                            var x = (new Date()).getTime(); 
                            shift=chart.series[0].data.length > 19;
                            chart.series[0].addPoint([x, TX], true, shift);
                            chart.series[1].addPoint([x, RX], true, shift);
                          }
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) { 
                          console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown); 
                        }       
                      });
                    }	

                    $(document).ready(function() {
                        Highcharts.setOptions({
                          global: {
                            useUTC: false
                          }
                        });

                        Highcharts.addEvent(Highcharts.Series, 'afterInit', function () {
	                        this.symbolUnicode = {
    	                    circle: '●',
                          diamond: '♦',
                          square: '■',
                          triangle: '▲',
                          'triangle-down': '▼'
                          }[this.symbol] || '●';
                        });

                          chart = new Highcharts.Chart({
                          chart: {
                          renderTo: 'trafficMonitor',
                          animation: Highcharts.svg,
                          type: 'areaspline',
                          events: {
                            load: function () {
                              setInterval(function () {
                                requestDatta(sessiondata,interface);
                              }, 8000);
                            }				
                          }
                        },
                        title: {
                          text: 'Interface ' + interface
                        },
                        
                        xAxis: {
                          type: 'datetime',
                          tickPixelInterval: 150,
                          maxZoom: 20 * 1000,
                        },
                        yAxis: {
                            minPadding: 0.2,
                            maxPadding: 0.2,
                            title: {
                              text: null
                            },
                            labels: {
                              formatter: function () {      
                                var bytes = this.value;                          
                                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (bytes == 0) return '0 bps';
                                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
                              },
                            },       
                        },
                        
                        series: [{
                          name: 'Tx',
                          data: [],
                          marker: {
                            symbol: 'circle'
                          }
                        }, {
                          name: 'Rx',
                          data: [],
                          marker: {
                            symbol: 'circle'
                          }
                        }],

                        tooltip: {
                          formatter: function () { 
                            var _0x2f7f=["\x70\x6F\x69\x6E\x74\x73","\x79","\x62\x70\x73","\x6B\x62\x70\x73","\x4D\x62\x70\x73","\x47\x62\x70\x73","\x54\x62\x70\x73","\x3C\x73\x70\x61\x6E\x20\x73\x74\x79\x6C\x65\x3D\x22\x63\x6F\x6C\x6F\x72\x3A","\x63\x6F\x6C\x6F\x72","\x73\x65\x72\x69\x65\x73","\x3B\x20\x66\x6F\x6E\x74\x2D\x73\x69\x7A\x65\x3A\x20\x31\x2E\x35\x65\x6D\x3B\x22\x3E","\x73\x79\x6D\x62\x6F\x6C\x55\x6E\x69\x63\x6F\x64\x65","\x3C\x2F\x73\x70\x61\x6E\x3E\x3C\x62\x3E","\x6E\x61\x6D\x65","\x3A\x3C\x2F\x62\x3E\x20\x30\x20\x62\x70\x73","\x70\x75\x73\x68","\x6C\x6F\x67","\x66\x6C\x6F\x6F\x72","\x3A\x3C\x2F\x62\x3E\x20","\x74\x6F\x46\x69\x78\x65\x64","\x70\x6F\x77","\x20","\x65\x61\x63\x68","\x3C\x62\x3E\x4D\x69\x6B\x68\x6D\x6F\x6E\x20\x54\x72\x61\x66\x66\x69\x63\x20\x4D\x6F\x6E\x69\x74\x6F\x72\x3C\x2F\x62\x3E\x3C\x62\x72\x20\x2F\x3E\x3C\x62\x3E\x54\x69\x6D\x65\x3A\x20\x3C\x2F\x62\x3E","\x25\x48\x3A\x25\x4D\x3A\x25\x53","\x78","\x64\x61\x74\x65\x46\x6F\x72\x6D\x61\x74","\x3C\x62\x72\x20\x2F\x3E","\x20\x3C\x62\x72\x2F\x3E\x20","\x6A\x6F\x69\x6E"];var s=[];$[_0x2f7f[22]](this[_0x2f7f[0]],function(_0x3735x2,_0x3735x3){var _0x3735x4=_0x3735x3[_0x2f7f[1]];var _0x3735x5=[_0x2f7f[2],_0x2f7f[3],_0x2f7f[4],_0x2f7f[5],_0x2f7f[6]];if(_0x3735x4== 0){s[_0x2f7f[15]](_0x2f7f[7]+ this[_0x2f7f[9]][_0x2f7f[8]]+ _0x2f7f[10]+ this[_0x2f7f[9]][_0x2f7f[11]]+ _0x2f7f[12]+ this[_0x2f7f[9]][_0x2f7f[13]]+ _0x2f7f[14])};var _0x3735x2=parseInt(Math[_0x2f7f[17]](Math[_0x2f7f[16]](_0x3735x4)/ Math[_0x2f7f[16]](1024)));s[_0x2f7f[15]](_0x2f7f[7]+ this[_0x2f7f[9]][_0x2f7f[8]]+ _0x2f7f[10]+ this[_0x2f7f[9]][_0x2f7f[11]]+ _0x2f7f[12]+ this[_0x2f7f[9]][_0x2f7f[13]]+ _0x2f7f[18]+ parseFloat((_0x3735x4/ Math[_0x2f7f[20]](1024,_0x3735x2))[_0x2f7f[19]](2))+ _0x2f7f[21]+ _0x3735x5[_0x3735x2])});return _0x2f7f[23]+ Highcharts[_0x2f7f[26]](_0x2f7f[24], new Date(this[_0x2f7f[25]]))+ _0x2f7f[27]+ s[_0x2f7f[29]](_0x2f7f[28])
                          },
                          shared: true                                                      
                        },
                      });
                    });
                  </script>
                  <div id="trafficMonitor"></div>
                </div> 
              </div>
            </div>  
            <div class="col-4">
            <div id="r_4" class="row">
              <div style='display:none;' class="box bmh-75 box-bordered">
                <div class="box-group">
                  <div class="box-group-icon"><i class="fa fa-money"></i></div>
                    <div class="box-group-area">
                      <span >
                        <div id="reloadLreport">
                          <div id='loader' ><i><span> <i class='fa fa-circle-o-notch fa-spin'></i> Processing... </i></div>                       
                        </div>
                    </span>
                </div>
              </div>
            </div>
            </div>
            <div id="r_3" class="row">
            <div class="card">
              <div class="card-header">
                <h3><a onclick="cancelPage()" href="./?hotspot=log&session=Soda2a-ip150" title="Open Hotspot Log" ><i class="fa fa-align-justify"></i> Hotspot Log</a></h3></div>
                  <div class="card-body">
                    <div style="padding: 5px; height: 457px ;" class="mr-t-10 overflow">
                      <table class="table table-sm table-bordered table-hover" style="font-size: 12px; td.padding:2px;">
                        <thead>
                          <tr>
                            <th>Time</th>
                            <th>Users (IP)</th>
                            <th>Messages</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan="3" class="text-center">
                            <div id="loader" ><i><i class='fa fa-circle-o-notch fa-spin'></i> Processing... </i></div>
                            </td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>
            </div>
</div>
</div>

</div>
</div>
</div>
<script src="../assets/js/highcharts/highcharts.js"></script>
<script src="../assets/js/highcharts/themes/hc.light.js"></script>
<script src="../assets/js/mikhmon-ui.light.min.js"></script>
<script src="../assets/js/mikhmon.js?t=2022-09-20_18:42:19"></script>

<!-- <script>
    $("#r_3").load("./dashboard/aload.php?session=Soda2a-ip150&load=logs #r_3");  
    var interval1 = "10000";
    var dashboard = setInterval(function() {
      
    $("#r_1").load("./dashboard/aload.php?session=Soda2a-ip150&load=sysresource #r_1"); 
    $("#r_2").load("./dashboard/aload.php?session=Soda2a-ip150&load=hotspot #r_2"); 
    $("#r_3").load("./dashboard/aload.php?session=Soda2a-ip150&load=logs #r_3"); 
    
  }, interval1);

 
  function cancelPage(){
    window.stop();
    clearInterval(dashboard);
    }
</script> -->

</body>
</html>

