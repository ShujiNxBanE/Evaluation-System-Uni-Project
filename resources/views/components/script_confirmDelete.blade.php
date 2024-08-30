<script>
    function confirmDeletion(event, name) {
        if (!confirm("¿Estás seguro de que quieres eliminar " + name + "?")) {
            event.preventDefault();
        }
    }
</script>
