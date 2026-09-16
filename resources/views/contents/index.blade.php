<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrar Contenidos - CID Pujllay</title>

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

                <a
                    href="{{ route('admin.contents.index') }}"
                    class="active">

                    📝
                    <span>Contenido</span>

                </a>


                <!-- GALERÍA -->

                <a href="{{ route('admin.gallery.index') }}">

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

            <!-- CERRAR SESIÓN -->

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
                        Administrar contenidos
                    </h1>

                    <p>
                        Gestiona los textos de la página pública de CID Pujllay.
                    </p>

                </div>


                <div class="admin-user">

                    <span>
                        Administrador
                    </span>

                </div>

            </header>


            <!-- =================================================
                 MENSAJE DE ÉXITO
                 ================================================= -->

            @if(session('success'))

            <div
                style="
                        background:#d4edda;
                        color:#155724;
                        padding:15px;
                        border-radius:8px;
                        margin-bottom:20px;
                    ">

                {{ session('success') }}

            </div>

            @endif


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
                 CONTENIDOS
                 ================================================= -->

            <section class="quick-actions">

                <div
                    style="
                        display:flex;
                        justify-content:space-between;
                        align-items:center;
                        margin-bottom:2rem;
                        gap:20px;
                        flex-wrap:wrap;
                    ">

                    <h2>
                        Contenidos registrados
                    </h2>


                    <a
                        href="{{ route('admin.contents.create') }}"
                        class="action-button">

                        ➕ Agregar contenido

                    </a>

                </div>


                @if($contents->count() > 0)

                <div style="overflow-x:auto;">

                    <table
                        style="
                                width:100%;
                                border-collapse:collapse;
                            ">

                        <thead>

                            <tr>

                                <th
                                    style="
                                            padding:15px;
                                            text-align:left;
                                        ">

                                    Sección

                                </th>


                                <th
                                    style="
                                            padding:15px;
                                            text-align:left;
                                        ">

                                    Clave

                                </th>


                                <th
                                    style="
                                            padding:15px;
                                            text-align:left;
                                        ">

                                    Contenido

                                </th>


                                <th
                                    style="
                                            padding:15px;
                                            text-align:center;
                                        ">

                                    Acciones

                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($contents as $content)

                            <tr>

                                <!-- SECCIÓN -->

                                <td style="padding:15px;">

                                    {{ $content->section }}

                                </td>


                                <!-- CLAVE -->

                                <td style="padding:15px;">

                                    {{ $content->key }}

                                </td>


                                <!-- CONTENIDO -->

                                <td style="padding:15px;">

                                    {{ \Illuminate\Support\Str::limit($content->content, 100) }}

                                </td>


                                <!-- ACCIONES -->

                                <td
                                    style="
                                                padding:15px;
                                                text-align:center;
                                            ">

                                    <div
                                        style="
                                                    display:flex;
                                                    justify-content:center;
                                                    align-items:center;
                                                    gap:15px;
                                                    flex-wrap:wrap;
                                                ">


                                        <!-- EDITAR -->

                                        <a
                                            href="{{ route('admin.contents.edit', $content) }}"
                                            style="
                                                        text-decoration:none;
                                                        color:#2563eb;
                                                        font-weight:600;
                                                    ">

                                            ✏️ Editar

                                        </a>


                                        <!-- ELIMINAR -->

                                        <form
                                            method="POST"
                                            action="{{ route('admin.contents.destroy', $content) }}"
                                            onsubmit="return confirm('¿Estás seguro de eliminar este contenido?');">

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                style="
                                                            border:none;
                                                            background:none;
                                                            color:#dc2626;
                                                            font-weight:600;
                                                            cursor:pointer;
                                                            font-family:inherit;
                                                            font-size:inherit;
                                                        ">

                                                🗑️ Eliminar

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                @else

                <div
                    style="
                            padding:2rem;
                            text-align:center;
                        ">

                    <h3>
                        No hay contenidos registrados todavía.
                    </h3>

                    <p>
                        Cuando agregues contenidos aparecerán aquí.
                    </p>

                </div>

                @endif

            </section>

        </main>

    </div>

</body>

</html>