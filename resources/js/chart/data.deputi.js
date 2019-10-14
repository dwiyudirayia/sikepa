export const dataDeputi = {
    type: 'bar',
    data: {
        labels: ['Dalam Negeri', 'Luar Negeri', 'Total'],
        datasets: [{
            label: '# of Votes',
            data: [12, 20, 32],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
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

export default dataDeputi;
