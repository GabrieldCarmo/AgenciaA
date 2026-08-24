<?php
    include "conexao.php";
    
    $consultaSQL = "SELECT id, titulo, descricao, salario  FROM tbl_vagas";

    // EXECUTANDO A CONSULTA 

    $ExecConsulta = $cn -> query($consultaSQL);

    // Criando um array de vagas
    $vagas = $ExecConsulta -> fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agência de Empregos - Conectando Talentos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <!-- 1. TOPNAV (Navegação Semântica) -->
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo">AgênciaJobs</a>
                <ul class="nav-menu">
                    <li><a href="#" class="nav-link">Início</a></li>
                    <li><a href="#vagas" class="nav-link">Vagas</a></li>
                    <!-- Futuramente o PHP do aluno vai controlar se exibe Login ou Painel aqui -->
                    <li><a href="#" class="btn-login">Entrar / Cadastrar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- 2. SEÇÃO HERO -->
    <section class="hero">
        <div class="container">
            <h1 class="hero-title">Sua próxima oportunidade profissional está aqui</h1>
            <p class="hero-subtitle">Encontre as melhores vagas de tecnologia e desenvolvimento de sistemas em um só lugar.</p>
            <div class="hero-buttons">
                <a href="#vagas" class="btn-hero btn-hero-primary">Quero uma Vaga</a>
                <a href="#" class="btn-hero btn-hero-secondary">Anunciar Vaga</a>
            </div>
        </div>
    </section>

    <!-- 3. BARRA DE FILTROS -->
    <section class="search-section">
        <div class="container">
            <!-- Os alunos usarão o method="GET" aqui para realizar a busca via PHP -->
            <form class="search-form" action="" method="GET">
                <input type="text" name="busca" class="search-input" placeholder="Digite o cargo ex: Desenvolvedor PHP, Estágio...">
                <button type="submit" class="btn-search">Buscar Vagas</button>
            </form>
        </div>
    </section>

    <!-- 4. CONTEÚDO PRINCIPAL (FEED DE VAGAS) -->
    <main class="container jobs-section" id="vagas">
        <h2 class="section-title">Vagas Disponíveis</h2>
        
        <div class="jobs-grid">
            
            <!-- [AQUI ENTRARÁ O LOOP DO PHP DOS ALUNOS (while/foreach)] -->
            
            <!-- CARD EXEMPLO 1 (MOCK) -->
            <article class="job-card">
                <div>
                    <h3 class="job-title">Desenvolvedor Back-End Junior</h3>
                    <div class="job-company">Tech Solutions Ltda</div>
                    <div class="job-details">
                        <p><strong>Localização:</strong> São Paulo - SP (Híbrido)</p>
                        <p><strong>Salário:</strong> R$ 1.000,00</p>
                    </div>
                </div>
                <!-- O link levará para a página de detalhes/candidatura passando o ID via GET -->
                <a href="vaga.php?id=1" class="btn-apply">Ver Detalhes</a>
            </article>

            <!-- CARD EXEMPLO 2 (MOCK) -->
            <article class="job-card">
                <div>
                    <h3 class="job-title">Estágio em Desenvolvimento Web</h3>
                    <div class="job-company">Inova Apps</div>
                    <div class="job-details">
                        <p><strong>Localização:</strong> Remoto</p>
                        <p><strong>Salário:</strong> R$ 1.000,00</p>
                    </div>
                </div>
                <a href="vaga.php?id=2" class="btn-apply">Ver Detalhes</a>
            </article>

            <!-- CARD EXEMPLO 3 (MOCK) -->
            <article class="job-card">
                <div>
                    <h3 class="job-title">Programador Full Stack PHP / Vue</h3>
                    <div class="job-company">Global Digital</div>
                    <div class="job-details">
                        <p><strong>Localização:</strong> Curitiba - PR (Presencial)</p>
                        <p><strong>Salário:</strong> R$ 1.000,00</p>
                    </div>
                </div>
                <a href="vaga.php?id=3" class="btn-apply">Ver Detalhes</a>
            </article>

            <!-- [FIM DO LOOP DO PHP] -->

        </div>
    </main>

    <!-- 5. RODAPÉ -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 AgênciaJobs. Desenvolvido para fins didáticos nas aulas de Desenvolvimento de Sistemas.</p>
        </div>
    </footer>

</body>
</html>