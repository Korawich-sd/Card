<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
    .card {
      background-color :rgb(250, 245, 253);
      box-shadow: 0 4px 8px 0 rgba(205, 96, 255, 0.2);
      width: 50%;
      margin: auto;
      margin-top: 20px;
      margin-bottom: 20px;
      padding-bottom: 10px;
    }
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(156, 171, 255, 0.2);
    }
    .container {
      padding: 2px 16px;
    }
    .dataweather{
      padding-left: 23px;
      padding-bottom: 5px;
    }
    .searchdataweather{
      padding-left: 23px;
    }
   h3{
      padding-top: 15px;
   }
    </style>

<body>
   
  <div class="container"> 
<input type="text" id="la" placeholder="Latitude" value="7.376078" class="form-control" style="width: 100%; margin-top: 2%;">
          <input type="text" id="lo" placeholder="Longitude" value="99.743488" class="form-control" style="width: 100%; margin-top: 2%;">
          <button id="load" class="btn btn-primary" style="width: 100%; margin-top: 2%;"><b>Load</b></button>
         
        <div class="card">
          <h3><b><center>เช็คสภาพอากาศบ้านของคุณที่นี่</center></b></h3>
           <img src="https://www.thaihometown.com/photo/image_file44/1208630/1208630-1.jpg" alt="map" style="width: 100%;" >
          
            <div class="dataweather">      
            <h3>สภาพอากาศ<span id="name"> ที่ </span><br> </h3>
                <span id="sys_country">ประเทศ: </span><br>
                <span id="main_temp">อุณหภูมิ: </span> เซลเซียส<br>
                <span id="main_temp_max">อุณหภูมิสูงสุด: </span> เซลเซียส<br>
                <span id="main_temp_min">อุณหภูมิต่ำสุด: </span> เซลเซียส<br>
                <span id="humidity">ความชื้น: </span> %<br>
                <span id="sys_sunrise">พระอาทิตย์ขึ้น: </span> unix<br>
                <span id="sys_sunset">พระอาทิตย์ตก: </span> unix<br>
                <span id="wind_deg">ทิศทางลม: </span> องศา<br>
                <span id="wind_speed">ความเร็วลม: </span> เมตร/วินาที<br>
                <span id="clouds">เมฆ: </span> %<br>  
            </div>
            <div class="searchdataweather">
              <h3>สภาพอากาศ ที่ <span id="name1"> </span><br> </h3>
              ประเทศ: <span id="sys_country1"> </span><br>
              อุณหภูมิ: <span id="main_temp1"> </span> เซลเซียส<br>
              อุณหภูมิสูงสุด: <span id="main_temp_max1"> </span> เซลเซียส<br>
              อุณหภูมิต่ำสุด: <span id="main_temp_min1"> </span> เซลเซียส<br>
              ความชื้น: <span id="humidity1"> </span> %<br>
              พระอาทิตย์ขึ้น: <span id="sys_sunrise1"> </span> unix<br>
              พระอาทิตย์ตก: <span id="sys_sunset1"> </span> unix<br>
              ทิศทางลม: <span id="wind_deg1"></span> องศา<br>
              ความเร็วลม: <span id="wind_speed1"> </span> เมตร/วินาที<br>
              เมฆ: <span id="clouds1"> </span> %<br>
                
             </div>
          </div>
         </div>
    </div>          
 <script> 
   function loadweather(){ 
     $(".searchdataweather").hide();
     var url ="https://api.openweathermap.org/data/2.5/weather?lat=7.376078&lon=99.743488&lang=th&appid=a28d46fac268c82a0dc8eabda7fd2b94&units=metric";
     
           $.getJSON(url)
            .done((data)=>{
              console.log(data)
                $("#name").append(data.name);
                $("#main_temp").append(data.main.temp);
                $("#main_temp_max").append(data.main.temp_max);
                $("#main_temp_min").append(data.main.temp_min);
                $("#humidity").append(data.main.humidity);
                $("#sys_country").append(data.sys.country);
                $("#sys_sunrise").append(data.sys.sunrise);
                $("#sys_sunset").append(data.sys.sunset);
                $("#wind_deg").append(data.wind.deg);
                $("#wind_speed").append(data.wind.speed);
                $("#clouds").append(data.clouds.all);
               
                      })         
           .fail((xhr, status, err)=>{
                    console.log("error")
                });
                 
          }
 

   function searchweather(){ 
           $(".dataweather").hide();
           $(".searchdataweather").show();
           var url ="https://api.openweathermap.org";
           var lat = $("#la").val();
           var lon = $("#lo").val();

           url = url + "/data/2.5/weather?lat=" + lat + "&lon=" + lon +"&lang=th&appid=a28d46fac268c82a0dc8eabda7fd2b94&units=metric"; 
           
            $.getJSON(url)
            .done((data)=>{
              console.log(data)
              $("#name1").append(data.name);
              $("#main_temp1").append(data.main.temp);
              $("#main_temp_max1").append(data.main.temp_max);
              $("#main_temp_min1").append(data.main.temp_min);
              $("#humidity1").append(data.main.humidity);
              $("#sys_country1").append(data.sys.country);
              $("#sys_sunrise1").append(data.sys.sunrise);
              $("#sys_sunset1").append(data.sys.sunset);
              $("#wind_deg1").append(data.wind.deg);
              $("#wind_speed1").append(data.wind.speed);
              $("#clouds1").append(data.clouds.all);
                      })         
           .fail((xhr, status, err)=>{
                    console.log("error")
                });
          }
         
    function remove(){
         $("#name1").empty();
         $("#main_temp1").empty();
         $("#main_temp_max1").empty();
         $("#main_temp_min1").empty();
         $("#humidity1").empty();
         $("#sys_country1").empty();
         $("#sys_sunrise1").empty();
         $("#sys_sunset1").empty();
         $("#wind_deg1").empty();
         $("#wind_speed1").empty();
         $("#clouds1").empty();
    }
   
    $(()=>{ 
            loadweather();
            $("#load").click(()=>{ 
               searchweather();
            });
            $("#load").click(()=>{
                remove();
            });  
     });
   </script>  
  </body>
</html>