/**
 * Created by Psilo 2017年8月10日
 */
var map = new BMap.Map("l-map", {
  enableMapClick: false
});
var point = new BMap.Point(118.652182, 24.938167);
map.centerAndZoom(point, 18);
map.enableScrollWheelZoom(true); //可缩放

$(document).ready(function () {
  $.ajax({
    url: "https://www.easy-mock.com/mock/598c46ffa1d30433d85d21b6/map/map",
    type: "get",
    success: function (data) {
      for (i in data) {

        var marker = new BMap.Marker(new BMap.Point(data[i].mapLocal[0], data[i].mapLocal[1]));
        map.addOverlay(marker);
        marker.setAnimation(BMAP_ANIMATION_BOUNCE);

        (function (i) {
          var title = {
            title: '<span style="font-size:14px;color:#0A8021">' + data[i].mapName + '</span>'
          };
          var body = "<table class='map-table'><tr><td> " +
            "<span class='table-temp' id='tableTemp'>温度<br>" + data[i].mapTemp + "℃</span></td>" +
            "<td><span class='table-humi' id='tableHumi'>湿度<br>" + data[i].mapHumi + "%</span></td>" +
            "<td><span class='table-wind' id='tableWind'>风速<br>" + data[i].mapSpeed + "m/s</span></td></tr></table>" +
            "<span style='float: right;'><a href='javascript:;'>详情>></a></span>"


          var infoWindow0 = new BMap.InfoWindow(body, title);
          marker.addEventListener("click", function () {
            this.openInfoWindow(infoWindow0);
          });
        })(i)
      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log("数据读取失败");
    }
  })

})