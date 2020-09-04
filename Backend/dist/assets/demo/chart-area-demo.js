// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [{
      label: "Revenue",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.1)",
      borderColor: "rgba(2,117,216)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [januaryRevenue, februaryRevenue, marchRevenue, aprilRevenue, mayRevenue, juneRevenue],
    }, {
      label: "Cost",
      lineTension: 0.3,
      backgroundColor: "rgba(220,53,69,0.2)",
      borderColor: "rgba(220,53,69,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(220,53,69,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(220,53,69,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [januaryCost, februaryCost, marchCost, aprilCost, mayCost, juneCost],
    }, {
      label: "Profit",
      lineTension: 0.3,
      backgroundColor: "rgba(40,167,69,0.3)",
      borderColor: "rgba(40,167,69,1)",
      pointRadius: 5,
      pointBackgroundColor: "green",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(40,167,69,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [januaryProfit, februaryProfit, marchProfit, aprilProfit, mayProfit, juneProfit],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: true
    }
  }
});