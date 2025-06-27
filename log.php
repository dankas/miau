<?php
// Verifica se o parâmetro 'message' foi passado na URL
if (isset($_GET['message'])) {
    // Exibe a mensagem recebida, escapando caracteres especiais para evitar XSS
    echo htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8');
} else {
    echo "Nenhuma mensagem recebida.";
}
?>