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
                    <th>DATA</th>
                    <th>ADMINISTRADOR</th>
                    <th>QNTD_DIAS</th>
                    <th>MOTIVO</th>
                </tr>
                @if (count($entries) > 0)
                    @php
                        $lastEntry = $entries[count($entries) - 1];
                    @endphp
                    <tr>
                        <td>{{ $lastEntry->data }}</td>
                        <td>{{ $lastEntry->nome }}</td>
                        <td>{{ $lastEntry->qntd_dias }}</td>
                        <td>{{ $lastEntry->motivo }}</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>




    <div class="content2">
        <h4>HISTÓRICO</h4>
        <div class="table-container2"> <!-- Adicione a classe aqui -->
            <table>
                <tr>
                    <th>DATA</th>
                    <th>ADMINISTRADOR</th>
                    <th>QNTD_DIAS</th>
                    <th>MOTIVO</th>
                </tr>
                @for ($i = count($entries) - 2; $i >= 0; $i--)
                    @php
                        $entry = $entries[$i];
                    @endphp
                    <tr>
                        <td>{{ $entry->data }}</td>
                        <td>{{ $entry->nome }}</td>
                        <td>{{ $entry->qntd_dias }}</td>
                        <td>{{ $entry->motivo }}</td>
                    </tr>
                @endfor
            </table>
        </div>
    </div>

    <!-- Botão do pop-up -->
    <button class="btnOpenModal" onclick="openModal()">Alterar Túnel</button>

    <!-- Modal Container -->
    <div class="modal-container">
        <div class="modal">
            <h2>Conseiller - Túnel do Tempo</h2>
            <div class="form-container">
                <form name="tuneldotempo" method="POST" action="{{ Route('tuneldotempo.store') }}"
                    onsubmit="return validateForm()">
                    @csrf
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" style="cursor: default" readonly>

                    <label for="date">Data:</label>
                    <input type="text" id="dataModal" name="data" style="cursor: default" readonly>

                    <label for="dias">Dias desejados:</label>
                    <input type="number" id="dias" name="qntd_dias" placeholder="Informe a quantidade de dias">

                    <label for="motivo">Motivo:</label>
                    <textarea id="motivo" name="motivo" placeholder="Informe o motivo"></textarea>
                    <div class="btns">
                        <button class="close-btn" onclick="closeModal()">&times;</button>
                        <button class="btnOK" type="submit">Alterar</button>
                    </div>
                </form>
            </div>

        </div>
        >
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

            // Oculta o botão "Alterar Túnel"
            document.querySelector('.btnOpenModal').style.display = 'none';

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

            // Defina a data atual no campo de entrada de data no modal
            dataInputModal.value = dataAtual.toISOString().slice(0, 10);

            // Defina o campo de entrada de data como somente leitura
            dataInputModal.setAttribute('readonly', 'true');
        }



        function closeModal() {
            const modal = document.querySelector('.modal-container');
            modal.classList.remove('active');
            document.querySelector('.overlay').classList.remove('active');

            // Exibe o botão "Alterar Túnel" ao fechar o pop-up
            document.querySelector('.btnOpenModal').style.display = 'block';
        }

        // Adiciona um evento de carga à página
        window.addEventListener('load', function() {
            // Verifica se há uma mensagem de sucesso
            var successMessage = "{{ session('success') }}";

            // Exibe um alerta se houver uma mensagem de sucesso
            if (successMessage) {
                showNotification('success', successMessage);
            }
        });

        // Função para exibir notificações simples
        function showNotification(type, message) {
            var notificationDiv = document.createElement('div');
            notificationDiv.classList.add('notification', type);

            var messageDiv = document.createElement('div');
            messageDiv.innerHTML = message;

            notificationDiv.appendChild(messageDiv);

            // Adiciona a notificação ao corpo do documento
            document.body.appendChild(notificationDiv);

            // Exibe a notificação
            notificationDiv.style.display = 'block';

            // Remove a notificação após alguns segundos
            setTimeout(function() {
                document.body.removeChild(notificationDiv);
            }, 5000); // Ajuste conforme necessário
        }

        // Função para validar o formulário
        function validateForm() {
            // Obtenha os valores dos campos
            var nome = document.getElementById('nome').value;
            var data = document.getElementById('dataModal').value;
            var qntd_dias = document.getElementById('dias').value;
            var motivo = document.getElementById('motivo').value;

            // Verifique se os campos obrigatórios estão preenchidos
            if (nome === '' || data === '' || qntd_dias === '' || motivo === '') {
                // Exiba uma mensagem de erro apenas se o formulário estiver sendo enviado
                if (event.submitter.type === "submit") {
                    showNotification('error', 'Por favor, preencha todos os campos obrigatórios.');
                }
                return false; // Impede o envio do formulário
            }

            // Verifique se qntd_dias não é maior que 30
            if (parseInt(qntd_dias) > 30) {
                showNotification('error', 'A quantidade de dias não pode ser maior que 30.');
                return false; // Impede o envio do formulário
            }

            // Continue com o envio do formulário se a validação passar
            return true;
        }


        // Função para adicionar classe à célula com base no valor de QNTD_DIAS
        function colorizeCells(tableSelector) {
            var table = document.querySelector(tableSelector); // Seleciona a tabela

            // Seleciona todas as linhas, exceto a primeira (cabeçalho)
            var rows = table.querySelectorAll('tr:not(:first-child)');

            rows.forEach(function(row) {
                // Obtém o valor da célula QNTD_DIAS da linha
                var qntdDias = parseInt(row.querySelector('td:nth-child(3)').textContent);

                // Adiciona a classe com base no valor de QNTD_DIAS
                if (qntdDias <= 7) {
                    row.querySelectorAll('td').forEach(function(cell) {
                        cell.classList.add('green-cell');
                    });
                } else {
                    row.querySelectorAll('td').forEach(function(cell) {
                        cell.classList.add('red-cell');
                    });
                }
            });
        }

        // Adiciona a função colorizeCells ao evento de carga da página para ambas as tabelas
        window.addEventListener('load', function() {
            colorizeCells('.table-container table');
            colorizeCells('.table-container2 table');
        });
    </script>
</body>

</html>
