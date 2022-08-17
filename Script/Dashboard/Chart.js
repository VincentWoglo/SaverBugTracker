const labels = [
'Jan',
'Feb',
'Mar',
'Apr',
'May',
'Jun',
'Jul',
'Aug'

];

const data = {
labels: labels,
datasets: [
    {
    label: 'Projects Created',
    backgroundColor: '#52489C',
    borderColor: '#52489C',
    data: [0,10,20,30,40,50,60,70],
    },
    {
        label: 'Projects In-Complete',
        backgroundColor: '#D44D5C',
        borderColor: '#D44D5C',
        data: [0,13,2,7,40,30,90,50],
    },
    {
      label: 'Projects as Created',
      backgroundColor: '#9FA2B4',
      borderColor: '#9FA2B4',
      data: [0,10,40,50,10,50,60,70],
    },
    {
        label: 'Projects as-Complete',
        backgroundColor: '#FFE66D',
        borderColor: '#FFE66D',
        data: [10,23,10,70,40,30,90,50],
    }
]
};

const config = {
    type: 'line',
    data: data,
    options: {
      responsive: true,
      interaction: {
        mode: 'index',
        intersect: false,
      },
      stacked: false,
      plugins: {
        title: {
          display: false,
          text: 'Project Monthly Chart'
        }
      },
      scales: {
        y: {
          type: 'linear',
          display: true,
          position: 'left',
        },
      }
    },
  };

 
/* Rendering the Chart */
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);