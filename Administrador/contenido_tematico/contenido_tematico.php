<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Explorador de Contenido Temático</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('../../assets/fondotema.jpg'); /* Reemplaza 'tu-imagen-de-fondo.jpg' con la ruta de tu imagen */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 2; /* Para que el encabezado esté encima del contenido al hacer scroll */
        }

        header {
            background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
            color: white;
            text-align: center;
            padding: 15px;
        }

        nav {
            background-color: #333; /* Color de fondo oscuro */
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd; /* Cambio de color al pasar el ratón */
            color: black;
        }

        /* Estilos específicos para la página de contenido temático */
        .content {
            background-color: white; /* Fondo blanco para el recuadro del curso */
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 10px;
        }

        .category {
            margin-bottom: 20px;
        }

        .course {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .resource {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .back-button {
            background-color: #f0ad4e; /* Color naranja */
            color: white;
            border: none;
            padding: 12px 20px; /* Aumento del tamaño del botón */
            border-radius: 20px;
            font-size: 18px; /* Aumento del tamaño de la fuente */
            cursor: pointer;
        }

        /* Otros estilos según tus necesidades */
    </style>
</head>
<body>

    <header>
        <h1>Explorador de Contenido Temático</h1>
    </header>

    <nav>
        <a href="#" class="back-button" onclick="goBack()">Regresar</a>
        <a href="#">Inicio</a>
        <a href="#">Explorar Categorías</a>
        <a href="#">Mis Cursos</a>
        <a href="#">Favoritos</a>
    </nav>

    <div class="content">
        <div class="category">
            <h2>Introducción a la Impresión 3D</h2>

            <div class="course">
                <h3>Curso 1: Fundamentos de la Impresión 3D</h3>
                <p>Descripción breve del curso.</p>
                <p>Nivel de dificultad: Principiante</p>
                <button>Ver Contenido</button>
                <button>Marcar como Favorito</button>
            </div>

            <div class="course">
                <h3>Curso 2: Diseño Básico para Impresión 3D</h3>
                <p>Descripción breve del curso.</p>
                <p>Nivel de dificultad: Intermedio</p>
                <button>Ver Contenido</button>
                <button>Marcar como Favorito</button>
            </div>

            <!-- Agrega más cursos según sea necesario -->

            <div class="resource">
                <h3>Recursos Educativos</h3>
                <p>Documentos, videos y tutoriales adicionales.</p>
                <button>Explorar Recursos</button>
            </div>
        </div>

        <!-- Agrega más categorías según sea necesario -->
    </div>

    <footer>
        <p>Derechos de autor © 2023 Tu Plataforma Educativa</p>
    </footer>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>
