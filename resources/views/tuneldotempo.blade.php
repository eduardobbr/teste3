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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Botão do pop-up -->
    <button class="btnOpenModal" onclick="openModal()">Abrir Túnel</button>

    <!-- Modal Container -->
    <div class="modal-container">
        <div class="modal">
            <h2>Conseiller - Túnel do Tempo</h2>
            <div class="form-container">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" placeholder="Informe seu nome">

                <input type="text" id="dataModal" readonly>

                <label for="dias">Dias desejados:</label>
                <input type="number" id="dias" placeholder="Informe a quantidade de dias">

                <label for="motivo">Motivo:</label>
                <textarea id="motivo" placeholder="Informe o motivo"></textarea>
            </div>
            <div class="btns">
                <button class="close-btn" onclick="closeModal()">&times;</button>
                <button class="btnOK" type="submit">Alterar</button>
            </div>
        </div>
    </div>

    <div class="overlay"></div>


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


        function openModal() {
            const modal = document.querySelector('.modal-container');
            modal.classList.add('active');
            document.querySelector('.overlay').classList.add('active');

            // Obtenha o elemento de entrada de nome no modal
            var nomeInputModal = document.getElementById('nome');

            // Defina o valor do campo de entrada de nome como "Gilson"
            nomeInputModal.value = "Gilson";

            // Tornar o campo de entrada de nome somente leitura
            nomeInputModal.setAttribute('readonly', 'true');

            // Obtenha o elemento de entrada de data no modal
            var dataInputModal = document.getElementById('dataModal');

            // Obtenha a data atual
            var dataAtual = new Date();

            // Formate a data no formato "DD/MM/AAAA"
            var formattedDate =
                ("0" + dataAtual.getDate()).slice(-2) + "/" +
                ("0" + (dataAtual.getMonth() + 1)).slice(-2) + "/" +
                dataAtual.getFullYear();

            // Defina a data atual no campo de entrada de data no modal
            dataInputModal.value = formattedDate;

            // Defina o campo de entrada de data como somente leitura
            dataInputModal.setAttribute('readonly', 'true');
        }



        function closeModal() {
            const modal = document.querySelector('.modal-container');
            modal.classList.remove('active');
            document.querySelector('.overlay').classList.remove('active');
        }
    </script>
</body>

</html>