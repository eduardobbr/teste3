<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css\index.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <title>Conseiller | Weega - IT&K</title>
</head>

<body>

    <!-- Barra de navegação -->
    <nav class="navbar">
    </nav>

    <!-- Barra lateral -->
    <div class="sidebar">
        <div class="title">CSLR|WGA</div>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="#" id="adminLink">Administrador</a>
        <a href="{{ route('tuneldotempo') }}" id="timeTunnel">Tunel do Tempo</a>

        <hr style="width: 15rem" color="black">
    </div>

    {{-- conteudo principal --}}

    <div class="imagem">
        <img src="{{ asset('img/dashboard.png') }}" alt="description of myimage">
    </div>


    <script>
        // Adicione um evento de clique ao link "Administrador"
        document.getElementById("adminLink").addEventListener("click", function() {
            // Quando o link "Administrador" for clicado, verifique o estado atual do "Tunel do Tempo"
            var timeTunnel = document.getElementById("timeTunnel");
            if (timeTunnel.style.display === "none" || timeTunnel.style.display === "") {
                // Se estiver oculto, mostre o "Tunel do Tempo"
                timeTunnel.style.display = "block";
            } else {
                // Se estiver visível, oculte o "Tunel do Tempo"
                timeTunnel.style.display = "none";
            }
        });
    </script>
</body>

</html>
