<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns=" www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Teste DISC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

</html>

<body style=" padding: 15px;">
    <h4>Olá, {{ $respondent->name }}</h4>
    <p>
        Você foi convidado(a) a fazer uma avaliação DISC.
        Seu relatório completo será impresso na tela após você responder as 28 afirmações.
        Responda com bastante atenção!
    </p>
    <hr />

    <a href={{ $respondent->session->session_url }}> {{ $respondent->session->session_url }} </a>

</body>
