<script>
    document.getElementById('dateForm').addEventListener('submit', function(event) {
        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;

        if (startDate && endDate && startDate > endDate) {
            alert('La fecha de culminación no puede ser anterior a la fecha de inicio.');
            event.preventDefault(); // Detiene el envío del formulario
        }
    });
</script>
