<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Visita - CID Pujllay</title>

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


                <a href="{{ route('admin.contents.index') }}">

                    📝
                    <span>Contenido</span>

                </a>


                <a href="{{ route('admin.gallery.index') }}">

                    🖼️
                    <span>Galería</span>

                </a>


                <a
                    href="{{ route('admin.visits.index') }}"
                    class="active">

                    🏫
                    <span>Visitas</span>

                </a>

                 <!-- CONFIGURACIÓN -->

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
             CONTENIDO PRINCIPAL
             ================================================= -->

        <main class="admin-content">


            <!-- HEADER -->

            <header class="admin-header">

                <div>

                    <h1>
                        Editar visita
                    </h1>

                    <p>
                        Modifica la información y las fotografías de la visita.
                    </p>

                </div>


                <div class="admin-user">

                    <span>
                        Administrador
                    </span>

                </div>

            </header>


            <!-- =================================================
                 MENSAJES DE ÉXITO
                 ================================================= -->

            @if(session('success'))

                <div
                    style="
                        background:#d1e7dd;
                        color:#0f5132;
                        padding:15px;
                        border-radius:8px;
                        margin-bottom:20px;
                    ">

                    {{ session('success') }}

                </div>

            @endif


            <!-- =================================================
                 ERRORES DE VALIDACIÓN
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

                    <ul style="margin:0; padding-left:20px;">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- =================================================
                 FOTOGRAFÍAS ACTUALES
                 ================================================= -->

            <section class="quick-actions">

                <h2>
                    Fotografías actuales
                </h2>

                <p style="margin-bottom:20px;">
                    Aquí puedes revisar y eliminar fotografías de esta visita.
                </p>


                @if($visit->images->isEmpty())

                    <div
                        style="
                            padding:20px;
                            background:#f8f9fa;
                            border-radius:8px;
                            margin-bottom:25px;
                        ">

                        <p style="margin:0;">
                            Esta visita todavía no tiene fotografías.
                        </p>

                    </div>

                @else

                    <div
                        style="
                            display:grid;
                            grid-template-columns:repeat(auto-fill, minmax(180px, 1fr));
                            gap:20px;
                            margin-bottom:30px;
                        ">

                        @foreach($visit->images as $image)

                            <div
                                style="
                                    border:1px solid #e5e7eb;
                                    border-radius:10px;
                                    overflow:hidden;
                                    background:white;
                                ">

                                <!-- IMAGEN -->

                                <img
                                    src="{{ asset('storage/' . $image->image) }}"
                                    alt="Fotografía de la visita"
                                    style="
                                        width:100%;
                                        height:160px;
                                        object-fit:cover;
                                        display:block;
                                    ">


                                <!-- BOTÓN ELIMINAR -->

                                <div style="padding:10px;">

                                    <form
                                        method="POST"
                                        action="{{ route('admin.visit-images.destroy', $image) }}"
                                        onsubmit="return confirm('¿Deseas eliminar esta fotografía?');">

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            style="
                                                width:100%;
                                                padding:9px;
                                                background:#dc3545;
                                                color:white;
                                                border:none;
                                                border-radius:6px;
                                                cursor:pointer;
                                            ">

                                            🗑️ Eliminar foto

                                        </button>

                                    </form>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif

            </section>


            <!-- =================================================
                 FORMULARIO DE EDICIÓN
                 ================================================= -->

            <section class="quick-actions">

                <h2 style="margin-bottom:25px;">
                    Información de la visita
                </h2>


                <form
                    method="POST"
                    action="{{ route('admin.visits.update', $visit) }}"
                    enctype="multipart/form-data">

                    @csrf

                    @method('PUT')


                    <!-- INSTITUCIÓN -->

                    <div style="margin-bottom:20px;">

                        <label
                            for="institution"
                            style="
                                display:block;
                                margin-bottom:8px;
                                font-weight:600;
                            ">

                            Institución educativa

                        </label>


                        <input
                            type="text"
                            id="institution"
                            name="institution"
                            value="{{ old('institution', $visit->institution) }}"
                            required
                            style="
                                width:100%;
                                padding:12px;
                                border:1px solid #ccc;
                                border-radius:8px;
                                box-sizing:border-box;
                            ">

                    </div>


                    <!-- TÍTULO -->

                    <div style="margin-bottom:20px;">

                        <label
                            for="title"
                            style="
                                display:block;
                                margin-bottom:8px;
                                font-weight:600;
                            ">

                            Título de la visita

                        </label>


                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title', $visit->title) }}"
                            required
                            style="
                                width:100%;
                                padding:12px;
                                border:1px solid #ccc;
                                border-radius:8px;
                                box-sizing:border-box;
                            ">

                    </div>


                    <!-- FECHA -->

                    <div style="margin-bottom:20px;">

                        <label
                            for="visit_date"
                            style="
                                display:block;
                                margin-bottom:8px;
                                font-weight:600;
                            ">

                            Fecha de la visita

                        </label>


                        <input
                            type="date"
                            id="visit_date"
                            name="visit_date"
                            value="{{ old('visit_date', optional($visit->visit_date)->format('Y-m-d')) }}"
                            style="
                                width:100%;
                                padding:12px;
                                border:1px solid #ccc;
                                border-radius:8px;
                                box-sizing:border-box;
                            ">

                    </div>


                    <!-- DESCRIPCIÓN -->

                    <div style="margin-bottom:20px;">

                        <label
                            for="description"
                            style="
                                display:block;
                                margin-bottom:8px;
                                font-weight:600;
                            ">

                            Descripción

                        </label>


                        <textarea
                            id="description"
                            name="description"
                            rows="7"
                            style="
                                width:100%;
                                padding:12px;
                                border:1px solid #ccc;
                                border-radius:8px;
                                box-sizing:border-box;
                                resize:vertical;
                                font-family:inherit;
                            ">{{ old('description', $visit->description) }}</textarea>

                    </div>


                    <!-- =================================================
                         AGREGAR NUEVAS FOTOGRAFÍAS
                         ================================================= -->

                    <div style="margin-bottom:25px;">

                        <label
                            for="images"
                            style="
                                display:block;
                                margin-bottom:8px;
                                font-weight:600;
                            ">

                            Agregar nuevas fotografías

                        </label>


                        <input
                            type="file"
                            id="images"
                            name="images[]"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            multiple
                            style="
                                width:100%;
                                padding:12px;
                                border:1px solid #ccc;
                                border-radius:8px;
                                box-sizing:border-box;
                                background:white;
                            ">


                        <p
                            style="
                                margin-top:8px;
                                color:#6b7280;
                                font-size:14px;
                            ">

                            Las fotografías nuevas se agregarán a las que ya existen.
                            Puedes seleccionar varias imágenes al mismo tiempo.

                        </p>

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

                            💾 Guardar cambios

                        </button>


                        <a
                            href="{{ route('admin.visits.index') }}"
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

</body>

</html>