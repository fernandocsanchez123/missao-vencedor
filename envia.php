<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // E-mail de destino
    $to = "fernandocsanchez@hotmail.com";
    $subject = "MISSÃO VENCEDOR - Nova Aplicação";

    // Resgate dos dados enviados pelo formulário
    $nome     = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    $nasc     = filter_var($_POST['data_nascimento'], FILTER_SANITIZE_STRING);
    $profissao= filter_var($_POST['profissao'], FILTER_SANITIZE_STRING);
    $whatsapp = filter_var($_POST['whatsapp'], FILTER_SANITIZE_STRING);
    $email    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $problema = filter_var($_POST['problema'], FILTER_SANITIZE_STRING);
    $sonhos   = filter_var($_POST['sonhos'], FILTER_SANITIZE_STRING);

    // Montagem da mensagem do e-mail
    $message = "Você recebeu uma nova aplicação do Projeto Missão Vencedor:\n\n";
    $message .= "Nome Completo: " . $nome . "\n";
    $message .= "Data de Nascimento: " . $nasc . "\n";
    $message .= "Profissão: " . $profissao . "\n";
    $message .= "WhatsApp: " . $whatsapp . "\n";
    $message .= "E-mail: " . $email . "\n\n";
    $message .= "Maior Desafio: " . $problema . "\n\n";
    $message .= "Maiores Sonhos: " . $sonhos . "\n";

    // Cabeçalhos do e-mail
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Disparo nativo do e-mail pelo servidor Hostinger
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Aplicação enviada com sucesso! Em breve entraremos em contato.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Houve um erro ao enviar. Tente novamente.'); window.location.href='index.html';</script>";
    }
}
?>
