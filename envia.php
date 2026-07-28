<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Seu e-mail de destino
    $to = "feauxilia2026@gmail.com";
    $subject = "=?UTF-8?B?" . base64_encode("ANAMNESE CLIENTE - Nova Resposta Recebida") . "?=";

    // 2. Resgate dos campos
    // Seção 1
    $nome              = htmlspecialchars($_POST['nome'] ?? 'Não informado');
    $idade             = htmlspecialchars($_POST['idade'] ?? 'Não informado');
    $estado_civil      = htmlspecialchars($_POST['estado_civil'] ?? 'Não informado');
    $email             = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $whatsapp          = htmlspecialchars($_POST['whatsapp'] ?? 'Não informado');
    $nacionalidade     = htmlspecialchars($_POST['nacionalidade'] ?? 'Não informado');
    $segunda_cidadania = htmlspecialchars($_POST['segunda_cidadania'] ?? 'Não informado');
    $formacao          = htmlspecialchars($_POST['formacao'] ?? 'Não informado');
    $profissao         = htmlspecialchars($_POST['profissao'] ?? 'Não informado');
    $filhos            = htmlspecialchars($_POST['filhos'] ?? 'Não informado');

    // Seção 2
    $estacao_ano            = htmlspecialchars($_POST['estacao_ano'] ?? 'Não informado');
    $comida_preferencia     = htmlspecialchars($_POST['comida_preferencia'] ?? 'Não informado');
    $esporte                = htmlspecialchars($_POST['esporte'] ?? 'Não informado');
    $viagens_internacionais = htmlspecialchars($_POST['viagens_internacionais'] ?? 'Não informado');

    // Seção 3
    $conhecimento_financeiro = htmlspecialchars($_POST['conhecimento_financeiro'] ?? 'Não informado');
    $tem_assessor           = htmlspecialchars($_POST['tem_assessor'] ?? 'Não informado');
    $tem_advogado           = htmlspecialchars($_POST['tem_advogado'] ?? 'Não informado');
    $seguros_contratados    = htmlspecialchars($_POST['seguros_contratados'] ?? 'Não informado');

    // Seção 4
    $curto_prazo = nl2br(htmlspecialchars($_POST['curto_prazo'] ?? 'Não informado'));
    $medio_prazo = nl2br(htmlspecialchars($_POST['medio_prazo'] ?? 'Não informado'));
    $longo_prazo = nl2br(htmlspecialchars($_POST['longo_prazo'] ?? 'Não informado'));

    // Seção 5
    $teste_personalidade = htmlspecialchars($_POST['teste_personalidade'] ?? 'Não respondeu');

    // 3. Montagem do E-mail em HTML
    $message = "
    <html>
    <head>
      <title>Ficha de Anamnese do Cliente</title>
    </head>
    <body style='font-family: Arial, sans-serif; color: #333; line-height: 1.6; background-color: #f4f6f8; padding: 20px;'>
      <div style='max-width: 650px; margin: 0 auto; background: #ffffff; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0;'>
        
        <h2 style='color: #0f172a; border-bottom: 3px solid #d97706; padding-bottom: 10px; margin-top: 0;'>📋 Ficha de Anamnese do Cliente</h2>
        
        <h3 style='color: #d97706; margin-top: 20px;'>1. Dados de Contato e Perfil Geral</h3>
        <p><strong>Nome completo:</strong> {$nome}</p>
        <p><strong>Idade:</strong> {$idade}</p>
        <p><strong>Estado Civil:</strong> {$estado_civil}</p>
        <p><strong>E-mail:</strong> {$email}</p>
        <p><strong>WhatsApp:</strong> <a href='https://wa.me/55" . preg_replace('/[^0-9]/', '', $whatsapp) . "' target='_blank'>{$whatsapp} (Abrir Conversa)</a></p>
        <p><strong>Nacionalidade:</strong> {$nacionalidade}</p>
        <p><strong>Segunda cidadania:</strong> {$segunda_cidadania}</p>
        <p><strong>Formação acadêmica:</strong> {$formacao}</p>
        <p><strong>Profissão / Atuação atual:</strong> {$profissao}</p>
        <p><strong>Tem filhos?</strong> {$filhos}</p>

        <hr style='border: none; border-top: 1px solid #e2e8f0; margin: 20px 0;'>

        <h3 style='color: #d97706;'>2. Hábitos, Estilo de Vida & Preferências</h3>
        <p><strong>Estação do ano preferida:</strong> {$estacao_ano}</p>
        <p><strong>Comida quente ou fria:</strong> {$comida_preferencia}</p>
        <p><strong>Esporte preferido:</strong> {$esporte}</p>
        <p><strong>Viagens internacionais marcantes:</strong> {$viagens_internacionais}</p>

        <hr style='border: none; border-top: 1px solid #e2e8f0; margin: 20px 0;'>

        <h3 style='color: #d97706;'>3. Mapeamento de Rede e Proteção Financeira</h3>
        <p><strong>Produtos financeiros conhecidos:</strong> {$conhecimento_financeiro}</p>
        <p><strong>Possui Assessor/Consultor:</strong> {$tem_assessor}</p>
        <p><strong>Possui Advogado(a) de confiança:</strong> {$tem_advogado}</p>
        <p><strong>Seguros contratados recentemente:</strong> {$seguros_contratados}</p>

        <hr style='border: none; border-top: 1px solid #e2e8f0; margin: 20px 0;'>

        <h3 style='color: #d97706;'>4. Visão de Futuro</h3>
        <p><strong>Projetos de CURTO prazo (1-2 anos):</strong><br>{$curto_prazo}</p>
        <p><strong>Projetos de MÉDIO prazo (2-5 anos):</strong><br>{$medio_prazo}</p>
        <p><strong>Projetos de LONGO prazo (+5 anos):</strong><br>{$longo_prazo}</p>

        <hr style='border: none; border-top: 1px solid #e2e8f0; margin: 20px 0;'>

        <h3 style='color: #d97706;'>5. 🧩 Desafio Lógico & Teste de Personalidade</h3>
        <p><strong>Perfil Selecionado no Cenário da Ponte:</strong><br><span style='background-color: #fef3c7; padding: 4px 8px; border-radius: 4px; font-weight: bold; color: #92400e;'>{$teste_personalidade}</span></p>

      </div>
    </body>
    </html>
    ";

    // 4. Cabeçalhos
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: Anamnese <noreply@" . $_SERVER['HTTP_HOST'] . ">" . "\r\n";
    if (!empty($email)) {
        $headers .= "Reply-To: {$email}" . "\r\n";
    }
    $headers .= "X-Mailer: PHP/" . phpversion();

    // 5. Envio
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>
                alert('Ficha de Anamnese enviada com sucesso! Obrigado pelas respostas.');
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
