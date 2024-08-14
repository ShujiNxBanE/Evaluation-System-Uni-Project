<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/gestor-archivos.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="gestor text-center text-2xl">
        <button type="button" class="float-left"
            onclick="window.location.href='{{ url('/app/proceso/estructuraPrograma') }}'">
            <img src="{{ asset('resources/flecha-izquierda-azul.png')}}" alt="flecha-izquierda-azul"
                class="w-8 h-auto float-left">
        </button>
        <h1>Informe de Resultados del Indicador</h1>
    </header>
    <div class="content">
        <div class="shadow-md p-4 rounded-xl bg-blue-700 text-left text-justify text-base">
            <h1>AT. CATEGORÍA APOYO TECNOLÓGICO</h1>
            <p>AT1. Se ha implementado un plan operativo documentado sobre tecnologías que incluye medidas de seguridad electrónicas (p. ej., protección de contraseñas, cifrado, exámenes en línea o supervisión segura etc.) para garantizar las normas de calidad de acuerdo a la normativa internacional.</p>
        </div>

        <div class="p-4">
            <table class="min-w-full border border-zinc-300">
              <thead>
                <tr>
                  <th class="border border-zinc-300 text-left p-2">Puntaje</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="border border-zinc-300 p-2">
                    <label class="flex items-center">
                      <input type="radio" name="puntaje" value="0" class="mr-2" />
                      No observado [0]
                    </label>
                  </td>
                </tr>
                <tr>
                  <td class="border border-zinc-300 p-2">
                    <label class="flex items-center">
                      <input type="radio" name="puntaje" value="1" class="mr-2" />
                      Escasamente observado [1]
                    </label>
                  </td>
                </tr>
                <tr>
                  <td class="border border-zinc-300 p-2">
                    <label class="flex items-center">
                      <input type="radio" name="puntaje" value="2" class="mr-2" />
                      Implementación moderada [2]
                    </label>
                  </td>
                </tr>
                <tr>
                  <td class="border border-zinc-300 p-2">
                    <label class="flex items-center">
                      <input type="radio" name="puntaje" value="3" class="mr-2" />
                      Cumple satisfactoriamente con el criterio [3]
                    </label>
                  </td>
                </tr>
              </tbody>
            </table>

            <div class="mt-4 text-base">
              <label for="comentarios" class="block mb-2">Comentarios:</label>
              <textarea id="comentarios" rows="4" class="w-full border border-zinc-300 p-2 text-black"
              placeholder="Escribe tus comentarios aquí..."></textarea>
            </div>

            <div class="mt-4 text-base">
              <label for="sugerencias" class="block mb-2">Sugerencias:</label>
              <textarea id="sugerencias" rows="4" class="w-full border border-zinc-300 p-2 text-black"
              placeholder="Escribe tus sugerencias aquí..."></textarea>
            </div>
          </div>
          <div class="flex justify-center">
            <button class="border-2 border-white p-1 bg-blue-900 rounded-md text-base">Guardar</button>
        </div>
    </div>
</body>
</html>
