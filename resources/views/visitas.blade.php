<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Visitas - CID Pujllay</title>

    <meta
        name="description"
        content="Conoce las instituciones educativas que visitan el CID Pujllay y las experiencias desarrolladas durante sus visitas.">


    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <!-- CSS GENERAL DEL SITIO -->

    <link
        rel="stylesheet"
        href="{{ asset('css/styles.css') }}">


    <style>
        /* =====================================================
           FONDO GENERAL
           ===================================================== */

        body {

            margin: 0;

            min-height: 100vh;

            position: relative;

            background:
                linear-gradient(115deg,
                    #f4d98d 0%,
                    #f2c77b 35%,
                    #efab6c 68%,
                    #eb9162 100%);

            background-attachment: fixed;

        }


        /* =====================================================
           IMAGEN DE FONDO
           ===================================================== */

        .fondo-visitas {

            position: fixed;

            inset: 0;

            z-index: -3;

            background-image: url('{{ asset("imgs/fondo-visitas.png") }}');

            background-size: cover;

            background-position: center;

            background-repeat: no-repeat;

            background-attachment: fixed;

        }


        /* =====================================================
           CAPA SOBRE LA IMAGEN
           ===================================================== */

        .fondo-overlay {

            position: fixed;

            inset: 0;

            z-index: -2;

            pointer-events: none;

            background:
                rgb(249, 249, 249);

        }


        /* =====================================================
           DESTELLOS
           ===================================================== */

        .page-glow {

            position: fixed;

            border-radius: 50%;

            filter: blur(90px);

            pointer-events: none;

            z-index: -1;

        }


        .glow-one {

            width: 300px;

            height: 300px;

            top: 10%;

            left: 4%;

            background:
                rgba(255, 255, 255, 0.18);

        }


        .glow-two {

            width: 350px;

            height: 350px;

            top: 43%;

            right: 2%;

            background:
                rgba(255, 225, 170, 0.14);

        }


        .glow-three {

            width: 300px;

            height: 300px;

            bottom: 7%;

            left: 28%;

            background:
                rgba(255, 250, 225, 0.14);

        }


        /* =====================================================
           ENCABEZADO DE LA PÁGINA
           ===================================================== */

        .visitas-page-header {

            padding-top: 9rem;

            padding-bottom: 2.2rem;

            text-align: center;

        }


        .visitas-page-header h1 {

            font-size: 3rem;

            font-weight: 900;

            color: #07599b;

            margin-bottom: 0.8rem;

        }


        .visitas-page-header p {

            max-width: 820px;

            margin: 0 auto;

            font-size: 1.15rem;

            line-height: 1.65;

            color: #303846;

        }


        /* =====================================================
           LISTA DE VISITAS
           ===================================================== */

        .visitas-lista {

            display: flex;

            flex-direction: column;

            gap: 2.5rem;

        }


        /* =====================================================
           TARJETA PRINCIPAL
           ===================================================== */

        .visita-completa {

            overflow: hidden;

            border-radius: 22px;

            /*
            Azul principal de CID Pujllay
            */

            background:
                rgba(4, 34, 122, 0.92);

            border:
                1px solid rgba(255, 255, 255, 0.20);

            box-shadow:
                0 14px 30px rgba(0, 0, 0, 0.22);

            backdrop-filter:
                blur(3px);

        }


        /* =====================================================
           INFORMACIÓN
           ===================================================== */

        .visita-info {

            padding:
                2.8rem 2.6rem 0.45rem;

            text-align: center;

        }


        /* =====================================================
           INSTITUCIÓN
           ===================================================== */

        .visita-institucion {

            display: block;

            width: 100%;

            max-width: 1100px;

            margin: 0 auto 1.2rem auto;

            padding: 0;

            text-align: center;

            font-size: 2rem;

            line-height: 1.3;

            font-weight: 900;

            color: #ffffff;

            overflow-wrap: anywhere;

            word-break: break-word;

        }


        /* =====================================================
           TÍTULO
           ===================================================== */

        .visita-titulo {

            display: block;

            width: 100%;

            max-width: 1100px;

            margin: 0 auto 0.3rem auto;

            padding: 0;

            text-align: center !important;

            font-size: 1.25rem;

            line-height: 1.4;

            font-weight: 600;

            color: #f1d501 !important;

            overflow-wrap: anywhere;

            word-break: break-word;

        }


        /* =====================================================
           FECHA
           ===================================================== */

        .visita-fecha {

            display: flex;

            justify-content: center;

            align-items: center;

            gap: 0.35rem;

            width: 100%;

            margin:
                0 0 0.5rem 0;

            padding: 0;

            text-align: center;

            font-size: 0.95rem;

            font-weight: 500;

            color: #e0ebf4;

        }


        /* =====================================================
           DESCRIPCIÓN
           ===================================================== */

        .visita-descripcion {

            width: 100%;

            max-width: 1100px;

            margin: -2.2rem auto 0 auto;

            padding: 0;

            text-align: center;

            font-size: 1.05rem;

            line-height: 1.55;

            color: #f4f7fa;

            white-space: pre-line;

            overflow-wrap: anywhere;

            word-break: break-word;

        }


        /* =====================================================
           ZONA DE FOTOS
           ===================================================== */

        .visita-galeria-area {

            padding:
                0.55rem 2.6rem 2.3rem;

            background: transparent;

            border: none;

        }


        /* =====================================================
           GALERÍA
           ===================================================== */

        .visita-fotos {

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 1rem;

            align-items: center;

        }


        /* =====================================================
           TARJETA DE CADA FOTO
           ===================================================== */

        .visita-foto {

            overflow: hidden;

            border-radius: 18px;

            background:
                rgba(255, 255, 255, 0.08);

            border:
                2px solid rgba(255, 255, 255, 0.18);

            box-shadow:
                0 6px 16px rgba(0, 0, 0, 0.18);

            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease;

            transform:
                translateY(0) scale(1);

        }


        /* =====================================================
           IMAGEN
           ===================================================== */

        .visita-foto img {

            display: block;

            width: 100%;

            height: 270px;

            object-fit: cover;

            transition:
                transform 0.4s ease;

        }


        /* =====================================================
           EFECTO OLA
           ===================================================== */

        .visita-foto:hover {

            transform:
                translateY(-22px) scale(1.05);

            box-shadow:
                0 20px 35px rgba(0, 0, 0, 0.30);

            z-index: 5;

        }


        .visita-foto:hover img {

            transform:
                scale(1.08);

        }


        /* =====================================================
           UNA FOTO
           ===================================================== */

        .visita-fotos:has(.visita-foto:only-child) {

            grid-template-columns:
                minmax(300px, 650px);

            justify-content: center;

        }


        .visita-fotos:has(.visita-foto:only-child) .visita-foto img {

            height: 380px;

        }


        /* =====================================================
           DOS FOTOS
           ===================================================== */

        .visita-fotos:has(.visita-foto:first-child:nth-last-child(2)) {

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

        }


        /* =====================================================
           SIN FOTOS
           ===================================================== */

        .sin-fotografias {

            padding: 0.9rem;

            border-radius: 10px;

            background:
                rgba(255, 255, 255, 0.07);

            color: #e0ebf4;

            text-align: center;

        }


        /* =====================================================
           SIN VISITAS
           ===================================================== */

        .sin-visitas {

            text-align: center;

            padding: 4rem 2rem;

            border-radius: 20px;

            background:
                rgba(3, 24, 48, 0.58);

            border:
                1px solid rgba(255, 255, 255, 0.18);

            box-shadow:
                0 14px 30px rgba(0, 0, 0, 0.18);

            color: #ffffff;

        }


        .sin-visitas h2 {

            margin-bottom: 1rem;

            color: #ffffff;

        }


        /* =====================================================
           BOTÓN VOLVER
           ===================================================== */

        .volver-inicio {

            text-align: center;

            margin-top: 3rem;

        }


        /* =====================================================
           TABLET
           ===================================================== */

        @media (max-width: 900px) {

            .visita-fotos {

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));

            }


            .visitas-page-header h1 {

                font-size: 2.4rem;

            }


            .visita-institucion {

                font-size: 1.7rem;

            }


            .visita-info {

                padding:
                    1.8rem 2rem 0.7rem;

            }


            .visita-galeria-area {

                padding:
                    0.5rem 2rem 2rem;

            }

        }


        /* =====================================================
           CELULAR
           ===================================================== */

        @media (max-width: 600px) {

            .visitas-page-header {

                padding-top: 7rem;

            }


            .visitas-page-header h1 {

                font-size: 2rem;

            }


            .visitas-page-header p {

                font-size: 1rem;

            }


            .visita-info {

                padding:
                    1.4rem 1.3rem 0.5rem;

            }


            .visita-institucion {

                font-size: 1.5rem;

            }


            .visita-titulo {

                font-size: 1.1rem;

            }


            .visita-descripcion {

                font-size: 1rem;

                line-height: 1.5;

            }


            .visita-galeria-area {

                padding:
                    0.45rem 1.3rem 1.6rem;

            }


            .visita-fotos {

                grid-template-columns: 1fr;

            }


            .visita-foto img {

                height: 250px;

            }


            /* =============================================
               EFECTO MÁS SUAVE EN CELULAR
               ============================================= */

            .visita-foto:hover {

                transform:
                    translateY(-10px) scale(1.02);

            }


            .visita-foto:hover img {

                transform:
                    scale(1.04);

            }


            /* =============================================
               UNA FOTO
               ============================================= */

            .visita-fotos:has(.visita-foto:only-child) {

                grid-template-columns: 1fr;

            }


            .visita-fotos:has(.visita-foto:only-child) .visita-foto img {

                height: 280px;

            }


            /* =============================================
               DOS FOTOS
               ============================================= */

            .visita-fotos:has(.visita-foto:first-child:nth-last-child(2)) {

                grid-template-columns: 1fr;

            }

        }
    </style>

</head>


<body>


    <!-- =====================================================
         IMAGEN DE FONDO
         ===================================================== -->

    <div class="fondo-visitas"></div>


    <!-- =====================================================
         CAPA SOBRE EL FONDO
         ===================================================== -->

    <div class="fondo-overlay"></div>


    <!-- =====================================================
         DESTELLOS
         ===================================================== -->

    <div class="page-glow glow-one"></div>

    <div class="page-glow glow-two"></div>

    <div class="page-glow glow-three"></div>



    <!-- =====================================================
         HEADER
         ===================================================== -->

    <header class="site-header">

        <div class="container header-inner">


            <a
                href="{{ url('/') }}#inicio"
                class="brand">

                <img
                    src="{{ asset('imgs/Logo.jpg') }}"
                    alt="Logo CID Pujllay"
                    class="logo">

            </a>



            <nav
                class="main-nav"
                aria-label="Menú principal">


                <a href="{{ url('/') }}#inicio">
                    Inicio
                </a>


                <a href="{{ url('/') }}#nosotros">
                    Nosotros
                </a>


                <a href="{{ url('/') }}#galeria">
                    Galería
                </a>


                <a href="{{ url('/') }}#programas">
                    Programas
                </a>


                <a href="{{ url('/') }}#visitas">
                    Visitas
                </a>


                <a href="{{ url('/') }}#silviatv">
                    Silvia TV
                </a>


                <a href="{{ url('/') }}#capacitaciones">
                    Capacitaciones
                </a>


                <a href="{{ url('/') }}#contacto">
                    Contacto
                </a>


            </nav>



            <button
                class="nav-toggle"
                aria-label="Abrir menú"
                type="button">

                ☰

            </button>


        </div>

    </header>



    <!-- =====================================================
         ENCABEZADO
         ===================================================== -->

    <section class="section visitas-page-header">

        <div class="container">


            <h1>

                Visitas al CID Pujllay

            </h1>


            <p>

                Conoce las instituciones educativas que han visitado
                el CID Pujllay y las experiencias desarrolladas
                durante sus jornadas de aprendizaje, innovación
                y tecnología.

            </p>


        </div>

    </section>



    <!-- =====================================================
         VISITAS
         ===================================================== -->

    <section class="section">

        <div class="container">


            @if($visits->isEmpty())


            <div class="sin-visitas">


                <h2>

                    Próximamente

                </h2>


                <p>

                    Aún no se han publicado visitas al CID Pujllay.

                </p>


            </div>


            @else


            <div class="visitas-lista">


                @foreach($visits as $visit)


                <article class="visita-completa">


                    <!-- =========================================
                                 INFORMACIÓN
                                 ========================================= -->

                    <div class="visita-info">


                        @if($visit->institution)

                        <div class="visita-institucion">

                            {{ $visit->institution }}

                        </div>

                        @endif



                        <h2 class="visita-titulo">

                            {{ $visit->title }}

                        </h2>



                        @if($visit->description)

                        <div class="visita-descripcion">

                            {{ $visit->description }}

                        </div>

                        @endif


                        @if($visit->visit_date)

                        <div class="visita-fecha">

                            <span>

                                {{ $visit->visit_date->format('d/m/Y') }}

                            </span>

                        </div>

                        @endif


                    </div>



                    <!-- =========================================
                                 FOTOGRAFÍAS
                                 ========================================= -->

                    @if($visit->images->isNotEmpty())


                    <div class="visita-galeria-area">


                        <div class="visita-fotos">


                            @foreach($visit->images as $image)


                            <div class="visita-foto">


                                <img
                                    src="{{ asset('storage/' . $image->image) }}"
                                    alt="Fotografía de {{ $visit->institution ?? $visit->title }}"
                                    loading="lazy">


                            </div>


                            @endforeach


                        </div>


                    </div>


                    @else


                    <div class="visita-galeria-area">


                        <div class="sin-fotografias">

                            No se han agregado fotografías
                            para esta visita.

                        </div>


                    </div>


                    @endif


                </article>


                @endforeach


            </div>


            @endif



            <!-- =================================================
                 VOLVER
                 ================================================= -->

            <div class="volver-inicio">


                <a
                    href="{{ url('/') }}#visitas"
                    class="btn">

                    ← Volver al inicio

                </a>


            </div>


        </div>

    </section>



    <!-- =====================================================
         FOOTER
         ===================================================== -->

    <footer class="site-footer">

        <div class="container">


            <p>

                © <span id="year"></span>
                CID Pujllay — Todos los derechos reservados

            </p>


            <p>

                <small>
                    Desarrollado con fines educativos en Arequipa, Perú
                </small>

            </p>


            <p>

                <strong>
                    Síguenos:
                </strong>


                <a
                    href="https://www.facebook.com/cidpujllay"
                    target="_blank"
                    rel="noopener noreferrer">

                    Facebook

                </a>

                |


                <a
                    href="https://www.instagram.com/cid.pujllay"
                    target="_blank"
                    rel="noopener noreferrer">

                    Instagram

                </a>


            </p>


        </div>

    </footer>



    <!-- =====================================================
         BOTÓN VOLVER ARRIBA
         ===================================================== -->

    <button
        id="toTop"
        type="button"
        onclick="scrollToTop()"
        aria-label="Volver arriba">

        ↑

    </button>



    <!-- =====================================================
         JAVASCRIPT
         ===================================================== -->

    <script src="{{ asset('js/app.js') }}"></script>


</body>

</html>