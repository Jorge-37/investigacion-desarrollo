<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Agregar Contenido - CID Pujllay</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/admin.css') }}">

</head>

<body>

    <div class="admin-layout">


        <!-- =================================================
             BARRA LATERAL
             ================================================= -->

        <aside class="sidebar">

            <div class="sidebar-logo">

                <img
                    src="{{ asset('imgs/Logo.jpg') }}"
                    alt="Logo CID Pujllay">

                <h2>
                    CID Pujllay
                </h2>

            </div>


            <nav class="sidebar-menu">

                <a href="{{ route('admin.dashboard') }}">
                    🏠
                    <span>Dashboard</span>
                </a>


                <a
                    href="{{ route('admin.contents.index') }}"
                    class="active">

                    📝
                    <span>Contenido</span>

                </a>


                <a href="{{ route('admin.gallery.index') }}">
                    🖼️
                    <span>Galería</span>
                </a>


                <a href="{{ route('admin.visits.index') }}">
                    🏫
                    <span>Visitas</span>
                </a>


                <a href="#">
                    ⚙️
                    <span>Configuración</span>
                </a>

            </nav>


            <div class="sidebar-bottom">

                <form
                    method="POST"
                    action="{{ route('logout') }}">

                    @csrf

                    <button type="submit">

                        🚪
                        <span>Cerrar sesión</span>

                    </button>

                </form>

            </div>

        </aside>


        <!-- =================================================
             CONTENIDO
             ================================================= -->

        <main class="admin-content">


            <header class="admin-header">

                <div>

                    <h1>
                        Agregar contenido
                    </h1>

                    <p>
                        Agrega un nuevo texto para la página pública.
                    </p>

                </div>


                <div class="admin-user">

                    <span>
                        Administrador
                    </span>

                </div>

            </header>


            <!-- =================================================
                 ERRORES
                 ================================================= -->

            @if($errors->any())

                <div
                    style="
                        background:#f8d7da;
                        color:#721c24;
                        padding:15px;
                        border-radius:8px;
                        margin-bottom:20px;
                    ">

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <section class="quick-actions">


                <form
                    method="POST"
                    action="{{ route('admin.contents.store') }}">

                    @csrf


                    <!-- =================================================
                         SECCIÓN
                         ================================================= -->

                    <div style="margin-bottom:20px;">

                        <label
                            for="section"
                            style="
                                display:block;
                                margin-bottom:8px;
                                font-weight:600;
                            ">

                            Sección

                        </label>


                        <select
                            id="section"
                            name="section"
                            required
                            style="
                                width:100%;
                                padding:12px;
                                border:1px solid #ccc;
                                border-radius:8px;
                                box-sizing:border-box;
                                background:white;
                            ">

                            <option value="">
                                Seleccionar sección
                            </option>


                            <option
                                value="Inicio"
                                {{ old('section') == 'Inicio' ? 'selected' : '' }}>

                                Inicio

                            </option>


                            <option
                                value="Nosotros"
                                {{ old('section') == 'Nosotros' ? 'selected' : '' }}>

                                Nosotros

                            </option>


                            <option
                                value="Galería"
                                {{ old('section') == 'Galería' ? 'selected' : '' }}>

                                Galería

                            </option>


                            <option
                                value="Programas"
                                {{ old('section') == 'Programas' ? 'selected' : '' }}>

                                Programas

                            </option>


                            <option
                                value="Visitas"
                                {{ old('section') == 'Visitas' ? 'selected' : '' }}>

                                Visitas

                            </option>


                            <option
                                value="Silvia TV"
                                {{ old('section') == 'Silvia TV' ? 'selected' : '' }}>

                                Silvia TV

                            </option>


                            <option
                                value="Capacitaciones"
                                {{ old('section') == 'Capacitaciones' ? 'selected' : '' }}>

                                Capacitaciones

                            </option>


                            <option
                                value="Contacto"
                                {{ old('section') == 'Contacto' ? 'selected' : '' }}>

                                Contacto

                            </option>

                        </select>

                    </div>


                    <!-- =================================================
                         CLAVE
                         ================================================= -->

                    <div style="margin-bottom:20px;">

                        <label
                            for="key"
                            style="
                                display:block;
                                margin-bottom:8px;
                                font-weight:600;
                            ">

                            Clave

                        </label>


                        <select
                            id="key"
                            name="key"
                            required
                            style="
                                width:100%;
                                padding:12px;
                                border:1px solid #ccc;
                                border-radius:8px;
                                box-sizing:border-box;
                                background:white;
                            ">

                            <option value="">
                                Primero selecciona una sección
                            </option>

                        </select>

                    </div>


                    <!-- =================================================
                         CONTENIDO
                         ================================================= -->

                    <div style="margin-bottom:25px;">

                        <label
                            for="content"
                            id="contentLabel"
                            style="
                                display:block;
                                margin-bottom:8px;
                                font-weight:600;
                            ">

                            Contenido

                        </label>


                        <textarea
                            id="content"
                            name="content"
                            rows="8"
                            required
                            style="
                                width:100%;
                                padding:12px;
                                border:1px solid #ccc;
                                border-radius:8px;
                                box-sizing:border-box;
                                resize:vertical;
                                font-family:inherit;
                            "
                            placeholder="Escribe el contenido aquí...">{{ old('content') }}</textarea>


                        <small
                            id="contentHelp"
                            style="
                                display:none;
                                margin-top:8px;
                                color:#555;
                            ">

                        </small>

                    </div>


                    <!-- =================================================
                         BOTONES
                         ================================================= -->

                    <div
                        style="
                            display:flex;
                            gap:15px;
                            flex-wrap:wrap;
                        ">

                        <button
                            type="submit"
                            class="action-button"
                            style="
                                border:none;
                                cursor:pointer;
                            ">

                            💾 Guardar contenido

                        </button>


                        <a
                            href="{{ route('admin.contents.index') }}"
                            style="
                                padding:12px 20px;
                                text-decoration:none;
                                border-radius:8px;
                                background:#e5e7eb;
                                color:#333;
                            ">

                            ❌ Cancelar

                        </a>

                    </div>

                </form>

            </section>

        </main>

    </div>


    <script>

        /* =========================================================
           CLAVES DISPONIBLES SEGÚN LA SECCIÓN
           ========================================================= */

        const clavesPorSeccion = {

            "Inicio": [
                "titulo",
                "subtitulo",
                "descripcion"
            ],

            "Nosotros": [
                "nosotros_titulo",
                "nosotros_descripcion",
                "mision",
                "vision"
            ],

            "Galería": [
                "galeria_titulo"
            ],

            "Programas": [
                "programas_titulo",
                "programas_descripcion",
                "robotica_titulo",
                "robotica_descripcion",
                "diseno3d_titulo",
                "diseno3d_descripcion",
                "ia_titulo",
                "ia_descripcion",
                "pensamiento_titulo",
                "pensamiento_descripcion"
            ],

            "Visitas": [
                "visitas_titulo"
            ],

            "Silvia TV": [
                "silvia_titulo",
                "silvia_descripcion",
                "video_youtube"
            ],

            "Capacitaciones": [
                "capacitaciones_titulo",
                "capacitaciones_descripcion",
                "ejercito_titulo",
                "ejercito_descripcion"
            ],

            "Contacto": [
                "contacto_titulo",
                "direccion",
                "telefono",
                "email"
            ]

        };


        const sectionSelect =
            document.getElementById('section');

        const keySelect =
            document.getElementById('key');

        const contentInput =
            document.getElementById('content');

        const contentLabel =
            document.getElementById('contentLabel');

        const contentHelp =
            document.getElementById('contentHelp');


        /* =========================================================
           CARGAR CLAVES
           ========================================================= */

        function cargarClaves(
            seccion,
            claveSeleccionada = ''
        ) {

            keySelect.innerHTML = '';


            if (
                !seccion ||
                !clavesPorSeccion[seccion]
            ) {

                keySelect.innerHTML =
                    '<option value="">Primero selecciona una sección</option>';

                actualizarCampoContenido();

                return;
            }


            const opcionInicial =
                document.createElement('option');

            opcionInicial.value = '';

            opcionInicial.textContent =
                'Seleccionar clave';

            keySelect.appendChild(
                opcionInicial
            );


            clavesPorSeccion[seccion]
                .forEach(function(clave) {

                    const option =
                        document.createElement('option');

                    option.value =
                        clave;

                    option.textContent =
                        clave;


                    if (
                        clave ===
                        claveSeleccionada
                    ) {

                        option.selected =
                            true;
                    }


                    keySelect.appendChild(
                        option
                    );

                });


            actualizarCampoContenido();
        }


        /* =========================================================
           CAMBIAR AYUDA PARA URL DE YOUTUBE
           ========================================================= */

        function actualizarCampoContenido() {

            if (
                keySelect.value ===
                'video_youtube'
            ) {

                contentLabel.textContent =
                    'URL del video de YouTube';

                contentInput.placeholder =
                    'Ejemplo: https://www.youtube.com/watch?v=XXXXXXXXXXX';

                contentInput.rows = 3;

                contentHelp.style.display =
                    'block';

                contentHelp.textContent =
                    'Pega aquí el enlace normal del video de YouTube. No necesitas convertirlo manualmente a /embed/.';

            }

            else {

                contentLabel.textContent =
                    'Contenido';

                contentInput.placeholder =
                    'Escribe el contenido aquí...';

                contentInput.rows = 8;

                contentHelp.style.display =
                    'none';

                contentHelp.textContent =
                    '';

            }

        }


        /* =========================================================
           EVENTOS
           ========================================================= */

        sectionSelect.addEventListener(
            'change',
            function() {

                cargarClaves(
                    this.value
                );

            }
        );


        keySelect.addEventListener(
            'change',
            actualizarCampoContenido
        );


        /* =========================================================
           RECUPERAR OLD() SI HUBO ERROR
           ========================================================= */

        document.addEventListener(
            'DOMContentLoaded',
            function() {

                const seccionAnterior =
                    "{{ old('section') }}";

                const claveAnterior =
                    "{{ old('key') }}";


                if (seccionAnterior) {

                    cargarClaves(
                        seccionAnterior,
                        claveAnterior
                    );

                }

                actualizarCampoContenido();

            }
        );

    </script>

</body>

</html>