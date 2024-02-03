function getChartColorsArray(r) {
    if (null !== document.getElementById(r)) {
        var e = document.getElementById(r).getAttribute("data-colors");
        return (e = JSON.parse(e)).map(function (r) {
            var e = r.replace(" ", "");
            if (-1 == e.indexOf("--")) return e;
            var t = getComputedStyle(document.documentElement).getPropertyValue(
                e
            );
            return t || void 0;
        });
    }
}
const options = {
    series: [{ data: [700, 670, 640, 570, 304] }],
    chart: { type: "bar", height: 323, toolbar: { show: !1 } },
    labels: [
        "Hamim Susilo - 01",
        "Adi Kusuma Darmawan - 02",
        "Yusuf Hanafi - 04",
        "Abudullah Sidik - 03",
        "Deni Kurniawan - 05",
    ],
    colors: (barchartColors = getChartColorsArray("sales-countries")),
    plotOptions: { bar: { borderRadius: 4, horizontal: !0 } },
    dataLabels: { enabled: !1 },
    xaxis: {
        categories: [
            "Hamim Susilo - 01",
            "Adi Kusuma Darmawan - 02",
            "Yusuf Hanafi - 04",
            "Abudullah Sidik - 03",
            "Deni Kurniawan - 05",
        ],
    },
};

const chart = new ApexCharts(
    document.querySelector("#sales-countries"),
    options
).render();