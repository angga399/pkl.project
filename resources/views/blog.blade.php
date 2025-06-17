<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKL Guide - Panduan Praktik Kerja Lapangan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #e2e8f0;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Glass morphism effect */
        .glass-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.5rem;
            font-weight: 700;
            color: #3b82f6;
        }

        .logo i {
            font-size: 2rem;
            color: #3b82f6;
            text-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }

        nav a {
            text-decoration: none;
            color: #e2e8f0;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s ease;
            position: relative;
        }

        nav a:hover {
            color: #3b82f6;
        }

        nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #3b82f6;
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #e2e8f0;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%233b82f6" stroke-width="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .hero-logo {
            background: linear-gradient(45deg, #1e40af, #3b82f6);
            width: 120px;
            height: 120px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.4);
            animation: float 3s ease-in-out infinite;
        }

        .hero-logo i {
            font-size: 3rem;
            color: white;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: #ffffff;
            text-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }

        .hero p {
            font-size: 1.25rem;
            color: #94a3b8;
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #1e40af, #3b82f6);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.6);
            background: linear-gradient(45deg, #1e3a8a, #2563eb);
        }

        .btn-secondary {
            background: transparent;
            color: #3b82f6;
            border: 2px solid #3b82f6;
        }

        .btn-secondary:hover {
            background: #3b82f6;
            color: white;
            transform: translateY(-2px);
        }

        /* Section Styles */
        section {
            padding: 5rem 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #ffffff;
            text-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
        }

        .section-header p {
            font-size: 1.1rem;
            color: #94a3b8;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Definition & Legal Foundation Section */
        .definition {
            background: rgba(15, 23, 42, 0.3);
        }

        .definition-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-bottom: 4rem;
        }

        .definition-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .definition-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .definition-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .definition-card h3 i {
            color: #3b82f6;
            font-size: 1.3rem;
        }

        .definition-card p {
            color: #94a3b8;
            margin-bottom: 1.5rem;
            text-align: justify;
        }

        .objectives-list {
            list-style: none;
            counter-reset: objective-counter;
        }

        .objectives-list li {
            counter-increment: objective-counter;
            position: relative;
            padding-left: 2.5rem;
            margin-bottom: 1rem;
            color: #e2e8f0;
            text-align: justify;
        }

        .objectives-list li::before {
            content: counter(objective-counter);
            position: absolute;
            left: 0;
            top: 0;
            background: linear-gradient(45deg, #1e40af, #3b82f6);
            color: white;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .legal-foundation {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .legal-foundation h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .legal-foundation h3 i {
            color: #10b981;
        }

        .legal-list {
            list-style: none;
            counter-reset: legal-counter;
        }

        .legal-list li {
            counter-increment: legal-counter;
            position: relative;
            padding-left: 2.5rem;
            margin-bottom: 1rem;
            color: #e2e8f0;
            text-align: justify;
            font-size: 0.95rem;
        }

        .legal-list li::before {
            content: counter(legal-counter);
            position: absolute;
            left: 0;
            top: 0;
            background: linear-gradient(45deg, #059669, #10b981);
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
        }

        /* Rules Section */
        .rules {
            background: rgba(15, 23, 42, 0.1);
        }

        .rules-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .rules-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .rules-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #1e40af, #3b82f6);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .rules-card:hover::before {
            transform: scaleX(1);
        }

        .rules-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .rules-card.must {
            border-top: 4px solid #10b981;
        }

        .rules-card.prohibited {
            border-top: 4px solid #ef4444;
        }

        .rules-card.sanctions {
            border-top: 4px solid #f59e0b;
        }

        .rules-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 1.5rem;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .rules-card.must .rules-icon {
            background: linear-gradient(45deg, #059669, #10b981);
        }

        .rules-card.prohibited .rules-icon {
            background: linear-gradient(45deg, #dc2626, #ef4444);
        }

        .rules-card.sanctions .rules-icon {
            background: linear-gradient(45deg, #d97706, #f59e0b);
        }

        .rules-card h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #ffffff;
            text-align: center;
        }

        .rules-list {
            list-style: none;
            counter-reset: rules-counter;
        }

        .rules-list li {
            counter-increment: rules-counter;
            position: relative;
            padding-left: 2rem;
            margin-bottom: 0.75rem;
            color: #e2e8f0;
            font-size: 0.9rem;
            text-align: justify;
        }

        .rules-card.must .rules-list li::before {
            content: counter(rules-counter);
            position: absolute;
            left: 0;
            top: 0;
            background: #10b981;
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .rules-card.prohibited .rules-list li::before {
            content: counter(rules-counter);
            position: absolute;
            left: 0;
            top: 0;
            background: #ef4444;
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .rules-card.sanctions .rules-list li::before {
            content: counter(rules-counter);
            position: absolute;
            left: 0;
            top: 0;
            background: #f59e0b;
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .warning-note {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 3rem;
            text-align: center;
        }

        .warning-note h4 {
            color: #ef4444;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .warning-note p {
            color: #e2e8f0;
            font-size: 0.95rem;
        }

        /* Procedures Section */
        .procedures {
            background: rgba(15, 23, 42, 0.3);
        }

        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #3b82f6, #1e40af);
            transform: translateX(-50%);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 3rem;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }

        .timeline-item:nth-child(odd) {
            padding-right: 50%;
            text-align: right;
        }

        .timeline-item:nth-child(even) {
            padding-left: 50%;
            text-align: left;
        }

        .timeline-item:nth-child(1) { animation-delay: 0.1s; }
        .timeline-item:nth-child(2) { animation-delay: 0.2s; }
        .timeline-item:nth-child(3) { animation-delay: 0.3s; }
        .timeline-item:nth-child(4) { animation-delay: 0.4s; }
        .timeline-item:nth-child(5) { animation-delay: 0.5s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .timeline-content {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            position: relative;
            transition: all 0.3s ease;
        }

        .timeline-content:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .timeline-number {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #1e40af, #3b82f6);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }

        .timeline-item:nth-child(odd) .timeline-number {
            right: -70px;
            left: auto;
        }

        .timeline-item:nth-child(even) .timeline-number {
            left: -70px;
        }

        .timeline-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #ffffff;
        }

        .timeline-content p {
            color: #94a3b8;
            margin-bottom: 1rem;
        }

        .timeline-features {
            list-style: none;
        }

        .timeline-features li {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 0.5rem;
            color: #e2e8f0;
        }

        .timeline-features i {
            color: #10b981;
            font-size: 0.9rem;
        }

        /* Majors Section */
        .majors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .major-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .major-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #1e40af, #3b82f6);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .major-card:hover::before {
            transform: scaleX(1);
        }

        .major-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .major-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .major-card:hover .major-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .major-card h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #ffffff;
        }

        .major-acronym {
            background: rgba(59, 130, 246, 0.2);
            color: #3b82f6;
            padding: 0.25rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .major-card p {
            color: #94a3b8;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        .skills-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            justify-content: center;
        }

        .skill-tag {
            background: rgba(30, 41, 59, 0.8);
            color: #e2e8f0;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Contact Section */
        .contact {
            background: rgba(15, 23, 42, 0.5);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .contact-item {
            text-align: center;
            padding: 2rem;
            border-radius: 16px;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .contact-item:hover {
            background: rgba(30, 58, 138, 0.3);
            transform: translateY(-5px);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .contact-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #1e40af, #3b82f6);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }

        .contact-item h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #ffffff;
        }

        .contact-item p {
            color: #94a3b8;
        }

        /* Footer */
        footer {
            background: rgba(15, 23, 42, 0.9);
            color: #e2e8f0;
            text-align: center;
            padding: 2rem 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .definition-content {
                grid-template-columns: 1fr;
            }

            .rules-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
            }

            nav ul {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: rgba(15, 23, 42, 0.98);
                flex-direction: column;
                padding: 2rem;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            nav ul.show {
                display: flex;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .timeline::before {
                left: 20px;
            }

            .timeline-item {
                padding-left: 60px !important;
                padding-right: 0 !important;
                text-align: left !important;
            }

            .timeline-number {
                left: 0 !important;
                right: auto !important;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .definition-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .rules-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Scroll animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Text glow effect */
        .text-glow {
            text-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
        }

        /* Card hover effect */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-code text-white"></i>
                    <span>Pkl Project</span>
                </div>
                <nav>
                    <ul>
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#definition">Pengertian</a></li>
                        <li><a href="#rules">Tata Tertib</a></li>
                        {{-- <li><a href="#procedures">Tata Cara</a></li> --}}
                        <li><a href="#majors">Jurusan</a></li>
                        <li><a href="#contact">Kontak</a></li>
                    </ul>
                </nav>
                <div class="mobile-menu">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-logo">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h1 class="text-glow">Panduan Lengkap PKL</h1>
                <p>Temukan semua informasi yang Anda butuhkan tentang tata cara Praktik Kerja Lapangan, mulai dari persiapan hingga pelaporan untuk semua jurusan.</p>
                <div class="cta-buttons">
                    <a href="#definition" class="btn btn-primary">
                        <i class="fas fa-book"></i>
                        Pelajari PKL
                    </a>
                    <a href="#majors" class="btn btn-secondary">
                        <i class="fas fa-eye"></i>
                        Lihat Jurusan
                    </a>
                     <a href="{{ route('awal') }}" class="btn btn-primary" style="background: linear-gradient(45deg, #1e40af, #3b82f6);">
                    <i class="fas fa-user-circle"></i>
                    Absen
                </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Definition & Legal Foundation Section -->
    <section id="definition" class="definition">
        <div class="container">
            <div class="section-header fade-in">
                <h2>Pengertian & Landasan Hukum PKL</h2>
                <p>Memahami dasar-dasar Praktik Kerja Lapangan dan aspek legalitasnya</p>
            </div>
            
            <div class="definition-content">
                <div class="definition-card fade-in card-hover">
                    <h3><i class="fas fa-lightbulb"></i>Pengertian PKL</h3>
                    <p>Praktik Kerja Lapangan (PKL) merupakan suatu bentuk penyelenggaraan pendidikan keahlian profesional yang memadukan secara sistematis dan sinkron antara program pendidikan di sekolah dan program penguasaan keahlian yang diperoleh melalui kegiatan Praktik Kerja Lapangan di dunia usaha dan industri.</p>
                    
                    <h4 style="color: #3b82f6; font-size: 1.2rem; font-weight: 600; margin: 1.5rem 0 1rem;">Tujuan PKL:</h4>
                    <ol class="objectives-list">
                        <li>Mengutamakan persiapan peserta didik untuk memasuki lapangan kerja serta pengembangan sifat profesional.</li>
                        <li>Mempersiapkan peserta didik agar mau memilih karir, mampu berkompetisi dan mampu mengembangkan diri.</li>
                        <li>Mempersiapkan tenaga kerja tingkat menengah untuk mengisi kebutuhan dunia usaha dan industri pada saat ini maupun masa yang akan datang.</li>
                        <li>Mempersiapkan tamatan agar menjadi warga negara yang produktif, adaptif, dan kreatif.</li>
                    </ol>
                </div>

                <div class="definition-card fade-in card-hover">
                    <h3><i class="fas fa-balance-scale"></i>Aspek Non-Teknis</h3>
                    <p>Selain aspek teknis, PKL juga mengembangkan kemampuan non-teknis yang penting untuk dunia kerja:</p>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-top: 1.5rem;">
                        <div style="background: rgba(59, 130, 246, 0.1); padding: 1rem; border-radius: 12px; border: 1px solid rgba(59, 130, 246, 0.3);">
                            <h5 style="color: #3b82f6; font-weight: 600; margin-bottom: 0.5rem;">Kerja Sama</h5>
                            <p style="font-size: 0.9rem; color: #94a3b8;">Kemampuan bekerja dalam tim dan berkolaborasi</p>
                        </div>
                        <div style="background: rgba(16, 185, 129, 0.1); padding: 1rem; border-radius: 12px; border: 1px solid rgba(16, 185, 129, 0.3);">
                            <h5 style="color: #10b981; font-weight: 600; margin-bottom: 0.5rem;">Tanggung Jawab</h5>
                            <p style="font-size: 0.9rem; color: #94a3b8;">Kesadaran akan tugas dan kewajiban</p>
                        </div>
                        <div style="background: rgba(245, 158, 11, 0.1); padding: 1rem; border-radius: 12px; border: 1px solid rgba(245, 158, 11, 0.3); grid-column: 1 / -1;">
                            <h5 style="color: #f59e0b; font-weight: 600; margin-bottom: 0.5rem;">Kejujuran</h5>
                            <p style="font-size: 0.9rem; color: #94a3b8;">Integritas dan transparansi dalam bekerja</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="legal-foundation fade-in">
                <h3><i class="fas fa-gavel"></i>Landasan Hukum</h3>
                <ol class="legal-list">
                    <li>Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional</li>
                    <li>Peraturan Pemerintah Nomor 19 Tahun 2005 tentang Standar Nasional Pendidikan sebagaimana telah beberapa kali diubah terakhir dengan Peraturan Pemerintah Nomor 13 Tahun 2015</li>
                    <li>Peraturan Pemerintah Republik Indonesia Nomor 17 Tahun 2010 tentang Pengelolaan dan Penyelenggaraan Pendidikan sebagaimana telah diubah dengan Peraturan Pemerintah Republik Indonesia Nomor 66 Tahun 2010</li>
                    <li>Peraturan Pemerintah Republik Indonesia Nomor 41 Tahun 2015 tentang Pembangunan Sumber Daya Industri</li>
                    <li>Peraturan Presiden Nomor 8 Tahun 2012 tentang Kerangka Kualifikasi Nasional Indonesia (KKNI)</li>
                    <li>Peraturan Presiden Republik Indonesia Nomor 87 Tahun 2017 tentang Penguatan Pendidikan Karakter</li>
                    <li>Instruksi Presiden Nomor 9 Tahun 2016 tentang Revitalisasi Sekolah Menengah Kejuruan dalam Rangka Peningkatan Kualitas dan Daya Saing Sumber Daya Manusia Indonesia</li>
                    <li>Peraturan Menteri Perindustrian Nomor 03/M-IND/PER/1/2017 tentang Pedoman Pembinaan dan Pengembangan Sekolah Menengah Kejuruan Berbasis Konsentrasi yang Link and Match dengan Industri</li>
                    <li>Peraturan Menteri Tenaga Kerja Nomor 36 tahun 2016 tentang Penyelenggaraan Pemagangan di Dalam Negeri</li>
                    <li>Peraturan Menteri Pendidikan dan Kebudayaan Nomor 60 Tahun 2014 tentang Kurikulum 2013 Sekolah Menengah Kejuruan/Madrasah Aliyah Kejuruan</li>
                    <li>Keputusan Direktur Jenderal Pendidikan Dasar dan Menengah Kemendikbud Nomor 4678/D/KEP/MK/2016 tentang Spektrum Keahlian Pendidikan Menengah Kejuruan</li>
                    <li>Keputusan Direktur Jenderal Pendidikan Dasar dan Menengah Kemendikbud Nomor 130/D/KEP/KR/2017 tentang Struktur Kurikulum Pendidikan Menengah Kejuruan</li>
                    <li>Permendikbud Nomor 50 Tahun 2020 tentang Praktik Kerja Lapangan Bagi Peserta Didik</li>
                    <li>Kepmendikbudristek Nomor 262/M/2022 tentang Perubahan Atas Kepmendikbudristek Nomor 56/M/2022 tentang Pedoman Penerapan Kurikulum Dalam Rangka Pemulihan Pembelajaran (Kurikulum Merdeka)</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Rules Section -->
    <section id="rules" class="rules">
        <div class="container">
            <div class="section-header fade-in">
                <h2>Tata Tertib Pelaksanaan PKL</h2>
                <p>Peraturan yang harus dipatuhi selama pelaksanaan Praktik Kerja Lapangan</p>
            </div>

            <div class="rules-grid">
                <div class="rules-card must fade-in card-hover">
                    <div class="rules-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Kewajiban Peserta Didik</h3>
                    <ol class="rules-list">
                        <li>Mematuhi peraturan yang berlaku di tempat pelaksanaan PKL</li>
                        <li>Berada di tempat praktik 15 menit sebelum praktik dimulai, berlaku sopan santun serta jujur, bertanggung jawab, berinisiatif dan kreatif</li>
                        <li>Mengenakan pakaian seragam sekolah dan dalam keadaan tertentu memakai pakaian praktik</li>
                        <li>Memberi kabar kepada pimpinan perusahaan, pembimbing industri dan pembimbing sekolah apabila berhalangan hadir</li>
                        <li>Memberi salam pada waktu datang dan mohon diri pada waktu pulang</li>
                        <li>Melaporkan segera kepada guru pembimbing apabila menemui kesulitan-kesulitan</li>
                        <li>Mentaati peraturan dalam penggunaan alat-alat dan bahan yang dipakai</li>
                        <li>Melaporkan dengan segera kepada petugas yang berwenang apabila terjadi kerusakan</li>
                        <li>Membersihkan dan mengatur kembali peralatan dengan rapi</li>
                        <li>Menerapkan K3LH (Keselamatan, Kesehatan Kerja dan Lingkungan Hidup)</li>
                        <li>Menerapkan 5S (Senyum, Salam, Sapa, Sopan, Santun) di tempat PKL</li>
                    </ol>
                </div>

                <div class="rules-card prohibited fade-in card-hover">
                    <div class="rules-icon">
                        <i class="fas fa-ban"></i>
                    </div>
                    <h3>Larangan Peserta Didik</h3>
                    <ol class="rules-list">
                        <li>Merokok di tempat pelaksanaan PKL</li>
                        <li>Menerima tamu pribadi pada saat melaksanaan PKL</li>
                        <li>Menggunakan pesawat telepon perusahaan PKL</li>
                        <li>Pindah tempat kegiatan praktik, kecuali saat diperintah yang berwenang</li>
                        <li>Khusus untuk putri: memakai rok mini, sepatu bertumit tinggi, perhiasan mencolok</li>
                        <li>Memakai tata rias muka yang kurang sesuai dengan situasi dan kondisi</li>
                        <li>Memakai pakaian/seragam di luar seragam sekolah kecuali permintaan perusahaan dengan ketentuan sesuai aturan</li>
                    </ol>
                </div>

                <div class="rules-card sanctions fade-in card-hover">
                    <div class="rules-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3>Sanksi Pelanggaran</h3>
                    <ol class="rules-list">
                        <li>Peringatan secara lisan</li>
                        <li>Peringatan secara tertulis</li>
                        <li>Pengurangan nilai praktik PKL</li>
                        <li>Tinggal kelas</li>
                        <li>Tidak lulus</li>
                        <li>Dikeluarkan dari tempat PKL/sekolah</li>
                    </ol>
                </div>
            </div>

            <div class="warning-note fade-in">
                <h4><i class="fas fa-warning"></i>Catatan Penting</h4>
                <p>Pelanggaran yang Anda lakukan akan merugikan diri anda sendiri serta teman-teman yang akan melaksanakan Praktik Kerja Lapangan di tempat praktik Anda pada waktu mendatang. Oleh karena itu, berhati-hatilah dalam bertindak dan selalu menjaga tata tertib.</p>
            </div>
        </div>
    </section>

    {{-- <!-- Procedures Section -->
    <section id="procedures" class="procedures">
        <div class="container">
            <div class="section-header fade-in">
                <h2>Tata Cara PKL</h2>
                <p>Panduan langkah demi langkah untuk melaksanakan PKL dengan sukses</p>
            </div>
            
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-content glass-card card-hover">
                        <div class="timeline-number">1</div>
                        <h3>Persiapan Dokumen</h3>
                        <p>Siapkan semua dokumen yang diperlukan untuk pengajuan PKL</p>
                        <ul class="timeline-features">
                            <li><i class="fas fa-check"></i>Surat pengantar dari sekolah</li>
                            <li><i class="fas fa-check"></i>Curriculum Vitae (CV)</li>
                            <li><i class="fas fa-check"></i>Pas foto terbaru</li>
                            <li><i class="fas fa-check"></i>Fotocopy KTP/KK</li>
                        </ul>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content glass-card card-hover">
                        <div class="timeline-number">2</div>
                        <h3>Mencari Tempat PKL</h3>
                        <p>Tentukan tempat PKL yang sesuai dengan jurusan dan minat Anda</p>
                        <ul class="timeline-features">
                            <li><i class="fas fa-check"></i>Riset perusahaan/instansi yang relevan</li>
                            <li><i class="fas fa-check"></i>Hubungi bagian HRD</li>
                            <li><i class="fas fa-check"></i>Ajukan permohonan secara formal</li>
                            <li><i class="fas fa-check"></i>Konfirmasi ketersediaan tempat</li>
                        </ul>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content glass-card card-hover">
                        <div class="timeline-number">3</div>
                        <h3>Perencanaan Jadwal</h3>
                        <p>Atur jadwal PKL yang tidak bertabrakan dengan kegiatan sekolah</p>
                        <ul class="timeline-features">
                            <li><i class="fas fa-check"></i>Koordinasi dengan pihak sekolah</li>
                            <li><i class="fas fa-check"></i>Tentukan tanggal mulai dan selesai</li>
                            <li><i class="fas fa-check"></i>Atur jadwal supervisi guru</li>
                            <li><i class="fas fa-check"></i>Siapkan transportasi</li>
                        </ul>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content glass-card card-hover">
                        <div class="timeline-number">4</div>
                        <h3>Pelaksanaan PKL</h3>
                        <p>Laksanakan PKL dengan disiplin dan catat semua kegiatan</p>
                        <ul class="timeline-features">
                            <li><i class="fas fa-check"></i>Hadir tepat waktu setiap hari</li>
                            <li><i class="fas fa-check"></i>Ikuti arahan pembimbing</li>
                            <li><i class="fas fa-check"></i>Catat kegiatan dalam jurnal</li>
                            <li><i class="fas fa-check"></i>Aktif bertanya dan belajar</li>
                        </ul>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-content glass-card card-hover">
                        <div class="timeline-number">5</div>
                        <h3>Evaluasi & Pelaporan</h3>
                        <p>Buat laporan PKL dan presentasikan hasil yang dicapai</p>
                        <ul class="timeline-features">
                            <li><i class="fas fa-check"></i>Susun laporan PKL sesuai format</li>
                            <li><i class="fas fa-check"></i>Minta penilaian pembimbing</li>
                            <li><i class="fas fa-check"></i>Siapkan presentasi hasil</li>
                            <li><i class="fas fa-check"></i>Kumpulkan sertifikat PKL</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Majors Section -->
   <!-- Majors Section -->
<section id="majors">
    <div class="container">
        <div class="section-header fade-in">
            <h2>Jurusan yang Tersedia</h2>
        </div>

        <div class="majors-grid">
            <div class="major-card fade-in card-hover">
                <div class="major-icon"  >
                    <img src="/image/an.png" alt="animasi"  style="width: 70px; height: 70px;">
                </div>
                <h3>Animasi</h3>
                <div class="major-acronym">AN</div>
                <p>Mempelajari teknik pembuatan animasi 2D dan 3D untuk berbagai media.</p>
                <div class="skills-tags">
                    <span class="skill-tag">2D Animation</span>
                    <span class="skill-tag">3D Modeling</span>
                    <span class="skill-tag">Visual Effects</span>
                </div>
            </div>

            <div class="major-card fade-in card-hover">
                <div class="major-icon">
                    <img src="/image/pg.png" alt="animasi"  style="width: 70px; height: 70px;">
                </div>
                <h3>Pemrograman Perangkat Lunak dan Gim</h3>
                <div class="major-acronym">PPLG</div>
                <p>Fokus pada pengembangan aplikasi dan sistem perangkat lunak modern.</p>
                <div class="skills-tags">
                    <span class="skill-tag">Programming</span>
                    <span class="skill-tag">Web Dev</span>
                    <span class="skill-tag">Database</span>
                </div>
            </div>

            <div class="major-card fade-in card-hover">
                <div class="major-icon">
                    <img src="/image/tk.png" alt="animasi"  style="width: 70px; height: 70px;">
                </div>
                <h3>Teknik Komputer Jaringan dan Teknologi</h3>
                <div class="major-acronym">TKJT</div>
                <p>Mempelajari instalasi, konfigurasi, dan maintenance sistem komputer serta jaringan.</p>
                <div class="skills-tags">
                    <span class="skill-tag">Networking</span>
                    <span class="skill-tag">Hardware</span>
                    <span class="skill-tag">Server</span>
                </div>
            </div>

            <div class="major-card fade-in card-hover">
                <div class="major-icon">
                    <img src="/image/aks.jpg" alt="animasi"  style="width: 70px; height: 70px;">
                </div>
                <h3>Akuntansi</h3>
                <div class="major-acronym">AK</div>
                <p>Mempelajari pencatatan dan pelaporan keuangan perusahaan secara akurat.</p>
                <div class="skills-tags">
                    <span class="skill-tag">Bookkeeping</span>
                    <span class="skill-tag">Tax</span>
                    <span class="skill-tag">Audit</span>
                </div>
            </div>

            {{-- <div class="major-card fade-in card-hover">
                <div class="major-icon" style="background: linear-gradient(45deg, #d97706, #f59e0b);">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3>Pemasaran</h3>
                <div class="major-acronym">PMR</div>
                <p>Mempelajari strategi pemasaran dan penjualan produk/jasa secara efektif.</p>
                <div class="skills-tags">
                    <span class="skill-tag">Marketing</span>
                    <span class="skill-tag">Sales</span>
                    <span class="skill-tag">Digital</span>
                </div>
            </div> --}}

            <div class="major-card fade-in card-hover">
                <div class="major-icon">
                    <img src="/image/br.png" alt="animasi"  style="width: 70px; height: 70px;">
                </div>
                <h3>Bisnis Ritel</h3>
                <div class="major-acronym">BR</div>
                <p>Mempelajari manajemen operasional bisnis ritel modern.</p>
                <div class="skills-tags">
                    <span class="skill-tag">Retail</span>
                    <span class="skill-tag">Merchandising</span>
                    <span class="skill-tag">Customer Service</span>
                </div>
            </div>

            <div class="major-card fade-in card-hover">
                <div class="major-icon">
                    <img src="/image/dpb.png" alt="animasi"  style="width: 70px; height: 70px;">
                </div>
                <h3>Desain Produk Busana</h3>
                <div class="major-acronym">DPB</div>
                <p>Mempelajari cara menjahit dan mendesain busana.</p>
                <div class="skills-tags">
                    <span class="skill-tag">Fashion</span>
                    <span class="skill-tag">Styled</span>
                    <span class="skill-tag">Tailored</span>
                </div>
            </div>

            {{-- <div class="major-card fade-in card-hover">
                <div class="major-icon" style="background: linear-gradient(45deg, #be185d, #ec4899);">
                    <i class="fas fa-paint-brush"></i>
                </div>
                <h3>Desain</h3>
                <div class="major-acronym">DSN</div>
                <p>Mempelajari prinsip desain grafis dan komunikasi visual.</p>
                <div class="skills-tags">
                    <span class="skill-tag">Graphic Design</span>
                    <span class="skill-tag">Illustration</span>
                    <span class="skill-tag">Branding</span>
                </div>
            </div> --}}

            <div class="major-card fade-in card-hover">
                <div class="major-icon">
                    <img src="/image/lps.png" alt="animasi"  style="width: 70px; height: 70px;">
                </div>
                <h3>Layanan Perbankan Syariah</h3>
                <div class="major-acronym">LPS</div>
                <p>Mempelajari operasional dan produk perbankan berbasis syariah.</p>
                <div class="skills-tags">
                    <span class="skill-tag">Banking</span>
                    <span class="skill-tag">Finance</span>
                    <span class="skill-tag">Syariah</span>
                </div>
            </div>

            <div class="major-card fade-in card-hover">
                <div class="major-icon">
                    <img src="/image/mp.png" alt="animasi"  style="width: 70px; height: 70px;">
                </div>
                <h3>Manajemen Perkantoran</h3>
                <div class="major-acronym">MP</div>
                <p>Mengelola administrasi dan operasional perkantoran modern yang efisien.</p>
                <div class="skills-tags">
                    <span class="skill-tag">Office</span>
                    <span class="skill-tag">Digital</span>
                    <span class="skill-tag">Admin</span>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header fade-in">
                <h2>Hubungi Kami</h2>
                <p>Ingin bertanya? Jangan ragu untuk menghubungi kami</p>
            </div>

            <div class="contact-grid">
                <div class="contact-item fade-in card-hover">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>Telepon</h3>
                    <p>+6298765678</p>
                </div>

                <div class="contact-item fade-in card-hover">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email</h3>
                    <p>PklProject@gmail.com</p>
                </div>

                <div class="contact-item fade-in card-hover">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Alamat</h3>
                    <p>Jakarta, Indonesia</p>
                </div>

                <div class="contact-item fade-in card-hover">
                    <div class="contact-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Jam Aktif</h3>
                    <p>Senin - Jumat, 08:00 - 16:00</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; PKL Project</p>
        </div>
    </footer>

    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(15, 23, 42, 0.98)';
                header.style.boxShadow = '0 2px 20px rgba(59, 130, 246, 0.2)';
            } else {
                header.style.background = 'rgba(15, 23, 42, 0.95)';
                header.style.boxShadow = 'none';
            }
        });

        // Fade in animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Mobile menu toggle
        document.querySelector('.mobile-menu').addEventListener('click', function() {
            const nav = document.querySelector('nav ul');
            nav.classList.toggle('show');
        });

        // Add hover effects to cards
        document.querySelectorAll('.major-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Timeline animation trigger
        const timelineObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, { threshold: 0.2 });

        document.querySelectorAll('.timeline-item').forEach(item => {
            timelineObserver.observe(item);
        });
    </script>
</body>
</html>