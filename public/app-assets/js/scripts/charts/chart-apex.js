/*=========================================================================================
    File Name: chart-apex.js
    Description: Apexchart Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function () {

  var $primary = '#7367F0',
    $success = '#28C76F',
    $danger = '#EA5455',
    $warning = '#FF9F43',
    $info = '#00cfe8',
    $label_color_light = '#dae1e7';

  var themeColors = [$success, $danger, $warning, $info, $primary];

  // RTL Support
  var yaxis_opposite = false;
  if($('html').data('textdirection') == 'rtl'){
    yaxis_opposite = true;
  }

  // Column Chart
  // ----------------------------------
  var columnChartOptions = {
    chart: {
      height: 450,
      type: 'bar',
    },
    colors: themeColors,
    plotOptions: {
      bar: {
        horizontal: false,
        endingShape: 'rounded',
        columnWidth: '20%',
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
    series: [{
      name: 'Preparación',
      data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }, {
      name: 'Construcción',
      data: [-76, -85, -101, -98, -87, -105, -91, -114, -94]
    },{
        name: 'Mantenimiento',
        data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
    },
        {
      name: 'Abandono',
      data: [-15, -28, -90, -78, -60, -55, -100, -110, -40]
    }],
    legend: {
      offsetY: -10
    },
    xaxis: {
      categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    },
    yaxis: {
      title: {
        text: '(ESCALA)'
      },
      opposite: yaxis_opposite
    },
    fill: {
      opacity: 1

    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val /*+ " thousands"*/
        }
      }
    }
  }
  var columnChart = new ApexCharts(
    document.querySelector("#column-chart"),
    columnChartOptions
  );

  columnChart.render();

  // Radar Chart
  // -----------------------------
  var radarChartOptions = {
    chart: {
      height: 350,
      type: 'radar',
    },
    colors: themeColors,
      series: [{
          name: 'Preparación',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
      }, {
          name: 'Construcción',
          data: [-76, -85, -101, -98, -87, -105, -91, -114, -94]
      },{
          name: 'Mantenimiento',
          data: [-15, -28, -90, -78, -60, -55, -100, -110, -40]
      },
      {
          name: 'Abandono',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
      }],
    labels: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    dataLabels: {
      style: {
        color: $label_color_light
      }
    }
  }
  var radarChart = new ApexCharts(document.querySelector("#radar-chart"), radarChartOptions);
  radarChart.render();
  });
