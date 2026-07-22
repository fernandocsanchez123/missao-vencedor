<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Seu e-mail onde você deseja receber as aplicações
    $to = "fernandocsanchez@hotmail.com";
    $subject = "=?UTF-8?B?" . base64_encode("MISSÃO VENCEDOR - Nova Aplicação") . "?=";

    // 2. Resgate e higienização dos campos
    $nome      = htmlspecialchars($_POST['nome'] ?? '');
    $nasc      = htmlspecialchars($_POST['data_nascimento'] ?? '');
    $profissao = htmlspecialchars($_POST['profissao'] ?? '');
    $whatsapp  = htmlspecialchars($_POST['whatsapp'] ?? '');
    $email     = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $problema  = nl2br(htmlspecialchars($_POST['problema'] ?? ''));
    $sonhos    = nl2br(htmlspecialchars($_POST['sonhos'] ?? ''));

    // 3. Montagem da mensagem em HTML
    $message = "
    <html>
    <head>
      <title>Nova Aplicação - Missão Vencedor</title>
    </head>
    <body style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
      <div style='max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e0e0e0; border-radius: 10px;'>
        <h2 style='color: #1e293b; border-bottom: 2px solid #d97706; padding-bottom: 10px;'>Nova Aplicação Recebida</h2>
        
        <p><strong>Nome Completo:</strong> {$nome}</p>
        <p><strong>Data de Nascimento:</strong> {$nasc}</p>
        <p><strong>Profissão:</strong> {$profissao}</p>
        <p><strong>WhatsApp:</strong> <a href='https://wa.me/55" . preg_replace('/[^0-9]/', '', $whatsapp) . "' target='_blank'>{$whatsapp} (Clique para abrir)</a></p>
        <p><strong>E-mail:</strong> {$email}</p>
        
        <hr style='border: none; border-top: 1px solid #eee; margin: 20px 0;'>
        
        <p><strong>Maior Desafio/Problema:</strong><br>{$problema}</p>
        <p><strong>Maiores Sonhos e Objetivos:</strong><br>{$sonhos}</p>
      </div>
    </body>
    </html>
    ";

    // 4. Cabeçalhos compatíveis com Hostinger
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: Formulario <noreply@" . $_SERVER['HTTP_HOST'] . ">" . "\r\n";
    $headers .= "Reply-To: {$email}" . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // 5. Envio e Redirecionamento
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>
                alert('Aplicação enviada com sucesso! Em breve entraremos em contato.');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "<script>
                alert('Ocorreu um erro no servidor ao tentar enviar. Tente novamente.');
                window.location.href = 'index.html';
              </script>";
    }
} else {
    header("Location: index.html");
    exit();
}
?>
