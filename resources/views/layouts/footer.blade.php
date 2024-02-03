<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <script>
          document.write(new Date().getFullYear())
        </script> © ProJs.
      </div>
      <div class="col-sm-6">
        <div class="text-sm-end d-none d-sm-block">
          Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://github.com/UmarMansyur"
            target="_blank" class="text-reset">Projs</a>
        </div>
      </div>
    </div>
  </div>
</footer>
</div>

</div>

<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/libs/metismenujs/metismenujs.min.js"></script>
<script src="/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/assets/libs/eva-icons/eva.min.js"></script>
<script src="/assets/libs/dropzone/dropzone-min.js"></script>
<script src="/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="/assets/js/pages/ecommerce-choices.init.js"></script>
<script src="/assets/libs/apexcharts/apexcharts.min.js"></script>
@if(Request::is('/'))
{{-- <script src="/assets/js/pages/dashboard-sales.init.js"></script> --}}
<script>
  async function getData() {
  const response = await fetch(`{{ route('Data Perolehan Suara') }}`);
  const data = await response.json();
  const sortCalon = data.sort((a, b) => b.jumlah_suara - a.jumlah_suara);
  const jumlah_suara = sortCalon.map(item => item.jumlah_suara);
  const calon = sortCalon.map(item => {
      return item.no_urut + '. ' + item.nama;
  });

  const options = {
      series: [{ data: [ ...jumlah_suara ] }],
      chart: { type: "bar", height: 323, toolbar: { show: !1 } },
      labels: [ ...calon ],
      colors: (barchartColors = getChartColorsArray("sales-countries")),
      plotOptions: { bar: { borderRadius: 4, horizontal: !0 } },
      dataLabels: { enabled: !1 },
      xaxis: {
          categories: [ ...calon ],
      },
  };
  
  const chart = new ApexCharts(
      document.querySelector("#sales-countries"),
      options
  ).render();
}

getData();

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
</script>
@endif
<script src="/assets/js/app.js"></script>