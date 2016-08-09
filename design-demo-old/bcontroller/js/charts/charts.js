$(function () {
    $('.Visitors').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: '每週來客統計量'
        },
        subtitle: {
            text: ''
        },
        xAxis: [{
            categories: ['Sun.', 'Mon.', 'Tue.', 'Wed.', 'Thu.', 'Fri.',
                'Sat.']
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}',
                style: {
                    color: '#4d7496'
                }
            },
            title: {
                text: '',
                style: {
                    color: '#4d7496'
                }
            }
        }, { // Secondary yAxis
            title: {
                text: '',
                style: {
                    color: '#4d7496'
                }
            },
            labels: {
                format: '{value} ',
                style: {
                    color: '#4d7496'
                }
            },
            opposite: false
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: '',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 100,
            floating: true,
            backgroundColor: '#FFFFFF'
        },
        series: [{
            name: '訪客',
            color: '#65a2a4',
            // type: 'column',
            yAxis: 1,
            data: [5, 2, 8, 10, 21, 15, 7],
            tooltip: {
                valueSuffix: ' 人'
            }
        }]
    });
});

$(function () {
    $('.top-ip').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: '來訪IP TOP10'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ['127.0.0.1', '127.0.0.1', '127.0.0.1', '127.0.0.1', '127.0.0.1', '127.0.0.1', '127.0.0.1', '127.0.0.1', '127.0.0.1', '127.0.0.1'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' '
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [{
            name: '來訪次數',
            color: '#c86969',
            data: [15, 13, 12, 10, 9, 8, 6, 5, 3, 2]
        }]
    });
});
$(function () {
    $('.Browser').highcharts(
    Highcharts.theme = {
        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#9789d6', '#749ac2', '#FF9655', '#FFF263', '#6AF9C4'],
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '已知瀏覽器分佈圖'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#333',
                    connectorColor: '#ccc',
                    formatter: function () {
                        return '<b>' + this.point.name + '</b>: ' + this.percentage + ' %';
                    },
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            color: '#c86969',
            data: [
                ['Firefox', 45.0],
                ['IE', 26.8],
                ['Chrome', 12.8],
                ['Safari', 8.5],
                ['Opera', 6.2],
                ['Others', 0.7]

            ]
        }]
    });
});
$(function () {
    $('.system').highcharts(
    Highcharts.theme = {
        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#9789d6', '#749ac2', '#FF9655', '#FFF263', '#6AF9C4'],
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '已知作業系統分佈圖'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#333',
                    connectorColor: '#ccc',
                    formatter: function () {
                        return '<b>' + this.point.name + '</b>: ' + this.percentage + ' %';
                    },
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            color: '#c86969',
            data: [
                ['Windows XP', 12.0],
                ['Windows 7', 46.8],
                ['Windows 8', 12.2],
                ['Linux', 0.5],
                ['Mac OS', 10.5],
                ['iPad', 1.6],
                ['iPhone', 8.2],
                ['Android', 8.2],

                ]
        }]
    });
});

