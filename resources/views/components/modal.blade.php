<!-- Modal -->
<div id="myModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <!-- Contenido del Modal -->
    <div class="bg-white rounded-lg w-full max-w-md mx-4 sm:w-2/3 md:w-1/3 p-3">
      <h2 class="text-2xl font-semibold mb-4 text-gray-800">Escala de Valoración</h2>
      <div class="overflow-auto">
        <table class="w-full text-left text-sm text-gray-700">
          <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
            <tr>
              <th class="py-2 px-4">Escala</th>
              <th class="py-2 px-4">Referencia</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b">
              <td class="py-2 px-4"><b>0</b> puntos</td>
              <td class="py-2 px-4"><b>No observado.</b> El administrador no observa ningún indicador de la norma de calidad evaluada.</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 px-4"><b>1</b> punto</td>
              <td class="py-2 px-4"><b>Escasamente observado.</b> El administrador ha identificado una mínima presencia de la norma de calidad evaluada. Esta área todavía necesita muchas mejoras.</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 px-4"><b>2</b> puntos</td>
              <td class="py-2 px-4"><b>Implementación moderada.</b> El administrador ha identificado una implementación moderada de la norma de calidad. Esta área todavía necesita ciertas mejoras.</td>
            </tr>
            <tr>
              <td class="py-2 px-4"><b>3</b> puntos</td>
              <td class="py-2 px-4"><b>Cumple satisfactoriamente con el criterio.</b> El administrador ha determinado que la norma de calidad se está implementando satisfactoriamente y no hay necesidad de mejora en esta área.</td>
            </tr>
          </tbody>
        </table>
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
