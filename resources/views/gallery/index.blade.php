```blade
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galería - CID Pujllay</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

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

                <h2>CID Pujllay</h2>

            </div>


            <nav class="sidebar-menu">


                <!-- DASHBOARD -->

                <a href="{{ route('admin.dashboard') }}">

                    🏠
                    <span>Dashboard</span>

                </a>


                <!-- CONTENIDO -->

                <a href="{{ route('admin.contents.index') }}">

                    📝
                    <span>Contenido</span>

                </a>


                <!-- GALERÍA -->

                <a
                    href="{{ route('admin.gallery.index') }}"
                    class="active">

                    🖼️
                    <span>Galería</span>

                </a>


                <!-- VISITAS -->

                <a href="{{ route('admin.visits.index') }}">

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
         CONTENIDO
         ================================================= -->

        <main class="admin-content">


            <header class="admin-header">

                <div>

                    <h1>
                        Galería
                    </h1>

                    <p>
                        Administra las imágenes y videos de las diferentes
                        secciones de CID Pujllay.
                    </p>

                </div>


                <div class="admin-user">

                    <span>Administrador</span>

                </div>

            </header>


            <!-- =================================================
             MENSAJE DE ÉXITO
             ================================================= -->

            @if(session('success'))

            <div
                style="
                    padding:15px;
                    margin-bottom:20px;
                    background:#d4edda;
                    color:#155724;
                    border-radius:8px;
                ">

                {{ session('success') }}

            </div>

            @endif


            <!-- =================================================
             CABECERA
             ================================================= -->

            <section class="quick-actions">

                <div
                    style="
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    gap:20px;
                    flex-wrap:wrap;
                ">

                    <div>

                        <h2>
                            Recursos registrados
                        </h2>

                        <p>
                            Cada recurso puede administrarse
                            individualmente mediante su nombre.
                        </p>

                    </div>


                    <a
                        href="{{ route('admin.gallery.create') }}"
                        class="action-button">

                        ➕ Agregar archivo

                    </a>

                </div>


                <!-- =================================================
                 TABLA
                 ================================================= -->

                <div
                    style="
                    overflow-x:auto;
                    margin-top:25px;
                ">

                    <table
                        style="
                        width:100%;
                        border-collapse:collapse;
                        min-width:1000px;
                    ">

                        <thead>

                            <tr>

                                <th
                                    style="
                                    padding:12px;
                                    text-align:left;
                                    border-bottom:2px solid #ddd;
                                ">

                                    Sección

                                </th>


                                <th
                                    style="
                                    padding:12px;
                                    text-align:left;
                                    border-bottom:2px solid #ddd;
                                ">

                                    Tipo

                                </th>


                                <th
                                    style="
                                    padding:12px;
                                    text-align:left;
                                    border-bottom:2px solid #ddd;
                                ">

                                    Nombre

                                </th>


                                <th
                                    style="
                                    padding:12px;
                                    text-align:left;
                                    border-bottom:2px solid #ddd;
                                ">

                                    Título

                                </th>


                                <th
                                    style="
                                    padding:12px;
                                    text-align:left;
                                    border-bottom:2px solid #ddd;
                                ">

                                    Archivo

                                </th>


                                <th
                                    style="
                                    padding:12px;
                                    text-align:left;
                                    border-bottom:2px solid #ddd;
                                ">

                                    Descripción

                                </th>


                                <th
                                    style="
                                    padding:12px;
                                    text-align:center;
                                    border-bottom:2px solid #ddd;
                                ">

                                    Acciones

                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($galleries as $gallery)

                            <tr>


                                <!-- SECCIÓN -->

                                <td
                                    style="
                                        padding:12px;
                                        vertical-align:top;
                                        border-bottom:1px solid #eee;
                                    ">

                                    <strong>
                                        {{ $gallery->section }}
                                    </strong>

                                </td>


                                <!-- TIPO -->

                                <td
                                    style="
                                        padding:12px;
                                        vertical-align:top;
                                        border-bottom:1px solid #eee;
                                    ">

                                    @if($gallery->type)

                                    {{ $gallery->type }}

                                    @else

                                    <span style="color:#999;">
                                        No definido
                                    </span>

                                    @endif

                                </td>


                                <!-- NOMBRE -->

                                <td
                                    style="
                                        padding:12px;
                                        vertical-align:top;
                                        border-bottom:1px solid #eee;
                                    ">

                                    <strong>
                                        {{ $gallery->name }}
                                    </strong>

                                </td>


                                <!-- TÍTULO -->

                                <td
                                    style="
                                        padding:12px;
                                        vertical-align:top;
                                        border-bottom:1px solid #eee;
                                    ">

                                    @if($gallery->title)

                                    {{ $gallery->title }}

                                    @else

                                    <span style="color:#999;">
                                        —
                                    </span>

                                    @endif

                                </td>


                                <!-- ARCHIVO -->

                                <td
                                    style="
                                        padding:12px;
                                        vertical-align:top;
                                        border-bottom:1px solid #eee;
                                    ">

                                    @if($gallery->image)

                                    @if($gallery->type === 'Video')

                                    <video
                                        controls
                                        style="
                                                    width:150px;
                                                    max-height:100px;
                                                    border-radius:6px;
                                                ">

                                        <source
                                            src="{{ asset('storage/' . $gallery->image) }}">

                                    </video>

                                    @else

                                    <img
                                        src="{{ asset('storage/' . $gallery->image) }}"
                                        alt="{{ $gallery->name }}"
                                        style="
                                                    width:120px;
                                                    height:90px;
                                                    object-fit:cover;
                                                    border-radius:6px;
                                                ">

                                    @endif

                                    @else

                                    <span style="color:#999;">
                                        Sin archivo
                                    </span>

                                    @endif

                                </td>


                                <!-- DESCRIPCIÓN -->

                                <td
                                    style="
                                        padding:12px;
                                        vertical-align:top;
                                        border-bottom:1px solid #eee;
                                        max-width:250px;
                                    ">

                                    @if($gallery->description)

                                    {{ $gallery->description }}

                                    @else

                                    <span style="color:#999;">
                                        —
                                    </span>

                                    @endif

                                </td>


                                <!-- ACCIONES -->

                                <td
                                    style="
                                        padding:12px;
                                        vertical-align:top;
                                        border-bottom:1px solid #eee;
                                        text-align:center;
                                    ">


                                    <!-- EDITAR -->

                                    <a
                                        href="{{ route('admin.gallery.edit', $gallery) }}"
                                        class="action-button"
                                        style="
                                            display:inline-block;
                                            margin-bottom:8px;
                                        ">

                                        ✏️ Editar

                                    </a>


                                    <!-- ELIMINAR -->

                                    <form
                                        action="{{ route('admin.gallery.destroy', $gallery) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Seguro que deseas eliminar este recurso?');">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-button"
                                            style="
                                                border:none;
                                                cursor:pointer;
                                            ">

                                            🗑️ Eliminar

                                        </button>

                                    </form>

                                </td>


                            </tr>

                            @empty

                            <tr>

                                <td
                                    colspan="7"
                                    style="
                                        padding:30px;
                                        text-align:center;
                                        color:#777;
                                    ">

                                    No hay recursos registrados.

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>

        </main>

    </div>

</body>

</html>
```