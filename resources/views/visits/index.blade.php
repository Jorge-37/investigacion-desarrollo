<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Visitas - CID Pujllay</title>

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
                        Visitas
                    </h1>

                    <p>
                        Administra las instituciones educativas que visitan el CID Pujllay.
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
                 BOTÓN AGREGAR
                 ================================================= -->

            <section class="quick-actions">

                <div
                    style="
                        display:flex;
                        justify-content:space-between;
                        align-items:center;
                        gap:20px;
                        flex-wrap:wrap;
                        margin-bottom:25px;
                    ">

                    <div>

                        <h2>
                            Visitas registradas
                        </h2>

                        <p>
                            Instituciones que han participado en visitas al CID Pujllay.
                        </p>

                    </div>


                    <a
                        href="{{ route('admin.visits.create') }}"
                        class="action-button"
                        style="text-decoration:none;">

                        ➕ Agregar visita

                    </a>

                </div>


                <!-- =================================================
                     LISTADO
                     ================================================= -->

                @if($visits->isEmpty())

                    <div
                        style="
                            padding:30px;
                            text-align:center;
                            background:#f8f9fa;
                            border-radius:8px;
                        ">

                        <p>
                            Todavía no hay visitas registradas.
                        </p>

                    </div>

                @else

                    <div style="overflow-x:auto;">

                        <table
                            style="
                                width:100%;
                                border-collapse:collapse;
                            ">

                            <thead>

                                <tr
                                    style="
                                        background:#f3f4f6;
                                        text-align:left;
                                    ">

                                    <th style="padding:12px;">
                                        Institución
                                    </th>

                                    <th style="padding:12px;">
                                        Título
                                    </th>

                                    <th style="padding:12px;">
                                        Fecha
                                    </th>

                                    <th style="padding:12px;">
                                        Fotos
                                    </th>

                                    <th style="padding:12px;">
                                        Acciones
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($visits as $visit)

                                    <tr
                                        style="
                                            border-bottom:1px solid #e5e7eb;
                                        ">

                                        <!-- INSTITUCIÓN -->

                                        <td style="padding:12px;">

                                            <strong>
                                                {{ $visit->institution }}
                                            </strong>

                                        </td>


                                        <!-- TÍTULO -->

                                        <td style="padding:12px;">

                                            {{ $visit->title }}

                                        </td>


                                        <!-- FECHA -->

                                        <td style="padding:12px;">

                                            @if($visit->visit_date)

                                                {{ $visit->visit_date->format('d/m/Y') }}

                                            @else

                                                Sin fecha

                                            @endif

                                        </td>


                                        <!-- CANTIDAD DE FOTOS -->

                                        <td style="padding:12px;">

                                            📷 {{ $visit->images->count() }}

                                        </td>


                                        <!-- ACCIONES -->

                                        <td style="padding:12px;">

                                            <div
                                                style="
                                                    display:flex;
                                                    gap:10px;
                                                    flex-wrap:wrap;
                                                ">


                                                <!-- EDITAR -->

                                                <a
                                                    href="{{ route('admin.visits.edit', $visit) }}"
                                                    style="
                                                        padding:8px 12px;
                                                        background:#facc15;
                                                        color:#333;
                                                        text-decoration:none;
                                                        border-radius:6px;
                                                    ">

                                                    ✏️ Editar

                                                </a>


                                                <!-- ELIMINAR -->

                                                <form
                                                    method="POST"
                                                    action="{{ route('admin.visits.destroy', $visit) }}"
                                                    onsubmit="return confirm('¿Estás seguro de eliminar esta visita y todas sus fotografías?');">

                                                    @csrf

                                                    @method('DELETE')


                                                    <button
                                                        type="submit"
                                                        style="
                                                            padding:8px 12px;
                                                            background:#dc3545;
                                                            color:white;
                                                            border:none;
                                                            border-radius:6px;
                                                            cursor:pointer;
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

                @endif

            </section>

        </main>

    </div>

</body>

</html>