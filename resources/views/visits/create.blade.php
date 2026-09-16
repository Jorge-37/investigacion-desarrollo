<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agregar Visita - CID Pujllay</title>

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


            <header class="admin-header">

                <div>

                    <h1>
                        Agregar visita
                    </h1>

                    <p>
                        Registra una institución educativa que visitó el CID Pujllay.
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


            <!-- =================================================
                 FORMULARIO
                 ================================================= -->

            <section class="quick-actions">

                <form
                    method="POST"
                    action="{{ route('admin.visits.store') }}"
                    enctype="multipart/form-data">

                    @csrf


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
                            value="{{ old('institution') }}"
                            placeholder="Ejemplo: I.E. Politécnico Rafael Santiago Loayza Guevara"
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
                            value="{{ old('title') }}"
                            placeholder="Ejemplo: Visita de estudiantes al CID Pujllay"
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
                            value="{{ old('visit_date') }}"
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
                            placeholder="Describe brevemente la visita, actividades realizadas, participación de los estudiantes, etc."
                            style="
                                width:100%;
                                padding:12px;
                                border:1px solid #ccc;
                                border-radius:8px;
                                box-sizing:border-box;
                                resize:vertical;
                                font-family:inherit;
                            ">{{ old('description') }}</textarea>

                    </div>


                    <!-- FOTOGRAFÍAS -->

                    <div style="margin-bottom:25px;">

                        <label
                            for="images"
                            style="
                                display:block;
                                margin-bottom:8px;
                                font-weight:600;
                            ">

                            Fotografías de la visita

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
                                font-size:14px;
                                color:#6b7280;
                            ">

                            Puedes seleccionar varias imágenes al mismo tiempo.
                            Formatos permitidos: JPG, JPEG, PNG y WEBP.
                            Máximo 10 MB por imagen.

                        </p>

                    </div>


                    <!-- BOTONES -->

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

                            💾 Guardar visita

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