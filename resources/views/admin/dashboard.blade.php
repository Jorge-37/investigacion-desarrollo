<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel de Administración - CID Pujllay</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>


<body>


    <!-- =====================================================
         PANEL ADMINISTRATIVO
         ===================================================== -->

    <div class="admin-layout">


        <!-- =================================================
             BARRA LATERAL
             ================================================= -->

        <aside class="sidebar">


            <!-- LOGO -->

            <div class="sidebar-logo">

                <img
                    src="{{ asset('imgs/Logo.jpg') }}"
                    alt="Logo CID Pujllay">

                <h2>CID Pujllay</h2>

            </div>


            <!-- MENÚ -->

            <nav class="sidebar-menu">


                <!-- DASHBOARD -->

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="active">

                    🏠
                    <span>Dashboard</span>

                </a>


                <!-- CONTENIDO -->

                <a href="{{ route('admin.contents.index') }}">

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

                <form method="POST" action="{{ route('logout') }}">

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
                        Panel de Administración
                    </h1>

                    <p>
                        Bienvenido al sistema de administración de CID Pujllay.
                    </p>

                </div>


                <div class="admin-user">

                    <span>Administrador</span>

                </div>


            </header>



            <!-- =================================================
                 TARJETAS
                 ================================================= -->

            <section class="dashboard-cards">


                <!-- CONTENIDO -->

                <a
                    href="{{ route('admin.contents.index') }}"
                    class="dashboard-card">

                    <div class="card-icon">
                        📝
                    </div>

                    <div>

                        <h3>Contenido</h3>

                        <p>
                            Editar textos de la página web
                        </p>

                    </div>

                </a>



                <!-- GALERÍA -->

                <a
                    href="{{ route('admin.gallery.index') }}"
                    class="dashboard-card">

                    <div class="card-icon">
                        🖼️
                    </div>

                    <div>

                        <h3>Galería</h3>

                        <p>
                            Administrar imágenes y multimedia
                        </p>

                    </div>

                </a>



                <!-- VISITAS -->

                <a
                    href="{{ route('admin.visits.index') }}"
                    class="dashboard-card">

                    <div class="card-icon">
                        🏫
                    </div>

                    <div>

                        <h3>Visitas</h3>

                        <p>
                            Administrar instituciones, información y fotografías
                        </p>

                    </div>

                </a>



                <!-- CONFIGURACIÓN -->

                <div class="dashboard-card">

                    <div class="card-icon">
                        ⚙️
                    </div>

                    <div>

                        <h3>Configuración</h3>

                        <p>
                            Próximamente
                        </p>

                    </div>

                </div>


            </section>



            <!-- =================================================
                 ACCIONES RÁPIDAS
                 ================================================= -->

            <section class="quick-actions">


                <h2>
                    Acciones rápidas
                </h2>


                <div class="actions-grid">


                    <!-- AGREGAR CONTENIDO -->

                    <a
                        href="{{ route('admin.contents.create') }}"
                        class="action-button">

                        ➕
                        Agregar contenido

                    </a>



                    <!-- ADMINISTRAR GALERÍA -->

                    <a
                        href="{{ route('admin.gallery.index') }}"
                        class="action-button">

                        🖼️
                        Administrar galería

                    </a>



                    <!-- AGREGAR VISITA -->

                    <a
                        href="{{ route('admin.visits.create') }}"
                        class="action-button">

                        🏫
                        Agregar visita

                    </a>



                    <!-- ADMINISTRAR VISITAS -->

                    <a
                        href="{{ route('admin.visits.index') }}"
                        class="action-button">

                        📋
                        Administrar visitas

                    </a>


                </div>


            </section>



        </main>


    </div>


</body>

</html>