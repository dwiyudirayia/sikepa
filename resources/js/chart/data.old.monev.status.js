import $axios from '@/api.js';

const getData = async () => {
    let res = await $axios.get('/admin/dashboard');
    let { data } = res.data;
}

console.log(getData());

export const dataOldMonevStatus = {
    type: 'bar',
    data: {
        labels: ['2014', '2015', '2016', '2017', '2018', '2019'],
        datasets: [{
            label: '# of Votes',
            data: getData.setObject,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        title: {
            display: !1
        },
        tooltips: {
            intersect: !1,
            mode: "nearest",
            xPadding: 10,
            yPadding: 10,
            caretPadding: 10
        },
        legend: {
            display: !1
        },
        responsive: !0,
        barRadius: 4,
        scales: {
            xAxes: [{
                display: !1,
                gridLines: !1,
                stacked: !0
            }],
            yAxes: [{
                display: !1,
                stacked: !0,
                gridLines: !1
            }]
        },
        layout: {
            padding: {
                left: 0,
                right: 0,
                top: 0,
                bottom: 0
            }
        }
    }
    // options: {
    //     title: {
    //         display: !1
    //     },
    //     tooltips: {
    //         intersect: !1,
    //         mode: "nearest",
    //         xPadding: 10,
    //         yPadding: 10,
    //         caretPadding: 10
    //     },
    //     legend: {
    //         display: !1
    //     },
    //     responsive: !0,
    //     maintainAspectRatio: !1,
    //     barRadius: 4,
    //     scales: {
    //         xAxes: [{
    //             display: !1,
    //             gridLines: !1,
    //             stacked: !0
    //         }],
    //         yAxes: [{
    //             display: !1,
    //             stacked: !0,
    //             gridLines: !1
    //         }]
    //     },
    //     layout: {
    //         padding: {
    //             left: 0,
    //             right: 0,
    //             top: 0,
    //             bottom: 0
    //         }
    //     }
    // }
}

export default dataOldMonevStatus;
