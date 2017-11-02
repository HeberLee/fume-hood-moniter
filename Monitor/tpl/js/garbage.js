/**
 * Created by zelong on 2017/8/13.
 */
//废弃留存的代码

//查询7天历史
if (days == 7) {
    for (var i = 2; i < 4; i++) {
        var tempDate = addZero(myDate.getDate() - i);
        var tempJsonFile = "./" + nowYear + "-" + nowMoth + "-" + tempDate + ".json";
        //var tempData = eval("tempData" + i);
        $.get(tempJsonFile, function (data) {
            tempData = data.map(function (item) {
                return item[1];
            });
            //console.log(tempData);
            tempSeriesData =data.map(function (item) {
                return item[index];
            });
            myData = myData+","+tempData;
            //console.log(myData);
            seriesData = seriesData.concat(tempSeriesData);
        })
    }
}