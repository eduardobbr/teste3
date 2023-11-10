<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css\index.css">
    <title>Conseiller | Weega - IT&K</title>
</head>

<body>
    <!-- Barra de navegação -->
    <nav class="navbar"></nav>

    <!-- Barra lateral -->
    <div class="sidebar">
        <div class="title">CSLR|WGA</div>
        <a href="{{ route('dashboard') }}"
            class="{{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">Dashboard</a>
        <a href="#" id="adminLink"
            class="{{ Route::currentRouteName() === 'admin' ? 'active' : '' }}">Administrador</a>
        <a href="{{ route('tuneldotempo') }}" id="timeTunnel"
            class="{{ Route::currentRouteName() === 'tuneldotempo' ? 'active' : '' }}">Tunel do Tempo</a>
        <hr style="width: 15rem" color="black">
    </div>

    <div class="content">
        <h3>SITUAÇÃO</h3>
        <div class="table-container">
            <table>
                <tr>
                    <th>SITUAÇÃO</th>
                    <th>DATA</th>
                    <th>ADMINISTRADOR</th>
                    <th>QNTD_DIAS</th>
                    <th>MOTIVO</th>
                </tr>
                <tr>
                    <td>administador</td>
                    <td>administador</td>
                    <td>administador</td>
                    <td>administador</td>
                    <td>administador</td>
                </tr>
            </table>
        </div>
    </div>




    <div class="content2">
        <h4>HISTÓRICO</h4>
        <div class="table-container2">
            <table>
                <tr>
                    <th>SITUAÇÃO</th>
                    <th>DATA</th>
                    <th>ADMINISTRADOR</th>
                    <th>QNTD_DIAS</th>
                    <th>MOTIVO</th>
                </tr>
                <tr>
                    <td>administador</td>
                    <td>administador</td>
                    <td>administador</td>
                    <td>administador</td>
                    <td>administador</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Botão do pop-up -->
    <button class="btnOpenModal" onclick="openModal()">Abrir Túnel</button>

    <!-- Modal Container -->
    <div class="modal-container">
        <div class="modal">
            <h2>Info</h2>
            <hr>
            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto ipsam quia commodi natus repellat quis
                quaerat est! Aliquam repudiandae aspernatur ipsum quae. Et, optio veniam! Nobis at aut mollitia
                non.</span>
            <hr>
            <div class="btns">
                <button class="btnClose" onclick="closeModal()">Close</button>
                <button class="btnOK" onclick="closeModal()">Ok</button>
            </div>
        </div>
    </div>

    <div class="overlay"></div>

    <!-- Outro conteúdo, se houver -->

    {{-- conteudo principal --}}
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

        const modal = document.querySelector('.modal-container')

        function openModal() {
            modal.classList.add('active')
            document.querySelector('.overlay').classList.add('active');
        }

        function closeModal() {
            modal.classList.remove('active')
            document.querySelector('.overlay').classList.remove('active');
        }
    </script>
</body>

</html>
