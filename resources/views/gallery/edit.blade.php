<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar recurso - CID Pujllay</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <div class="admin-layout">

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
                    🏠 <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.contents.index') }}">
                    📝 <span>Contenido</span>
                </a>

                <a
                    href="{{ route('admin.gallery.index') }}"
                    class="active">

                    🖼️ <span>Galería</span>

                </a>

                <a href="{{ route('admin.visits.index') }}">
                    🏫 <span>Visitas</span>
                </a>

                <a href="#">
                    ⚙️ <span>Configuración</span>
                </a>

            </nav>


            <div class="sidebar-bottom">

                <form
                    method="POST"
                    action="{{ route('logout') }}">

                    @csrf

                    <button type="submit">

                        🚪 <span>Cerrar sesión</span>

                    </button>

                </form>

            </div>

        </aside>


        <main class="admin-content">


            <header class="admin-header">

                <div>

                    <h1>
                        Editar recurso
                    </h1>

                    <p>
                        Puedes reemplazar una imagen por otra imagen,
                        cambiarla por un video o volver de video a imagen.
                    </p>

                </div>


                <div class="admin-user">

                    <span>
                        Administrador
                    </span>

                </div>

            </header>



            @if($errors->any())

            <div
                style="
                    padding:15px;
                    margin-bottom:20px;
                    background:#f8d7da;
                    color:#842029;
                    border-radius:8px;
                ">

                <strong>
                    Revisa los siguientes datos:
                </strong>

                <ul
                    style="
                        margin-top:10px;
                        margin-bottom:0;
                    ">

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
                    action="{{ route('admin.gallery.update', $gallery) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    @method('PUT')



                    <!-- =========================
                     SECCIÓN
                     ========================= -->

                    <div style="margin-bottom:20px;">

                        <label
                            for="section"
                            style="
                            display:block;
                            font-weight:700;
                            margin-bottom:8px;
                        ">

                            Sección *

                        </label>


                        <select
                            name="section"
                            id="section"
                            required
                            style="
                            width:100%;
                            padding:12px;
                            border:1px solid #ccc;
                            border-radius:8px;
                            background:white;
                        ">


                            <option value="">
                                Selecciona una sección
                            </option>


                            <option
                                value="Inicio"
                                {{ old('section', $gallery->section) === 'Inicio' ? 'selected' : '' }}>

                                Inicio

                            </option>


                            <option
                                value="Galería"
                                {{ old('section', $gallery->section) === 'Galería' ? 'selected' : '' }}>

                                Galería

                            </option>


                            <option
                                value="Programas"
                                {{ old('section', $gallery->section) === 'Programas' ? 'selected' : '' }}>

                                Programas

                            </option>


                            <option
                                value="Visitas"
                                {{ old('section', $gallery->section) === 'Visitas' ? 'selected' : '' }}>

                                Visitas

                            </option>


                            <option
                                value="Silvia TV"
                                {{ old('section', $gallery->section) === 'Silvia TV' ? 'selected' : '' }}>

                                Silvia TV

                            </option>


                            <option
                                value="Capacitaciones"
                                {{ old('section', $gallery->section) === 'Capacitaciones' ? 'selected' : '' }}>

                                Capacitaciones

                            </option>


                        </select>

                    </div>



                    <!-- =========================
                     NOMBRE DEL RECURSO
                     ========================= -->

                    <div style="margin-bottom:20px;">

                        <label
                            for="name"
                            style="
                            display:block;
                            font-weight:700;
                            margin-bottom:8px;
                        ">

                            Nombre *

                        </label>


                        <select
                            name="name"
                            id="name"
                            required
                            style="
                            width:100%;
                            padding:12px;
                            border:1px solid #ccc;
                            border-radius:8px;
                            background:white;
                        ">

                            <option value="">
                                Selecciona un recurso
                            </option>

                        </select>

                    </div>



                    <!-- =========================
                     TIPO
                     ========================= -->

                    <div style="margin-bottom:20px;">

                        <label
                            for="type"
                            style="
                            display:block;
                            font-weight:700;
                            margin-bottom:8px;
                        ">

                            Tipo *

                        </label>


                        <select
                            name="type"
                            id="type"
                            required
                            style="
                            width:100%;
                            padding:12px;
                            border:1px solid #ccc;
                            border-radius:8px;
                            background:white;
                        ">


                            <option value="">
                                Selecciona un tipo
                            </option>


                            <option
                                value="Imagen"
                                {{ old('type', $gallery->type) === 'Imagen' ? 'selected' : '' }}>

                                Imagen

                            </option>


                            <option
                                value="Video"
                                {{ old('type', $gallery->type) === 'Video' ? 'selected' : '' }}>

                                Video

                            </option>


                        </select>


                        <small
                            style="
                            display:block;
                            margin-top:7px;
                            color:#666;
                        ">

                            Puedes cambiar libremente entre Imagen y Video.

                        </small>

                    </div>



                    <!-- =========================
                     TÍTULO
                     ========================= -->

                    <div style="margin-bottom:20px;">

                        <label
                            for="title"
                            style="
                            display:block;
                            font-weight:700;
                            margin-bottom:8px;
                        ">

                            Título

                        </label>


                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title', $gallery->title) }}"
                            style="
                            width:100%;
                            padding:12px;
                            border:1px solid #ccc;
                            border-radius:8px;
                            box-sizing:border-box;
                        ">

                    </div>



                    <!-- =========================
                     DESCRIPCIÓN
                     ========================= -->

                    <div style="margin-bottom:20px;">

                        <label
                            for="description"
                            style="
                            display:block;
                            font-weight:700;
                            margin-bottom:8px;
                        ">

                            Descripción

                        </label>


                        <textarea
                            name="description"
                            id="description"
                            rows="5"
                            style="
                            width:100%;
                            padding:12px;
                            border:1px solid #ccc;
                            border-radius:8px;
                            box-sizing:border-box;
                            resize:vertical;
                        ">{{ old('description', $gallery->description) }}</textarea>

                    </div>



                    <!-- =========================
                     ARCHIVO ACTUAL
                     ========================= -->

                    @if($gallery->image)

                    <div style="margin-bottom:25px;">


                        <strong
                            style="
                                display:block;
                                margin-bottom:10px;
                            ">

                            Archivo actual

                        </strong>


                        @if($gallery->type === 'Video')


                        <video
                            controls
                            style="
                                    width:100%;
                                    max-width:500px;
                                    max-height:300px;
                                    border-radius:10px;
                                ">

                            <source
                                src="{{ asset('storage/' . $gallery->image) }}">

                        </video>


                        @else


                        <img
                            src="{{ asset('storage/' . $gallery->image) }}"
                            alt="{{ $gallery->name }}"
                            style="
                                    width:100%;
                                    max-width:350px;
                                    max-height:250px;
                                    object-fit:cover;
                                    border-radius:10px;
                                ">


                        @endif


                    </div>

                    @endif



                    <!-- =========================
                     NUEVO ARCHIVO
                     ========================= -->

                    <div style="margin-bottom:25px;">

                        <label
                            for="image"
                            style="
                            display:block;
                            font-weight:700;
                            margin-bottom:8px;
                        ">

                            Reemplazar archivo

                        </label>


                        <input
                            type="file"
                            name="image"
                            id="image"
                            accept=".jpg,.jpeg,.png,.webp,.mp4,.mov,.avi"
                            style="
                            width:100%;
                            padding:12px;
                            border:1px solid #ccc;
                            border-radius:8px;
                            box-sizing:border-box;
                            background:white;
                        ">


                        <small
                            id="fileHelp"
                            style="
                            display:block;
                            margin-top:7px;
                            color:#666;
                        ">

                            Si no eliges otro archivo,
                            se conservará el actual.

                        </small>


                        <small
                            style="
                            display:block;
                            margin-top:5px;
                            color:#a35a00;
                        ">

                            Si cambias de Imagen a Video
                            o de Video a Imagen,
                            debes seleccionar un archivo nuevo.

                        </small>

                    </div>



                    <!-- =========================
                     BOTONES
                     ========================= -->

                    <div
                        style="
                        display:flex;
                        gap:12px;
                        flex-wrap:wrap;
                    ">


                        <button
                            type="submit"
                            class="action-button"
                            style="
                            border:none;
                            cursor:pointer;
                        ">

                            💾 Guardar cambios

                        </button>


                        <a
                            href="{{ route('admin.gallery.index') }}"
                            class="action-button">

                            ← Volver

                        </a>


                    </div>


                </form>


            </section>


        </main>


    </div>



    <script>
        const nombresPorSeccion = {


            "Inicio": [

                "Banner",

                "Presentación"

            ],


            "Galería": [

                "Bee-Bot",

                "Mekorama",

                "Blue-Bot",

                "Ludio Max",

                "mBot"

            ],


            "Programas": [

                "Robótica Educativa",

                "Diseño 3D e Impresión",

                "Inteligencia Artificial y Ética",

                "Pensamiento Computacional"

            ],


            "Visitas": [

                "Visita destacada 1",

                "Visita destacada 2"

            ],


            "Silvia TV": [

                "Imagen Silvia TV"

            ],


            "Capacitaciones": [

                "Capacitación 1",

                "Capacitación 2",

                "Capacitación 3",

                "Capacitación 4",

                "Ejército 1",

                "Ejército 2",

                "Ejército 3"

            ]


        };



        const sectionSelect =
            document.getElementById('section');


        const nameSelect =
            document.getElementById('name');


        const typeSelect =
            document.getElementById('type');


        const imageInput =
            document.getElementById('image');


        const fileHelp =
            document.getElementById('fileHelp');


        const currentName =
            "{{ old('name', $gallery->name) }}";



        function cargarNombres() {


            const section =
                sectionSelect.value;


            nameSelect.innerHTML = '';


            const inicial =
                document.createElement('option');


            inicial.value = '';


            inicial.textContent =
                section ?
                'Selecciona un recurso' :
                'Selecciona primero una sección';


            nameSelect.appendChild(inicial);



            if (!nombresPorSeccion[section]) {

                return;

            }



            nombresPorSeccion[section]
                .forEach(function(nombre) {


                    const option =
                        document.createElement('option');


                    option.value = nombre;

                    option.textContent = nombre;


                    if (nombre === currentName) {

                        option.selected = true;

                    }


                    nameSelect.appendChild(option);


                });


        }



        function actualizarArchivo() {


            if (typeSelect.value === 'Imagen') {


                imageInput.accept =
                    '.jpg,.jpeg,.png,.webp';


                fileHelp.textContent =
                    'Si reemplazas el archivo debe ser JPG, JPEG, PNG o WEBP.';


            } else if (typeSelect.value === 'Video') {


                imageInput.accept =
                    '.mp4,.mov,.avi';


                fileHelp.textContent =
                    'Si reemplazas el archivo debe ser MP4, MOV o AVI.';


            } else {


                imageInput.accept =
                    '.jpg,.jpeg,.png,.webp,.mp4,.mov,.avi';


                fileHelp.textContent =
                    'Selecciona primero Imagen o Video.';


            }


        }



        sectionSelect.addEventListener(
            'change',
            cargarNombres
        );


        typeSelect.addEventListener(
            'change',
            actualizarArchivo
        );



        cargarNombres();

        actualizarArchivo();
    </script>


</body>

</html>