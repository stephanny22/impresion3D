<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Videos</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('../../assets/fondovideo.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        header {
            background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
            color: white;
            text-align: center;
            padding: 10px;
            border-bottom: 2px solid #ddd;
            position: relative;
            z-index: 2; /* Para que el encabezado esté encima del contenido al hacer scroll */
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            margin-right: 10px;
            background-color: #d9534f; /* Color rojo */
        }

        .back-button {
            background-color: #f0ad4e; /* Color naranja */
            color: white;
            border: none;
            padding: 12px 20px; /* Aumento del tamaño del botón */
            border-radius: 20px;
            font-size: 18px; /* Aumento del tamaño de la fuente */
            cursor: pointer;
            position: absolute;
            left: 10px;
            top: 10px;
            z-index: 2; /* Para que el botón esté encima del contenido al hacer scroll */
        }

        .video-list {
            max-width: 800px;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente blanco */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1; /* Para que el contenido esté detrás del encabezado al hacer scroll */
        }

        .video-item {
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }

        .video-item iframe {
            width: 100%;
            height: 315px; /* Ajusta la altura según tus preferencias */
            border: 0; /* Elimina el borde del iframe */
        }

        .youtube-button {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #d9534f; /* Color rojo */
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <header>
        <h1>Lista de Videos</h1>
        <button class="back-button" onclick="goBack()">Regresar</button>
    </header>

    <div class="video-list">
        <div class="video-item">
            <h2>Título del Video 1</h2>
            <p>Descripción del Video 1.</p>
            <iframe src="https://www.youtube.com/embed/VIDEO_ID_1" title="Video 1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <a href="https://www.youtube.com/watch?v=VIDEO_ID_1" class="youtube-button" target="_blank">Ver en YouTube</a>
        </div>

        <div class="video-item">
            <h2>Título del Video 2</h2>
            <p>Descripción del Video 2.</p>
            <iframe src="https://www.youtube.com/embed/VIDEO_ID_2" title="Video 2" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <a href="https://www.youtube.com/watch?v=VIDEO_ID_2" class="youtube-button" target="_blank">Ver en YouTube</a>
        </div>
        <!-- Agrega más elementos de video según sea necesario -->
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>