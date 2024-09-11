<!-- Modal sin fondo oscuro -->
<div id="myModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <!-- Contenido del Modal -->
    <div class="bg-white rounded-lg w-full max-w-md mx-4 sm:w-2/3 md:w-1/3 p-6 shadow-xl border-4 border-red-600">
        <div class="flex items-start mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">
                No puedes eliminar esta categoría, hay evidencias subidas y podrías arruinar el vínculo de acceso a ellas.
            </h2>
        </div>
        <!-- Botón de Cerrar -->
        <div class="flex justify-end mt-4">
            <button
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                onclick="closeModal()"
            >
                Cerrar
            </button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('myModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('myModal').classList.add('hidden');
    }
</script>
