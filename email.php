<?php
// Verifica se todos os campos necessários foram recebidos
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])) {
    $subject = 'You Got Message'; // Assunto do seu e-mail
    $to = 'gustavo.norberto@adsplay.com';  // E-mail do destinatário

    // Dados do formulário
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $msg = htmlspecialchars($_POST['message']);

    // E-mail do remetente
    $email_from = $name . '<' . $email . '>';

    // Cabeçalhos do e-mail
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
    $headers .= "From: " . $name . ' <' . $email . '>' . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Corpo da mensagem
    $message = 'Name : ' . $name . "<br>";
    $message .= 'Email : ' . $email . "<br>";
    $message .= 'Phone : ' . $phone . "<br>";
    $message .= 'Message : ' . $msg;

    // Tenta enviar o e-mail
    if (@mail($to, $subject, $message, $headers)) {
        // Envia uma resposta para o front-end indicando sucesso
        echo 'sent';
    } else {
        // Envia uma resposta para o front-end indicando falha
        echo 'failed';
    }
} else {
    // Se algum campo estiver faltando, envia uma resposta para o front-end indicando erro
    echo 'missing_fields';
}
?>
