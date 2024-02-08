<script src="{{ asset('assets/js/app.js') }}"></script>

{{-- Datatables --}}
<script src="{{ asset('assets/vendor/DataTable/js/jquery-3.7.0.js') }}"></script>
<script src="{{ asset('assets/vendor/DataTable/js/jquery.dataTable.min.js') }}"></script>
<script src="{{ asset('assets/vendor/DataTable/js/dataTables.bootstrap5.min.js') }}"></script>
<script>
    new DataTable('#myTable');
    new DataTable('#myTable1');
    new DataTable('#myTable2');
</script>

{{-- Tooltip --}}
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

{{-- Calendar --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
        var defaultDate =
            date.getUTCFullYear() +
            "-" +
            (date.getUTCMonth() + 1) +
            "-" +
            date.getUTCDate();
        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: '<span title="Previous month">&laquo;</span>',
            nextArrow: '<span title="Next month">&raquo;</span>',
            defaultDate: defaultDate,
        });
    });
</script>

{{-- Maxlenth --}}
<script>
    var maxNis = document.getElementById('nis');
    var maxNisn = document.getElementById('nisn');
    var maxWahtsapp = document.getElementById('whatsapp')

    maxNis.addEventListener('input', function() {
        maxNis.value = maxNis.value.slice(0, 13);
    })
    maxNisn.addEventListener('input', function() {
        maxNisn.value = maxNisn.value.slice(0, 10);
    })
    maxWahtsapp.addEventListener('input', function() {
        maxWahtsapp.value = maxWahtsapp.value.slice(0, 13)
    })
</script>
