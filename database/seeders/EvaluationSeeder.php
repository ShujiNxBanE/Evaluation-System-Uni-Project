<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationSeeder extends Seeder
{

    protected $evaluations = [
        ['description' => 'La institución cuenta con una estructura de gobierno que permite un proceso eficaz e integral de toma de decisiones en relación con la educación en línea.', 'category_id' => 1],
        ['description' => 'Se implementan políticas y directrices con el fin de verificar que los alumnos que están inscritos en los cursos en línea y reciben créditos universitarios sean efectivamente, quienes realizan las tareas del curso.', 'category_id' => 1],
        ['description' => 'Existe una política de propiedad intelectual en torno a los materiales del programa.', 'category_id' => 1],
        ['description' => 'La institución ha definido el valor estratégico del aprendizaje en línea, para su propia institución, y para las partes interesadas.', 'category_id' => 1],
        ['description' => 'La estructura organizativa del programa en línea apoya la política, plan estratégico, valores y cultura de la institución.', 'category_id' => 1],
        ['description' => 'Se revisa periódicamente el plan estratégico del programa con el fin de asegurar su actualización y mejora continua.', 'category_id' => 1],
        ['description' => 'La institución cuenta con un proceso de planificación y asignación de los recursos financieros según el plan estratégico del programa en línea.', 'category_id' => 1],
        ['description' => 'La institución cuenta con los mecanismos necesarios para garantizar que la gestión del programa en línea se mejora sistemáticamente y de manera permanente.', 'category_id' => 1],
        ['description' => 'Se ha implementado un plan operativo documentado sobre tecnologías que incluye medidas de seguridad electrónicas (p. ej., protección de contraseñas, cifrado, exámenes en línea o supervisión segura etc.) para garantizar las normas de calidad de acuerdo a la normativa internacional.', 'category_id' => 2],
        ['description' => 'Los sistemas de distribución de tecnologías son altamente confiables y funcionales y de normas susceptibles a la medición, tales como seguimiento del tiempo de inactividad de los sistemas o el establecimiento de parámetros para las tareas.', 'category_id' => 2],
        ['description' => 'Existe un sistema centralizado que brinda el soporte necesario para la construcción y el mantenimiento de la infraestructura educativa en línea.', 'category_id' => 2],
        ['description' => 'La tecnología que sustenta el desarrollo de los cursos se considera como un sistema de misión y prioridad crítica y, como tal, cuenta con el soporte necesario.', 'category_id' => 2],
        ['description' => 'La institución mantiene un sistema de copias de seguridad que asegura la disponibilidad y seguridad de los datos.', 'category_id' => 2],
        ['description' => 'El cuerpo docente, el personal administrativo y los alumnos reciben ayuda para el desarrollo y el uso apropiado de las nuevas tecnologías y habilidades.', 'category_id' => 2],
        ['description' => 'Se cuenta con el equipo que garantice la estabilidad del suministro eléctrico necesario para la oferta del programa en línea.', 'category_id' => 2],
        ['description' => 'Se cuenta con un plan de recuperación de desastres para los equipos y los sistemas informáticos.', 'category_id' => 2],
        ['description' => 'Se utilizan directrices en lo que se refiere a las normas mínimas para el desarrollo, diseño, enseñanza y el aprendizaje del programa (tales como elementos de los programas de estudios de los cursos, estrategias de evaluación, observaciones y comentarios del cuerpo docente).', 'category_id' => 3],
        ['description' => 'La tecnología se utiliza como una herramienta para el logro de resultados de aprendizaje en el desarrollo del contenido del programa en línea.', 'category_id' => 3],
        ['description' => 'Los materiales instruccionales, los programas de estudios y los resultados del aprendizaje, se revisan periódicamente con el fin de asegurarse que cumplan con las normas del curso en línea.', 'category_id' => 3],
        ['description' => 'Los cursos están diseñados de tal manera que los alumnos desarrollen los conocimientos y las habilidades necesarios para alcanzar los objetivos de aprendizaje tanto a nivel del curso como del programa. Estos pueden incluir la participación a través del análisis, la síntesis y la evaluación.', 'category_id' => 3],
        ['description' => 'Los objetivos de aprendizaje describen resultados que son susceptibles de medición.', 'category_id' => 3],
        ['description' => 'Las evaluaciones seleccionadas miden los objetivos de aprendizaje de los cursos y son adecuadas para un entorno de aprendizaje en línea.', 'category_id' => 3],
        ['description' => 'La instrucción centrada en las necesidades del alumno se tiene en cuenta durante el proceso de desarrollo del programa.', 'category_id' => 3],
        ['description' => 'Hay congruencia en el desarrollo de los cursos en línea por medio de una organización y diseño homogéneo.', 'category_id' => 3],
        ['description' => 'El diseño de los cursos en línea promueve la participación tanto del cuerpo docente como del alumnado.', 'category_id' => 3],
        ['description' => 'Se evalúan y recomiendan tecnologías actuales y emergentes para la enseñanza y el aprendizaje en línea.', 'category_id' => 3],
        ['description' => 'Se ofrece un diseño instruccional para la aplicación de una pedagogía eficaz para las sesiones de clases tanto sincrónicas como asincrónicas.', 'category_id' => 3],
        ['description' => 'El desarrollo curricular es una responsabilidad central del cuerpo docente (dicho de otro modo, el cuerpo docente debe participar ya sea en el desarrollo o en el proceso de la toma de decisiones en torno a las opciones curriculares en línea).', 'category_id' => 3],
        ['description' => 'Los contenidos son actuales y adecuados para los alumnos (son adaptados a quienes están dirigidos).', 'category_id' => 3],
        ['description' => 'Se dispone de medios alternativos para la publicación de contenidos (CDs) para los alumnos que no disponen de acceso permanente a Internet o de conexiones de baja velocidad.', 'category_id' => 3],
        ['description' => 'Las unidades de aprendizaje se asocian a otros recursos y actividades que permitan concretar lo aprendido y el desarrollo de la creatividad.', 'category_id' => 3],
        ['description' => 'Se proponen diversas actividades, adaptadas a las diferentes estrategias de aprendizaje. (simulaciones, estudios de caso, etc.).', 'category_id' => 3],
        ['description' => 'Se ha previsto y se dispone de licencias para la publicación de contenidos (Creative Commons, copyright, etc.).', 'category_id' => 3],
        ['description' => 'Se dispone de sistemas de evaluación alternativos para los alumnos que no disponen de acceso permanente a Internet.', 'category_id' => 3],
        ['description' => 'Se aplican pruebas de usabilidad incorporando las recomendaciones emitidas o resultados obtenidos.', 'category_id' => 3],
        ['description' => 'Se utilizan las pautas de accesibilidad del Web Content Accessibility Guidelines (WCAG)', 'category_id' => 3],
        ['description' => 'El sitio del programa en línea u otro sitio web incluye una descripción resumida de los objetivos del programa, los resultados de aprendizaje, los métodos de evaluación, información sobre los libros de texto y demás información relacionada con la programación, por lo que los requisitos del programa son transparentes al momento de la inscripción.', 'category_id' => 4],
        ['description' => 'La institución se asegura de que todos los alumnos del programa de educación en línea, independientemente de dónde se encuentren, tengan acceso a bibliotecas/recursos de aprendizaje adecuados como apoyo de los cursos que toman.', 'category_id' => 4],
        ['description' => 'El programa de estudios detalla claramente las expectativas en torno al cumplimiento de consignas, la política de calificaciones y la respuesta del cuerpo docente.', 'category_id' => 4],
        ['description' => 'El programa ofrece enlaces o explicaciones de soporte técnico (p. ej., cada curso tiene disponibles soluciones sugeridas para posibles inconvenientes técnicos y/o enlaces a otros sitios que brindan asistencia técnica).', 'category_id' => 4],
        ['description' => 'Los alumnos pueden acceder fácilmente a los materiales instructivos y estos son fáciles de usar.', 'category_id' => 4],
        ['description' => 'El programa da una respuesta adecuada a las necesidades de los alumnos con discapacidades a través de estrategias instructivas alternativas y/o remisión a recursos institucionales especiales.', 'category_id' => 4],
        ['description' => 'Se brindan oportunidades/herramientas a fin de fomentar la colaboración alumno-alumno (tales como conferencia web, mensajería instantánea, etc.) cuando ello resulta oportuno.', 'category_id' => 4],
        ['description' => 'Los documentos que se adjuntan a los módulos se encuentran en un formato que permite un acceso fácil con diferentes sistemas operativos y software de productividad (PDF, por ejemplo).', 'category_id' => 4],
        ['description' => 'Se publican las reglas de “convivencia” en red.', 'category_id' => 4],
        ['description' => 'La interacción alumno-alumnos y docente-alumno es una característica fundamental y se facilita de diferentes maneras.', 'category_id' => 5],
        ['description' => 'Las observaciones y los comentarios sobre consignas y preguntas de los alumnos son constructivos y oportunos.', 'category_id' => 5],
        ['description' => 'Los alumnos aprenden métodos adecuados para la investigación eficaz, incluidas la evaluación de la validez de los recursos y la capacidad de dominio de los recursos en un entorno en línea.', 'category_id' => 5],
        ['description' => 'Se les brinda a los alumnos acceso a profesionales y recursos bibliográficos que les ayudan a hacer frente a la excesiva cantidad de recursos en línea que tienen a su disposición.', 'category_id' => 5],
        ['description' => 'Los instructores usan estrategias específicas para generar una presencia en el curso.', 'category_id' => 5],
        ['description' => 'Se utiliza el correo electrónico, chat, foro y medios no comunitarios para comunicaciones de carácter privado.', 'category_id' => 5],
        ['description' => 'Debe ofrecérseles a los alumnos un medio para interactuar con otros alumnos en una comunidad en línea (fuera del curso).', 'category_id' => 6],
        ['description' => 'Se les brinda a los docentes asistencia técnica específicamente orientada al desarrollo del programa en línea y al aprendizaje en línea.', 'category_id' => 7],
        ['description' => 'Los instructores están preparados para impartir cursos educativos en línea y la institución se asegura de que los docentes reciban capacitación, asistencia y apoyo durante el desarrollo y el dictado de los cursos del programa.', 'category_id' => 7],
        ['description' => 'Los docentes reciben capacitación y materiales relativos al uso legítimo de obras, plagio y otros conceptos legales y éticos relevantes.', 'category_id' => 7],
        ['description' => 'Los docentes gozan de un desarrollo profesional constante en relación con la enseñanza y el aprendizaje en línea.', 'category_id' => 7],
        ['description' => 'Se establecen normas claras para la participación docente, y las expectativas en torno a la enseñanza en línea (Se cuenta con tiempos de respuesta máximos para resolver las dudas de los estudiantes, datos de contacto, etc.)', 'category_id' => 7],
        ['description' => 'Se ofrecen talleres para docentes destinados a mantenerlos informados acerca de las tecnologías emergentes, la elección y uso de estas herramientas.', 'category_id' => 7],
        ['description' => 'Antes del inicio de un programa en línea, se le informa a los alumnos las características del programa a fin de determinar si cuentan con la automotivación y el compromiso necesarios para emprender un aprendizaje en línea.', 'category_id' => 8],
        ['description' => 'Antes del inicio de un programa en línea, se informa a los alumnos las características del mismo a fin de determinar si tienen acceso a los requisitos tecnológicos mínimos exigidos por el diseño del programa.', 'category_id' => 8],
        ['description' => 'Los estudiantes reciben (o tienen acceso a) información acerca de los programas, incluidos los requisitos de admisión, matrícula y cuotas, libros e insumos, requisitos técnicos y de supervisión de exámenes y servicios de apoyo para alumnos antes de la admisión y la inscripción en los cursos.', 'category_id' => 8],
        ['description' => 'Los alumnos reciben acceso a la capacitación y la información que necesitarán para obtener los materiales obligatorios a través de bases de datos electrónicas, préstamos interbibliotecarios, archivos gubernamentales, nuevos servicios y otras fuentes.', 'category_id' => 8],
        ['description' => 'A lo largo del programa, los alumnos tienen acceso a asistencia técnica y personal de soporte técnico adecuados.', 'category_id' => 8],
        ['description' => 'El personal de soporte técnico y/o académico se encuentra a disposición de los alumnos para dar respuesta a las preguntas, problemas, detección de errores, virus, quejas y reclamos de los alumnos.', 'category_id' => 8],
        ['description' => 'Los alumnos tienen acceso a orientación y asesoramiento académico, personal y profesional eficaz.', 'category_id' => 8],
        ['description' => 'Se establecen y ponen a disposición de los alumnos los requisitos tecnológicos mínimos.', 'category_id' => 8],
        ['description' => 'Se ofrecen servicios de apoyo a alumnos fuera del aula, tales como asesoramiento académico, ayuda financiera, apoyo de colegas y pares, etc.', 'category_id' => 8],
        ['description' => 'Se implementan políticas y procesos dirigidos a la atención de personas con discapacidad de acuerdo a la normativa nacional.', 'category_id' => 8],
        ['description' => 'Se le brinda a los alumnos fácil acceso a los materiales obligatorios de los cursos en formato impreso y/o digital, por ejemplo, a través de la provisión de ISBN (Número Internacional Normalizado del Libro) para libros de texto, proveedores de libros y modos de entrega.', 'category_id' => 8],
        ['description' => 'El programa demuestra un enfoque centrado en las necesidades de los alumnos en lugar de intentar incorporar el servicio para los alumnos de programas que asisten al predio de la universidad.', 'category_id' => 8],
        ['description' => 'Se toman medidas para promover la participación de los alumnos en el programa y en la institución.', 'category_id' => 8],
        ['description' => 'Se brinda a los alumnos información sobre las vías adecuadas de comunicación con los docentes y los demás alumnos.', 'category_id' => 8],
        ['description' => 'La institución brinda orientación tanto a alumnos como a docentes en relación con el uso de todas las formas de tecnología que se usan en el dictado de los cursos.', 'category_id' => 8],
        ['description' => 'Se dispone de tutorías disponibles como un recurso de aprendizaje.', 'category_id' => 8],
        ['description' => 'Se le brinda a los alumnos información sobre las maneras adecuadas de solicitar ayuda del programa.', 'category_id' => 8],
        ['description' => 'Existen listas de preguntas frecuentes para responder a las dudas más habituales sobre la oferta y el desarrollo del programa en línea.', 'category_id' => 8],
        ['description' => 'Se aplica un curso de formación técnica para los alumnos.', 'category_id' => 8],
        ['description' => 'Se evalúan a nivel básico las habilidades técnicas de los alumnos antes de que comiencen un programa en línea.', 'category_id' => 8],
        ['description' => 'El programa se pone a prueba a través de un proceso de evaluación que aplica normas establecidas específicas.', 'category_id' => 9],
        ['description' => 'Se usan diferentes datos (información académica y administrativa) para evaluar regular y frecuentemente la eficacia del programa y para orientar los cambios hacia la mejora continua.', 'category_id' => 9],
        ['description' => 'Se revisan regularmente los resultados de aprendizaje previstos en el curso y en el programa a fin de garantizar su claridad, utilidad e idoneidad.', 'category_id' => 9],
        ['description' => 'Se implementa un proceso para la evaluación de los servicios de apoyo a docentes y alumnos.', 'category_id' => 9],
        ['description' => 'Se evalúa el grado de culminación del programa en línea.', 'category_id' => 9],
        ['description' => 'Se analiza y revisa el grado de convocatoria y retención en el programa.', 'category_id' => 9],
        ['description' => 'El programa demuestra cumplimiento y revisión de las normas de accesibilidad.', 'category_id' => 9],
        ['description' => 'Las evaluaciones del curso se analizan en relación con las evaluaciones de desempeño de los docentes.', 'category_id' => 9],
        ['description' => 'Se evalúa regularmente el desempeño de los docentes.', 'category_id' => 9],
        ['description' => 'Existe una alineación de los resultados de aprendizaje de un curso a otro.', 'category_id' => 9],
        ['description' => 'Las evaluaciones del curso recogen las observaciones, los comentarios y los aportes de los alumnos en cuanto a la calidad de los contenidos y a la eficacia de la instrucción.', 'category_id' => 9],
        ['description' => 'La administración y el plan estratégico del programa en línea están supervisados para identificar posibles debilidades y establecer los planes de mejora continua.', 'category_id' => 9],
        ['description' => 'Se mide la satisfacción de los estudiantes y los clientes externos con respeto al programa en línea.', 'category_id' => 9],
    ];

    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('evaluations')->truncate();
        DB::table('evaluations')->insert(
            array_map(function ($evaluation) {
                return [
                    'description' => $evaluation['description'],
                    'category_id' => $evaluation['category_id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $this->evaluations));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
