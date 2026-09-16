<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CID Pujllay - Centro de Investigación y Desarrollo</title>

    <meta name="description"
        content="CID Pujllay — Centro de Investigación y Desarrollo de UGEL Arequipa Sur. Promovemos la educación tecnológica, robótica, diseño 3D e inteligencia artificial.">

    <meta name="keywords"
        content="CID Pujllay, educación tecnológica, robótica, Arequipa, UGEL, pensamiento computacional, inteligencia artificial">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>


<body>

    <!-- =====================================================
         HEADER aquiiiiiiiiiiii
         ===================================================== -->

    <header class="site-header">

        <div class="container header-inner">

            <a href="#inicio" class="brand">

                <img
                    src="{{ asset('imgs/Logo.jpg') }}"
                    alt="Logo CID Pujllay"
                    class="logo">

            </a>


            <nav class="main-nav" aria-label="Menú principal">

                <a href="#inicio">Inicio</a>

                <a href="#nosotros">Nosotros</a>

                <a href="#galeria">Galería</a>

                <a href="#programas">Programas</a>

                <a href="#visitas">Visitas</a>

                <a href="#silviatv">Silvia TV</a>

                <a href="#capacitaciones">Capacitaciones</a>

                <a href="#contacto" class="btn-primary">Contactar</a>

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
         HERO / INICIO
         ===================================================== -->

    <section id="inicio" class="hero">

        <div class="container hero-content">

            @php

            /*
            |--------------------------------------------------------------------------
            | BUSCAR RECURSOS DEL HOME
            |--------------------------------------------------------------------------
            |
            | El nombre identifica exactamente qué elemento se modifica.
            |
            */

            $banner = $galleries->first(function ($gallery) {
            return $gallery->section === 'Inicio'
            && $gallery->name === 'Banner';
            });

            $presentacion = $galleries->first(function ($gallery) {
            return $gallery->section === 'Inicio'
            && $gallery->name === 'Presentación';
            });

            @endphp


            <!-- =================================================
                 BANNER
                 ================================================= -->

            @if($banner && $banner->image)

            @if($banner->type === 'Video')

            <video
                controls
                class="hero-banner"
                style="width:100%; border-radius:12px;">
                <source src="{{ asset('storage/' . $banner->image) }}">
            </video>

            @else

            <img
                src="{{ asset('storage/' . $banner->image) }}"
                alt="{{ $banner->title ?? 'Banner CID Pujllay' }}"
                class="hero-banner">

            @endif

            @else

            <img
                src="{{ asset('imgs/Banner.jpg') }}"
                alt="Banner CID Pujllay"
                class="hero-banner">

            @endif


            <!-- =================================================
                 VIDEO DE PRESENTACIÓN
                 ================================================= -->

            <div class="presentation-video">

                @if($presentacion && $presentacion->image)

                @if($presentacion->type === 'Video')

                <video
                    controls
                    poster="{{ asset('imgs/Banner.jpg') }}"
                    style="width:100%; border-radius:12px;">
                    <source src="{{ asset('storage/' . $presentacion->image) }}">
                </video>

                @else

                <img
                    src="{{ asset('storage/' . $presentacion->image) }}"
                    alt="{{ $presentacion->title ?? 'Presentación CID Pujllay' }}"
                    style="width:100%; border-radius:12px;">

                @endif

                @else

                <video
                    controls
                    poster="{{ asset('imgs/Banner.jpg') }}"
                    style="width:100%; border-radius:12px;">
                    <source
                        src="{{ asset('videos/PUJLLAYpresentacion.mp4') }}"
                        type="video/mp4">
                </video>

                @endif

            </div>


            <!-- =================================================
                 TEXTO PRINCIPAL
                 ================================================= -->

            <h1>
                {{ $contents['titulo']->content ?? 'CID PUJLLAY' }}
            </h1>


            <p class="lead">

                {{ $contents['subtitulo']->content ?? 'Centro de Investigación y Desarrollo — UGEL Sur, Arequipa' }}

            </p>


            <p>

                {{ $contents['descripcion']->content ?? 'Impulsando una educación tecnológica, creativa e inclusiva que prepara a estudiantes y docentes para los retos del siglo XXI mediante metodologías STEAM + H.' }}

            </p>


            <a
                class="btn"
                href="#programas">

                Explorar Programas

            </a>

        </div>

    </section>


    <!-- =====================================================
         NOSOTROS
         ===================================================== -->

    <section id="nosotros" class="section container">

        <h2>
            {{ $contents['nosotros_titulo']->content ?? 'Sobre Nosotros' }}
        </h2>


        <p>

            {{ $contents['nosotros_descripcion']->content ?? 'El CID Pujllay es un espacio de la UGEL Arequipa Sur dedicado a la experimentación pedagógica y a la integración de tecnologías educativas. Nuestro propósito es transformar el aprendizaje mediante actividades activas y contextuales que involucran robótica, diseño 3D, programación y reflexión ética.' }}

        </p>


        <div class="about-grid">

            <article>

                <h3>
                    Misión
                </h3>


                <p>

                    {{ $contents['mision']->content ?? 'Fomentar la innovación educativa y las competencias tecnológicas en estudiantes y docentes, promoviendo una cultura de investigación, creatividad y colaboración.' }}

                </p>

            </article>


            <article>

                <h3>
                    Visión
                </h3>


                <p>

                    {{ $contents['vision']->content ?? 'Consolidarnos como referente regional en prácticas pedagógicas tecnológicas, compartiendo recursos y metodologías replicables que impulsen la educación en Arequipa y el país.' }}

                </p>

            </article>

        </div>

    </section>


    <!-- =====================================================
         GALERÍA
         ===================================================== -->

    <section
        id="galeria"
        class="section container gallery">

        <h2>
            {{ $contents['galeria_titulo']->content ?? 'Galería de Recursos' }}
        </h2>


        @php

        /*
        |--------------------------------------------------------------------------
        | GALERÍA
        |--------------------------------------------------------------------------
        |
        | Cada nombre busca solamente su propio recurso.
        |
        | Si existe en la BD:
        | se utiliza el archivo de la BD.
        |
        | Si NO existe:
        | se utiliza la imagen original de imgs/.
        |
        */

        $beeBot = $galleries->first(function ($gallery) {
        return $gallery->section === 'Galería'
        && $gallery->name === 'Bee-Bot';
        });

        $mekorama = $galleries->first(function ($gallery) {
        return $gallery->section === 'Galería'
        && $gallery->name === 'Mekorama';
        });

        $blueBot = $galleries->first(function ($gallery) {
        return $gallery->section === 'Galería'
        && $gallery->name === 'Blue-Bot';
        });

        $ludio = $galleries->first(function ($gallery) {
        return $gallery->section === 'Galería'
        && $gallery->name === 'Ludio Max';
        });

        $mbot = $galleries->first(function ($gallery) {
        return $gallery->section === 'Galería'
        && $gallery->name === 'mBot';
        });

        @endphp


        <div class="gallery-grid">


            <!-- =================================================
                 BEE-BOT
                 ================================================= -->

            <div
                class="gallery-item"
                onclick="toggleDesc('bee')">


                @if($beeBot && $beeBot->image)

                @if($beeBot->type === 'Video')

                <video
                    controls
                    width="300"
                    height="300"
                    style="object-fit:cover; border-radius:8px;">
                    <source src="{{ asset('storage/' . $beeBot->image) }}">
                </video>

                @else

                <img
                    src="{{ asset('storage/' . $beeBot->image) }}"
                    alt="{{ $beeBot->title ?? 'Aplicación educativa Bee-Bot' }}"
                    width="300"
                    height="300">

                @endif

                @else

                <img
                    src="{{ asset('imgs/beebot.png') }}"
                    alt="Aplicación educativa Bee-Bot"
                    width="300"
                    height="300">

                @endif


                <div
                    id="bee"
                    class="desc">

                    <p>

                        <strong>
                            {{ $beeBot->title ?? 'Bee-Bot' }}:
                        </strong>

                        {{ $beeBot->description ?? 'Actividades para inicial y primaria que desarrollan secuenciación, direccionalidad y pensamiento lógico.' }}

                    </p>

                </div>

            </div>


            <!-- =================================================
                 MEKORAMA
                 ================================================= -->

            <div
                class="gallery-item"
                onclick="toggleDesc('mekorama')">


                @if($mekorama && $mekorama->image)

                @if($mekorama->type === 'Video')

                <video
                    controls
                    width="300"
                    height="300"
                    style="object-fit:cover; border-radius:8px;">
                    <source src="{{ asset('storage/' . $mekorama->image) }}">
                </video>

                @else

                <img
                    src="{{ asset('storage/' . $mekorama->image) }}"
                    alt="{{ $mekorama->title ?? 'Juego educativo Mekorama en 3D' }}"
                    width="300"
                    height="300">

                @endif

                @else

                <img
                    src="{{ asset('imgs/mekorama.png') }}"
                    alt="Juego educativo Mekorama en 3D"
                    width="300"
                    height="300">

                @endif


                <div
                    id="mekorama"
                    class="desc">

                    <p>

                        <strong>
                            {{ $mekorama->title ?? 'Mekorama' }}:
                        </strong>

                        {{ $mekorama->description ?? 'Puzles en 3D para estimular la creatividad, planificación espacial y resolución de problemas.' }}

                    </p>

                </div>

            </div>


            <!-- =================================================
                 BLUE-BOT
                 ================================================= -->

            <div
                class="gallery-item"
                onclick="toggleDesc('bluebot')">


                @if($blueBot && $blueBot->image)

                @if($blueBot->type === 'Video')

                <video
                    controls
                    width="300"
                    height="300"
                    style="object-fit:cover; border-radius:8px;">
                    <source src="{{ asset('storage/' . $blueBot->image) }}">
                </video>

                @else

                <img
                    src="{{ asset('storage/' . $blueBot->image) }}"
                    alt="{{ $blueBot->title ?? 'Robot educativo Blue-Bot' }}"
                    width="300"
                    height="300">

                @endif

                @else

                <img
                    src="{{ asset('imgs/bluebot.png') }}"
                    alt="Robot educativo Blue-Bot"
                    width="300"
                    height="300">

                @endif


                <div
                    id="bluebot"
                    class="desc">

                    <p>

                        <strong>
                            {{ $blueBot->title ?? 'Blue-Bot' }}:
                        </strong>

                        {{ $blueBot->description ?? 'Plataforma de aprendizaje manipulativa para introducir conceptos de programación a los más pequeños.' }}

                    </p>

                </div>

            </div>


            <!-- =================================================
                 LUDIO MAX
                 ================================================= -->

            <div
                class="gallery-item"
                onclick="toggleDesc('ludio')">


                @if($ludio && $ludio->image)

                @if($ludio->type === 'Video')

                <video
                    controls
                    width="300"
                    height="300"
                    style="object-fit:cover; border-radius:8px;">
                    <source src="{{ asset('storage/' . $ludio->image) }}">
                </video>

                @else

                <img
                    src="{{ asset('storage/' . $ludio->image) }}"
                    alt="{{ $ludio->title ?? 'Placa electrónica Ludio Max' }}"
                    width="300"
                    height="300">

                @endif

                @else

                <img
                    src="{{ asset('imgs/ludio.png') }}"
                    alt="Placa electrónica Ludio Max"
                    width="300"
                    height="300">

                @endif


                <div
                    id="ludio"
                    class="desc">

                    <p>

                        <strong>
                            {{ $ludio->title ?? 'Ludio Max' }}:
                        </strong>

                        {{ $ludio->description ?? 'Placa electrónica diseñada para desarrollar proyectos de robótica educativa, como robots seguidores de línea y robots sumo, utilizando el software Ludio-Block para su programación.' }}

                    </p>

                </div>

            </div>


            <!-- =================================================
                 MBOT
                 ================================================= -->

            <div
                class="gallery-item"
                onclick="toggleDesc('mbot')">


                @if($mbot && $mbot->image)

                @if($mbot->type === 'Video')

                <video
                    controls
                    width="300"
                    height="300"
                    style="object-fit:cover; border-radius:8px;">
                    <source src="{{ asset('storage/' . $mbot->image) }}">
                </video>

                @else

                <img
                    src="{{ asset('storage/' . $mbot->image) }}"
                    alt="{{ $mbot->title ?? 'Robot educativo mBot' }}"
                    width="300"
                    height="300">

                @endif

                @else

                <img
                    src="{{ asset('imgs/mbot.jpg') }}"
                    alt="Robot educativo mBot"
                    width="300"
                    height="300">

                @endif


                <div
                    id="mbot"
                    class="desc">

                    <p>

                        <strong>
                            {{ $mbot->title ?? 'mBot' }}:
                        </strong>

                        {{ $mbot->description ?? 'Kit de robótica todo en uno que permite a los niños construir, personalizar y programar un robot, explorando mecánica, ingeniería, circuitos y programación de forma divertida.' }}

                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         PROGRAMAS
         ===================================================== -->

    <section
        id="programas"
        class="section"
        style="background:#f0f4f8;">

        <div class="container">

            @php

            $roboticaImagen = $galleries->first(function ($gallery) {
            return $gallery->section === 'Programas'
            && $gallery->name === 'Robótica Educativa';
            });

            $diseno3dImagen = $galleries->first(function ($gallery) {
            return $gallery->section === 'Programas'
            && $gallery->name === 'Diseño 3D e Impresión';
            });

            $iaImagen = $galleries->first(function ($gallery) {
            return $gallery->section === 'Programas'
            && $gallery->name === 'Inteligencia Artificial y Ética';
            });

            $pensamientoImagen = $galleries->first(function ($gallery) {
            return $gallery->section === 'Programas'
            && $gallery->name === 'Pensamiento Computacional';
            });

            @endphp

            <h2>
                {{ $contents['programas_titulo']->content ?? 'Programas y Áreas de Trabajo' }}
            </h2>


            <p
                style="text-align:center; font-size:1.3rem; margin-bottom:4rem;">

                {{ $contents['programas_descripcion']->content ?? 'Experiencias y talleres estructurados para distintos niveles educativos, integrando la metodología STEAM + H para un aprendizaje con sentido social y ético.' }}

            </p>


            <div class="accordion">


                <!-- ROBÓTICA -->

                <div class="accordion-item">

                    <div
                        class="accordion-title"
                        onclick="toggleAccordion(this)"
                        style="background:#FFEBCC;">

                        {{ $contents['robotica_titulo']->content ?? 'Robótica Educativa' }}

                    </div>


                    <div
                        class="accordion-content"
                        style="background:#FFF4E1;">

                        <p>

                            {{ $contents['robotica_descripcion']->content ?? 'Actividades prácticas con Bee-Bot, Blue-Bot y kits de construcción que promueven pensamiento secuencial, trabajo colaborativo y resolución de problemas.' }}

                        </p>


                        @if($roboticaImagen && $roboticaImagen->image)

                        @if($roboticaImagen->type === 'Video')

                        <video
                            controls
                            style="width:100%; max-width:600px; border-radius:10px;">
                            <source src="{{ asset('storage/' . $roboticaImagen->image) }}">
                        </video>

                        @else

                        <img
                            src="{{ asset('storage/' . $roboticaImagen->image) }}"
                            alt="{{ $roboticaImagen->title ?? 'Robótica Educativa' }}">

                        @endif

                        @else

                        <img
                            src="{{ asset('imgs/robotica.png') }}"
                            alt="Robótica Educativa">

                        @endif

                    </div>

                </div>


                <!-- DISEÑO 3D -->

                <div class="accordion-item">

                    <div
                        class="accordion-title"
                        onclick="toggleAccordion(this)"
                        style="background:#D1F2EB;">

                        {{ $contents['diseno3d_titulo']->content ?? 'Diseño 3D e Impresión' }}

                    </div>


                    <div
                        class="accordion-content"
                        style="background:#E0F7F4;">

                        <p>

                            {{ $contents['diseno3d_descripcion']->content ?? 'Modelado en Tinkercad y fabricación digital; los estudiantes transforman ideas en prototipos tangibles que pueden abordar problemas reales.' }}

                        </p>


                        @if($diseno3dImagen && $diseno3dImagen->image)

                        @if($diseno3dImagen->type === 'Video')

                        <video
                            controls
                            style="width:100%; max-width:600px; border-radius:10px;">
                            <source src="{{ asset('storage/' . $diseno3dImagen->image) }}">
                        </video>

                        @else

                        <img
                            src="{{ asset('storage/' . $diseno3dImagen->image) }}"
                            alt="{{ $diseno3dImagen->title ?? 'Diseño 3D e Impresión' }}">

                        @endif

                        @else

                        <img
                            src="{{ asset('imgs/3d.png') }}"
                            alt="Diseño 3D e Impresión">

                        @endif

                    </div>

                </div>


                <!-- INTELIGENCIA ARTIFICIAL -->

                <div class="accordion-item">

                    <div
                        class="accordion-title"
                        onclick="toggleAccordion(this)"
                        style="background:#FDEBD0;">

                        {{ $contents['ia_titulo']->content ?? 'Inteligencia Artificial y Ética' }}

                    </div>


                    <div
                        class="accordion-content"
                        style="background:#FFF2E0;">

                        <p>

                            {{ $contents['ia_descripcion']->content ?? 'Introducción a conceptos básicos de IA, análisis de impacto social y reflexión sobre el uso responsable de la tecnología.' }}

                        </p>


                        @if($iaImagen && $iaImagen->image)

                        @if($iaImagen->type === 'Video')

                        <video
                            controls
                            style="width:100%; max-width:600px; border-radius:10px;">
                            <source src="{{ asset('storage/' . $iaImagen->image) }}">
                        </video>

                        @else

                        <img
                            src="{{ asset('storage/' . $iaImagen->image) }}"
                            alt="{{ $iaImagen->title ?? 'Inteligencia Artificial' }}">

                        @endif

                        @else

                        <img
                            src="{{ asset('imgs/ia.png') }}"
                            alt="Inteligencia Artificial">

                        @endif

                    </div>

                </div>


                <!-- PENSAMIENTO COMPUTACIONAL -->

                <div class="accordion-item">

                    <div
                        class="accordion-title"
                        onclick="toggleAccordion(this)"
                        style="background:#D6EAF8;">

                        {{ $contents['pensamiento_titulo']->content ?? 'Pensamiento Computacional' }}

                    </div>


                    <div
                        class="accordion-content"
                        style="background:#EBF5FB;">

                        <p>

                            {{ $contents['pensamiento_descripcion']->content ?? 'Programación por bloques, algoritmos y descomposición de problemas, adaptado desde inicial hasta secundaria.' }}

                        </p>


                        @if($pensamientoImagen && $pensamientoImagen->image)

                        @if($pensamientoImagen->type === 'Video')

                        <video
                            controls
                            style="width:100%; max-width:600px; border-radius:10px;">
                            <source src="{{ asset('storage/' . $pensamientoImagen->image) }}">
                        </video>

                        @else

                        <img
                            src="{{ asset('storage/' . $pensamientoImagen->image) }}"
                            alt="{{ $pensamientoImagen->title ?? 'Pensamiento Computacional' }}">

                        @endif

                        @else

                        <img
                            src="{{ asset('imgs/computacional.jpg') }}"
                            alt="Pensamiento Computacional">

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
     VISITAS
     ===================================================== -->

    <section
        id="visitas"
        class="section container">

        <h2>
            {{ $contents['visitas_titulo']->content ?? 'Visitas' }}
        </h2>


        @php

        $visitaDestacada1 = $galleries->first(function ($gallery) {
        return $gallery->section === 'Visitas'
        && $gallery->name === 'Visita destacada 1';
        });

        $visitaDestacada2 = $galleries->first(function ($gallery) {
        return $gallery->section === 'Visitas'
        && $gallery->name === 'Visita destacada 2';
        });

        @endphp


        <div class="visitas-grid">

            @if($visitaDestacada1 && $visitaDestacada1->image)

            @if($visitaDestacada1->type === 'Video')

            <video controls style="width:100%; border-radius:10px;">
                <source src="{{ asset('storage/' . $visitaDestacada1->image) }}">
            </video>

            @else

            <img
                src="{{ asset('storage/' . $visitaDestacada1->image) }}"
                alt="{{ $visitaDestacada1->title ?? 'Visita destacada 1' }}">

            @endif

            @else

            <img
                src="{{ asset('imgs/visita2.png') }}"
                alt="Visita 2">

            @endif


            @if($visitaDestacada2 && $visitaDestacada2->image)

            @if($visitaDestacada2->type === 'Video')

            <video controls style="width:100%; border-radius:10px;">
                <source src="{{ asset('storage/' . $visitaDestacada2->image) }}">
            </video>

            @else

            <img
                src="{{ asset('storage/' . $visitaDestacada2->image) }}"
                alt="{{ $visitaDestacada2->title ?? 'Visita destacada 2' }}">

            @endif

            @else

            <img
                src="{{ asset('imgs/visita3.png') }}"
                alt="Visita 3">

            @endif

        </div>


        <!-- BOTÓN PARA VER TODAS LAS VISITAS -->

        <div
            style="
            text-align:center;
            margin-top:2.5rem;
        ">

            <a
                href="{{ route('visitas.index') }}"
                class="btn">

                Ver todas las visitas

            </a>

        </div>

    </section>

    <!-- =====================================================
     SILVIA TV
     ===================================================== -->

    <section
        id="silviatv"
        class="section">

        <div class="container">


            @php

            /*
            |--------------------------------------------------------------------------
            | IMAGEN / VIDEO LOCAL DE SILVIA TV
            |--------------------------------------------------------------------------
            */

            $silviaImagen = $galleries->first(function ($gallery) {

            return $gallery->section === 'Silvia TV'
            && $gallery->name === 'Imagen Silvia TV';

            });


            /*
            |--------------------------------------------------------------------------
            | URL DEL VIDEO DE YOUTUBE
            |--------------------------------------------------------------------------
            */

            $silviaYoutubeOriginal =
            $contents['video_youtube']->content
            ?? 'https://www.youtube.com/watch?v=AA_oGG6uudQ';


            $silviaYoutubeEmbed =
            'https://www.youtube.com/embed/AA_oGG6uudQ';


            if (!empty($silviaYoutubeOriginal)) {

            /*
            |--------------------------------------------------------------
            | Formato:
            | https://www.youtube.com/watch?v=XXXXXXXXXXX
            |--------------------------------------------------------------
            */

            if (
            preg_match(
            '/[?&]v=([^&]+)/',
            $silviaYoutubeOriginal,
            $coincidencia
            )
            ) {

            $silviaYoutubeEmbed =
            'https://www.youtube.com/embed/'
            . $coincidencia[1];

            }


            /*
            |--------------------------------------------------------------
            | Formato:
            | https://youtu.be/XXXXXXXXXXX
            |--------------------------------------------------------------
            */

            elseif (
            preg_match(
            '#youtu\.be/([^?&/]+)#',
            $silviaYoutubeOriginal,
            $coincidencia
            )
            ) {

            $silviaYoutubeEmbed =
            'https://www.youtube.com/embed/'
            . $coincidencia[1];

            }


            /*
            |--------------------------------------------------------------
            | Formato:
            | https://www.youtube.com/embed/XXXXXXXXXXX
            |--------------------------------------------------------------
            */

            elseif (
            preg_match(
            '#youtube\.com/embed/([^?&/]+)#',
            $silviaYoutubeOriginal,
            $coincidencia
            )
            ) {

            $silviaYoutubeEmbed =
            'https://www.youtube.com/embed/'
            . $coincidencia[1];

            }


            /*
            |--------------------------------------------------------------
            | Formato Shorts:
            | https://www.youtube.com/shorts/XXXXXXXXXXX
            |--------------------------------------------------------------
            */

            elseif (
            preg_match(
            '#youtube\.com/shorts/([^?&/]+)#',
            $silviaYoutubeOriginal,
            $coincidencia
            )
            ) {

            $silviaYoutubeEmbed =
            'https://www.youtube.com/embed/'
            . $coincidencia[1];

            }

            }

            @endphp


            <h2>

                {{ $contents['silvia_titulo']->content ?? 'Silvia TV' }}

            </h2>


            <div class="silvia-tv-content">


                <!-- =================================================
                 INFORMACIÓN / IMAGEN
                 ================================================= -->

                <div class="silvia-tv-info">


                    @if($silviaImagen && $silviaImagen->image)


                    @if($silviaImagen->type === 'Video')

                    <video
                        controls
                        style="
                                width:100%;
                                border-radius:10px;
                            ">

                        <source
                            src="{{ asset('storage/' . $silviaImagen->image) }}">

                    </video>

                    @else

                    <img
                        src="{{ asset('storage/' . $silviaImagen->image) }}"
                        alt="{{ $silviaImagen->title ?? 'Silvia TV' }}">

                    @endif


                    @else

                    <img
                        src="{{ asset('imgs/silviatv.jpg') }}"
                        alt="Logo Silvia TV">

                    @endif


                    <p>

                        {{ $contents['silvia_descripcion']->content
                        ?? 'Silvia TV es un canal educativo de YouTube que explora las instituciones educativas de Arequipa, compartiendo sus experiencias, innovaciones y proyectos pedagógicos destacados. Un espacio para visibilizar el talento docente y el aprendizaje transformador en nuestra región.' }}

                    </p>

                </div>


                <!-- =================================================
                 VIDEO DE YOUTUBE
                 ================================================= -->

                <div class="silvia-tv-video">

                    <div class="video-container">

                        <iframe
                            src="{{ $silviaYoutubeEmbed }}"
                            title="Silvia TV - CID Pujllay"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>

                    </div>

                </div>


            </div>

        </div>

    </section>


    <!-- =====================================================
         CAPACITACIONES
         ===================================================== -->

    <section
        id="capacitaciones"
        class="section">

        <div class="container">

            @php

            $capacitacion1 = $galleries->first(function ($gallery) {
            return $gallery->section === 'Capacitaciones'
            && $gallery->name === 'Capacitación 1';
            });

            $capacitacion2 = $galleries->first(function ($gallery) {
            return $gallery->section === 'Capacitaciones'
            && $gallery->name === 'Capacitación 2';
            });

            $capacitacion3 = $galleries->first(function ($gallery) {
            return $gallery->section === 'Capacitaciones'
            && $gallery->name === 'Capacitación 3';
            });

            $capacitacion4 = $galleries->first(function ($gallery) {
            return $gallery->section === 'Capacitaciones'
            && $gallery->name === 'Capacitación 4';
            });

            $ejercito1 = $galleries->first(function ($gallery) {
            return $gallery->section === 'Capacitaciones'
            && $gallery->name === 'Ejército 1';
            });

            $ejercito2 = $galleries->first(function ($gallery) {
            return $gallery->section === 'Capacitaciones'
            && $gallery->name === 'Ejército 2';
            });

            $ejercito3 = $galleries->first(function ($gallery) {
            return $gallery->section === 'Capacitaciones'
            && $gallery->name === 'Ejército 3';
            });

            @endphp

            <h2>
                {{ $contents['capacitaciones_titulo']->content ?? 'Capacitaciones' }}
            </h2>


            <p>

                {{ $contents['capacitaciones_descripcion']->content ?? 'En el CID Pujllay, nuestros docentes comparten sus conocimientos capacitando a otros educadores en el uso pedagógico de la tecnología, la robótica y las metodologías STEAM + H. Promovemos una comunidad docente que innova, comparte y transforma.' }}

            </p>


            <!-- GALERÍA -->

            <div
                class="gallery-grid"
                style="margin-top:2rem;">


                <div class="gallery-item">

                    @if($capacitacion1 && $capacitacion1->image)

                    @if($capacitacion1->type === 'Video')

                    <video
                        controls
                        width="300"
                        height="300"
                        style="object-fit:cover; border-radius:8px;">
                        <source src="{{ asset('storage/' . $capacitacion1->image) }}">
                    </video>

                    @else

                    <img
                        src="{{ asset('storage/' . $capacitacion1->image) }}"
                        alt="{{ $capacitacion1->title ?? 'Capacitación 1' }}"
                        width="300"
                        height="300">

                    @endif

                    @else

                    <img
                        src="{{ asset('imgs/capa1.jpg') }}"
                        alt="Capacitación 1"
                        width="300"
                        height="300">

                    @endif

                </div>


                <div class="gallery-item">

                    @if($capacitacion2 && $capacitacion2->image)

                    @if($capacitacion2->type === 'Video')

                    <video
                        controls
                        width="300"
                        height="300"
                        style="object-fit:cover; border-radius:8px;">
                        <source src="{{ asset('storage/' . $capacitacion2->image) }}">
                    </video>

                    @else

                    <img
                        src="{{ asset('storage/' . $capacitacion2->image) }}"
                        alt="{{ $capacitacion2->title ?? 'Capacitación 2' }}"
                        width="300"
                        height="300">

                    @endif

                    @else

                    <img
                        src="{{ asset('imgs/capa2.jpg') }}"
                        alt="Capacitación 2"
                        width="300"
                        height="300">

                    @endif

                </div>


                <div class="gallery-item">

                    @if($capacitacion3 && $capacitacion3->image)

                    @if($capacitacion3->type === 'Video')

                    <video
                        controls
                        width="300"
                        height="300"
                        style="object-fit:cover; border-radius:8px;">
                        <source src="{{ asset('storage/' . $capacitacion3->image) }}">
                    </video>

                    @else

                    <img
                        src="{{ asset('storage/' . $capacitacion3->image) }}"
                        alt="{{ $capacitacion3->title ?? 'Capacitación 3' }}"
                        width="300"
                        height="300">

                    @endif

                    @else

                    <img
                        src="{{ asset('imgs/capa3.jpg') }}"
                        alt="Capacitación 3"
                        width="300"
                        height="300">

                    @endif

                </div>


                <div class="gallery-item">

                    @if($capacitacion4 && $capacitacion4->image)

                    @if($capacitacion4->type === 'Video')

                    <video
                        controls
                        width="300"
                        height="300"
                        style="object-fit:cover; border-radius:8px;">
                        <source src="{{ asset('storage/' . $capacitacion4->image) }}">
                    </video>

                    @else

                    <img
                        src="{{ asset('storage/' . $capacitacion4->image) }}"
                        alt="{{ $capacitacion4->title ?? 'Capacitación 4' }}"
                        width="300"
                        height="300">

                    @endif

                    @else

                    <img
                        src="{{ asset('imgs/capa4.jpg') }}"
                        alt="Capacitación 4"
                        width="300"
                        height="300">

                    @endif

                </div>

            </div>


            <!-- VISITA DEL EJÉRCITO -->

            <div style="margin-top:4rem;">

                <h3>
                    {{ $contents['ejercito_titulo']->content ?? 'Visita de los Profesores del Ejército' }}
                </h3>


                <p>

                    {{ $contents['ejercito_descripcion']->content ?? 'El CID Pujllay recibió la visita de los docentes del Ejército, quienes participaron en una jornada de intercambio pedagógico y capacitación en herramientas tecnológicas aplicadas al aula. Un encuentro inspirador que fortalece la colaboración entre instituciones educativas y las fuerzas armadas.' }}

                </p>


                <div class="gallery-grid">


                    <div class="gallery-item">

                        @if($ejercito1 && $ejercito1->image)

                        @if($ejercito1->type === 'Video')

                        <video
                            controls
                            width="300"
                            height="300"
                            style="object-fit:cover; border-radius:8px;">
                            <source src="{{ asset('storage/' . $ejercito1->image) }}">
                        </video>

                        @else

                        <img
                            src="{{ asset('storage/' . $ejercito1->image) }}"
                            alt="{{ $ejercito1->title ?? 'Visita del Ejército 1' }}"
                            width="300"
                            height="300">

                        @endif

                        @else

                        <img
                            src="{{ asset('imgs/ejercito1.png') }}"
                            alt="Visita del Ejército 1"
                            width="300"
                            height="300">

                        @endif

                    </div>


                    <div class="gallery-item">

                        @if($ejercito2 && $ejercito2->image)

                        @if($ejercito2->type === 'Video')

                        <video
                            controls
                            width="300"
                            height="300"
                            style="object-fit:cover; border-radius:8px;">
                            <source src="{{ asset('storage/' . $ejercito2->image) }}">
                        </video>

                        @else

                        <img
                            src="{{ asset('storage/' . $ejercito2->image) }}"
                            alt="{{ $ejercito2->title ?? 'Visita del Ejército 2' }}"
                            width="300"
                            height="300">

                        @endif

                        @else

                        <img
                            src="{{ asset('imgs/ejercito2.png') }}"
                            alt="Visita del Ejército 2"
                            width="300"
                            height="300">

                        @endif

                    </div>


                    <div class="gallery-item">

                        @if($ejercito3 && $ejercito3->image)

                        @if($ejercito3->type === 'Video')

                        <video
                            controls
                            width="300"
                            height="300"
                            style="object-fit:cover; border-radius:8px;">
                            <source src="{{ asset('storage/' . $ejercito3->image) }}">
                        </video>

                        @else

                        <img
                            src="{{ asset('storage/' . $ejercito3->image) }}"
                            alt="{{ $ejercito3->title ?? 'Visita del Ejército 3' }}"
                            width="300"
                            height="300">

                        @endif

                        @else

                        <img
                            src="{{ asset('imgs/ejercito3.png') }}"
                            alt="Visita del Ejército 3"
                            width="300"
                            height="300">

                        @endif

                    </div>


                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         CONTACTO
         ===================================================== -->

    <section
        id="contacto"
        class="section container">

        <h2>
            {{ $contents['contacto_titulo']->content ?? 'Contacto' }}
        </h2>


        <p>

            <strong>Dirección:</strong>

            {{ $contents['direccion']->content ?? 'Av París con Calle 30 de Agosto, Mariano Melgar, Arequipa' }}

        </p>


        <p>

            <strong>Teléfono:</strong>

            {{ $contents['telefono']->content ?? '942 936 395' }}

        </p>


        <p>

            <strong>Email:</strong>

            <a href="mailto:{{ $contents['email']->content ?? 'cidpujllay@arequipasur.arequipa.edu.pe' }}">

                {{ $contents['email']->content ?? 'cidpujllay@arequipasur.arequipa.edu.pe' }}

            </a>

        </p>


        <p>

            <strong>Facebook:</strong>

            <a
                href="https://www.facebook.com/cidpujllay"
                target="_blank"
                rel="noopener noreferrer">

                CID Pujllay

            </a>

        </p>


        <p>

            <strong>Instagram:</strong>

            <a
                href="https://www.instagram.com/cid.pujllay"
                target="_blank"
                rel="noopener noreferrer">

                @cid.pujllay

            </a>

        </p>


        <!-- MAPA -->

        <iframe
            src="https://www.google.com/maps?q=Mariano+Melgar,+Arequipa,+Peru&output=embed"
            width="100%"
            height="340"
            style="border:0; margin-top:1rem; border-radius:8px;"
            allowfullscreen
            loading="lazy">
        </iframe>


        <!-- FORMULARIO -->

        <form
            action="#"
            method="POST"
            id="contactForm"
            class="contact-form">

            @csrf


            <label>

                <span>
                    Nombre
                </span>

                <input
                    type="text"
                    name="nombre"
                    placeholder="Tu nombre"
                    required>

            </label>


            <label>

                <span>
                    Correo
                </span>

                <input
                    type="email"
                    name="email"
                    placeholder="correo@ejemplo.com"
                    required>

            </label>


            <label>

                <span>
                    Mensaje
                </span>

                <textarea
                    name="mensaje"
                    rows="5"
                    placeholder="Escribe tu mensaje"
                    required></textarea>

            </label>


            <button type="submit">

                Enviar

            </button>

        </form>

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