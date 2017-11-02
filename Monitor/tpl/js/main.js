/**
 * Created by zelong on 2017/8/6.
 *@checkMe 控制实时循环暂停
 *@option2, option3, option4, seriesType, seriesData,subText,myStartValue 图表属性
 *@jsonFile json文件路径
 *
 */

var checkMe;
var seriesType, seriesData,subText = "";
//获取时间
//是否出现时间不准确的bug
var myDate = new Date();
var nowYear = myDate.getFullYear();
var nowMoth = addZero(myDate.getMonth() + 1);
var nowDate = addZero(myDate.getDate());
var nowHour = myDate.getHours();
var nowMinute = addZero(myDate.getMinutes());

Date.prototype.toLocaleString = function() {
    return this.getFullYear() + "/" + addZero((this.getMonth() + 1)) + "/" + addZero(this.getDate()) + "/ " + addZero(this.getHours()) + ":" + addZero(this.getMinutes());
};

function turnTime(num) {
    var t = new Date(num * 1000);
    return t.toLocaleString();
}

//展示所有数据
function showAllData() {
    var myCharttemperature = echarts.init(document.getElementById('temperature'));
    var myCharthumidity = echarts.init(document.getElementById('humidity'));
    var myChartwind_speed = echarts.init(document.getElementById('wind'));
        // var data = [{"id":"37","date":"1506512254","wind_speed":"0.6","temperature":"30.5","humidity":"10","uid":"2"},{"id":"38","date":"1506512256","wind_speed":"0.8","temperature":"28.8","humidity":"14","uid":"2"},{"id":"41","date":"1506512258","wind_speed":"0.5","temperature":"30.9","humidity":"14","uid":"2"},{"id":"44","date":"1506512259","wind_speed":"1","temperature":"30.4","humidity":"10","uid":"2"},{"id":"46","date":"1506512259","wind_speed":"0.9","temperature":"29.1","humidity":"13","uid":"2"},{"id":"48","date":"1506512260","wind_speed":"0.8","temperature":"29.7","humidity":"11","uid":"2"}];
        var data = phpData;
    // console.log(data[1]['date']);
        var myStartValue = turnTime(data[1]['date']);
            function showItem(index, name) {
                seriesData = data.map(function (item) {
                    return item[index];
                });
                var optiontemperature = {
                    title: {
                        text: name,
                        subtext: subText
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    xAxis: {
//                获取json中第二个数据作为横坐标

                        data: data.map(function (item) {
                            return turnTime(item.date);
                        })
                    },
                    yAxis: {
                        //name:yName,
                        //data:seriesData,
                        splitLine: {
                            show: true
                        }
                    },
                    toolbox: {
                        left: 'center',
                        feature: {
                            dataZoom: {
                                yAxisIndex: 'none'
                            },
                            restore: {},
                            saveAsImage: {}
                        }
                    },
                    dataZoom: [{
                        startValue: myStartValue
                    }, {
                        type: 'inside'
                    }, {
                        handleIcon: 'M10.7,11.9v-1.3H9.3v1.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4v1.3h1.3v-1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z',
                        handleSize: '80%',
                        handleStyle: {
                            color: '#fff',
                            shadowBlur: 3,
                            shadowColor: 'rgba(0, 0, 0, 0.6)',
                            shadowOffsetX: 2,
                            shadowOffsetY: 2
                        }
                    }],
                    visualMap: {
                        top: 10,
                        right: 10,
                        pieces: [
                            {
                                lte: 0,
                                color: '#3FC221'
                            },
                            {
                                gt: 0,
                                lte: 10,
                                color: '#096'
                            }, {
                                gt: 10,
                                lte: 25,
                                color: '#ffde33'
                            }, {
                                gt: 25,
                                lte: 28,
                                color: '#ff9933'
                            }, {
                                gte: 28,
                                color: 'red'
                            }
                        ]
                    },
                    series: {
                        name: name,
                        type: seriesType,
                        data: data.map(function (item) {
                            return item[index]
                        })
                    }
                };
                var optionhumidity = {
                    title: {
                        text: name,
                        subtext: subText
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    xAxis: {
//                获取json中第一个数据作为横坐标
                        data: data.map(function (item) {
                            return turnTime(item.date);
                        })
                    },
                    yAxis: {
                        //name:yName,
                        splitLine: {
                            show: true
                        }
                    },
                    toolbox: {
                        left: 'center',
                        feature: {
                            dataZoom: {
                                yAxisIndex: 'none'
                            },
                            restore: {},
                            saveAsImage: {}
                        }
                    },
                    dataZoom: [{
                        startValue: myStartValue
                    }, {
                        type: 'inside'
                    }, {
                        handleIcon: 'M10.7,11.9v-1.3H9.3v1.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4v1.3h1.3v-1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z',
                        handleSize: '80%',
                        handleStyle: {
                            color: '#fff',
                            shadowBlur: 3,
                            shadowColor: 'rgba(0, 0, 0, 0.6)',
                            shadowOffsetX: 2,
                            shadowOffsetY: 2
                        }
                    }
                    ],
                    visualMap: {
                        top: 10,
                        right: 10,
                        pieces: [
                            {
                                lte: 10,
                                color: '#3FC221'
                            },
                            {
                                gt: 10,
                                lte: 30,
                                color: '#096'
                            }, {
                                gt: 30,
                                lte: 50,
                                color: '#ffde33'
                            }, {
                                gt: 50,
                                lte: 70,
                                color: '#ff9933'
                            }, {
                                gte: 70,
                                color: 'red'
                            }
                        ]
                    },
                    series: {
                        name: name,
                        type: seriesType,
                        data: data.map(function (item) {
                            return item[index];
                        })
                    }
                };
                var optionwind_speed = {
                    title: {
                        text: name,
                        subtext: subText
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    xAxis: {
//                获取json中第一个数据作为横坐标
                        data: data.map(function (item) {
                            return turnTime(item.date);
                        })
                    },
                    yAxis: {
                        //name:yName,
                        splitLine: {
                            show: true
                        }
                    },
                    toolbox: {
                        left: 'center',
                        feature: {
                            dataZoom: {
                                yAxisIndex: 'none'
                            },
                            restore: {},
                            saveAsImage: {}
                        }
                    },
                    dataZoom: [{
                        startValue: myStartValue
                    }, {
                        type: 'inside'
                    }, {
                        handleIcon: 'M10.7,11.9v-1.3H9.3v1.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4v1.3h1.3v-1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z',
                        handleSize: '80%',
                        handleStyle: {
                            color: '#fff',
                            shadowBlur: 3,
                            shadowColor: 'rgba(0, 0, 0, 0.6)',
                            shadowOffsetX: 2,
                            shadowOffsetY: 2
                        }
                    }
                    ],
                    visualMap: {
                        top: 10,
                        right: 10,
                        pieces: [
                            {
                                lte: 0,
                                color: '#3FC221'
                            },
                            {
                                gt: 0,
                                lte: 4,
                                color: '#096'
                            }, {
                                gt: 4,
                                lte: 8,
                                color: '#ffde33'
                            }, {
                                gt: 8,
                                lte: 12,
                                color: '#ff9933'
                            }, {
                                gte: 12,
                                color: 'red'
                            }
                        ]
                    },
                    series: {
                        name: name,
                        type: seriesType,
                        data: data.map(function (item) {
                            return item[index];
                        })
                    }
                };
                var myChart = eval("myChart" + index);
                myChart.setOption(eval("option" + index));
            }
            showItem('temperature', '温度(℃)');
            showItem('humidity', '湿度(%)');
            showItem('wind_speed', '风速(m/s)');
            $('#noData').css('display', 'none');
            $('#showData').css('display', 'inherit');
}

//实时切换按钮
function turn() {
    var btn = $('.realTimeBtn');
    var btnStatus = btn.attr("class") == "realTimeBtn";
    if (btnStatus) {
        tempsubText = subText;
        btn.addClass('btn-success');
        checkMe = true;
        jsonFile = "./" + nowYear + "-" + nowMoth + "-" + nowDate + ".json";
        subText = "（最近3小时内,每三分钟自动更新）";
        realTime();
    } else {
        checkMe = false;
        subText = tempsubText;
        showAllData();
        btn.removeClass('btn-success');
    }
}

//时间不齐两位补零
function addZero(obj) {
    if (obj < 10) {
        return obj = "0" + obj;
    } else {
        return obj;
    }
}

//实时显示数据
function realTime() {

    var hour;

    //每天03：00前显示从00：00开始
    if (nowHour - 3 < 0) {
        myStartValue = nowYear + "-" + nowMoth + "-" + nowDate + " " + "00:00";
        //alert(myStartValue);
    } else {
        hour = addZero(nowHour - 3);
        myStartValue = nowYear + "-" + nowMoth + "-" + nowDate + " " + hour + ":" + nowMinute;
        //alert(myStartValue);
    }

    showAllData();
    //alert(checkMe);
    if (checkMe) {
        setTimeout(function () {
            realTime();
        }, 58000);
    }
}

//切换图表类型
function turnSeriesType() {
    var first = $('.series0');
    var last = $('.series1');
    if (seriesType == 'line') {
        seriesType = 'bar';
        showAllData();
        first.removeClass('aActive').attr("onclick", "turnSeriesType()");
        last.addClass('aActive').attr("onclick", " ");
    } else {
        seriesType = 'line';
        showAllData();
        first.addClass('aActive').attr("onclick", " ");
        last.removeClass('aActive').attr("onclick", "turnSeriesType()");
    }
}

//切换历史数据   修改json路径和显示的值
function turnHistory(obj) {
    checkMe = false;
    $('.realTimeBtn').removeClass('btn-success');
    var myId = document.getElementById(obj);
    //js元素获取子节点内容
    var mysubText = myId.firstChild.innerHTML;

    //jQ实现点击显示active并移除兄弟节点active的效果
    var myThis = $('#' + obj);
    myThis.children().addClass("historyActive");
    myThis.siblings().children().removeClass("historyActive");

    myThis.attr("onclick", " ");
    myThis.siblings().attr("onclick", "turnHistory(this.id)");

    subText = "(" + mysubText + ")";

    switch (obj) {
        case "today":
            jsonFile = "./" + nowYear + "-" + nowMoth + "-" + nowDate + ".json";
            break;
        case "one":
            var yesDate = addZero(nowDate - 1);
            jsonFile = "./" + nowYear + "-" + nowMoth + "-" + yesDate + ".json";
            break;
    }
    showAllData();
}

// 终止事件冒泡
document.getElementById("oneDay").addEventListener('click', function (e) {
    e.stopPropagation();//终止事件冒泡
}, false);

// 写入历史时间的年月日
function writeYMD() {
    var years = document.getElementById("year");
    var moths = document.getElementById("moth");
    var days = document.getElementById("day");

    var specVal = [1, 3, 5, 7, 8, 10, 12];
    var specDay;

    // 写入月
    for (var i = 0; i < 12; i++) {
        var temp = addZero(i + 1);
        moths.options[i] = new Option(temp, i + 1);
    }

    //写入年份
    for (var y = 0; y < nowYear - 2016; y++) {
        years.options[y] = new Option(2017 + y, 2017 + y);
    }

    // 写入天数
    function changeDay(val) {
        days.options.length = 0;
        var mothsVal = parseInt(val);
        var result = !!specVal.find(function (item) {
            return item === mothsVal;
        });
        //为什么要去掉return
        if (result) {
            specDay = 31;
        } else if (mothsVal === 2) {
            if (checkYear(2020)) {
                specDay = 28;
            } else {
                specDay = 29;
            }
        } else {
            specDay = 30;
        }
        for (var j = 0; j < specDay; j++) {
            var temp1 = addZero(j + 1);
            days.options[j] = new Option(temp1, j + 1);
        }
    }

    // 检查是否为闰年
    function checkYear(val) {
        var yearVal = parseInt(val);
        if (yearVal % 100 === 0) {
            if (yearVal % 400 === 0) {
                return true;
            }
        } else {
            console.log(yearVal % 4);
            if (yearVal % 4 === 0) {
                console.log("是闰年啊！！");
                return true;
            }
        }
    }

    changeDay(moths.value);
    moths.onchange = function () {
        changeDay(moths.value);
        console.log(moths.value);
    };
    years.onchange = function () {
        if (moths.value === "2") {
            changeDay(moths.value);
        }
    };
    // 更据所选历史日期选择json渲染
    document.getElementById("query").addEventListener('click', function () {
        jsonFile = "./" + years.value + "-" + addZero(parseInt(moths.value)) + "-" + addZero(parseInt(days.value)) + ".json";
        subText = years.value + "-" + addZero(parseInt(moths.value)) + "-" + addZero(parseInt(days.value));
        showAllData();
    })
}
// alert("为了方便展示，默认显示2017/08/12的数据；可提供选择的数据日期为2017/08/10-2017/08/12");
function getPhp(str) {
        //var str = document.getElementById("username").value;
        //alert(str);
            var xmlhttp;
            var date = myDate.getTime();
            if (window.XMLHttpRequest){
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            else{
                // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                        console.log(phpData);
                }else {
                    $('#showData').css('display', 'none');
                    $('#noData').css('display', 'inherit');
                    $('.footer').css({"position": "fixed", "bottom": "0"});
                }
            };
            //请求指令加上输入框的值q
            xmlhttp.open("GET","register2.php?q="+date,true);
            //发送请求指令
            xmlhttp.send();
}








