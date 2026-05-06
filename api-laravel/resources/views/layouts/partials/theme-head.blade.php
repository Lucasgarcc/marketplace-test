<title>{{ $title ?? config('app.name', 'MarketplaceTest') }}</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
    :root {
        --market-ink: #132238;
        --market-muted: #5b6b82;
        --market-surface: #f5efe6;
        --market-surface-strong: #efe6da;
        --market-card: rgba(255, 253, 250, 0.88);
        --market-border: rgba(19, 34, 56, 0.1);
        --market-brand: #ff6b35;
        --market-brand-dark: #e25829;
        --market-accent: #0ea5e9;
        --market-night: #102542;
    }

    body {
        font-family: "Manrope", sans-serif;
        color: var(--market-ink);
        background:
            radial-gradient(circle at top right, rgba(255, 107, 53, 0.18), transparent 30%),
            radial-gradient(circle at top left, rgba(14, 165, 233, 0.12), transparent 32%),
            linear-gradient(180deg, #f7f2eb 0%, var(--market-surface-strong) 100%);
        min-height: 100vh;
    }

    a {
        color: var(--market-accent);
        text-decoration: none;
    }

    a:hover {
        color: var(--market-brand-dark);
    }

    .navbar-shell {
        background: rgba(16, 37, 66, 0.92);
        backdrop-filter: blur(18px);
    }

    .brand-mark {
        width: 3rem;
        height: 3rem;
        border-radius: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--market-brand), #ffb703);
        color: #1f130d;
        font-weight: 800;
        letter-spacing: 0.08em;
        box-shadow: 0 18px 35px rgba(255, 107, 53, 0.25);
    }

    .page-shell {
        padding-top: 2rem;
        padding-bottom: 4rem;
    }

    .page-header-card,
    .market-card,
    .auth-card {
        border-radius: 1.75rem;
        border: 1px solid var(--market-border);
        box-shadow: 0 20px 45px rgba(16, 37, 66, 0.08);
    }

    .page-header-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.72));
        padding: 1.75rem 2rem;
    }

    .market-card,
    .auth-card {
        background: var(--market-card);
    }

    .market-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(140deg, #102542 0%, #173b67 60%, #0d6efd 100%);
        color: #fff;
        border: none;
    }

    .market-hero::after {
        content: "";
        position: absolute;
        width: 18rem;
        height: 18rem;
        right: -5rem;
        bottom: -8rem;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
    }

    .market-subtitle {
        display: inline-block;
        letter-spacing: 0.26em;
        text-transform: uppercase;
        font-size: 0.75rem;
        font-weight: 800;
        color: var(--market-accent);
    }

    .metric-tile {
        border-radius: 1.25rem;
        padding: 1rem 1.1rem;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.12);
    }

    .btn-brand {
        --bs-btn-color: #fff;
        --bs-btn-bg: var(--market-brand);
        --bs-btn-border-color: var(--market-brand);
        --bs-btn-hover-bg: var(--market-brand-dark);
        --bs-btn-hover-border-color: var(--market-brand-dark);
        --bs-btn-active-bg: #d54f23;
        --bs-btn-active-border-color: #d54f23;
        border-radius: 999px;
        font-weight: 700;
        padding-inline: 1.25rem;
    }

    .badge-soft {
        background: rgba(14, 165, 233, 0.12);
        color: #0f5980;
        border: 1px solid rgba(14, 165, 233, 0.15);
    }

    .badge-warm {
        background: rgba(255, 107, 53, 0.12);
        color: #9f3d1b;
        border: 1px solid rgba(255, 107, 53, 0.16);
    }

    .scope-pill {
        display: inline-flex;
        align-items: center;
        border-radius: 999px;
        padding: 0.4rem 0.75rem;
        background: rgba(255, 255, 255, 0.08);
        color: rgba(255, 255, 255, 0.92);
        font-size: 0.78rem;
    }

    .form-control,
    .form-select {
        border-radius: 1rem;
        border-color: rgba(19, 34, 56, 0.14);
        padding: 0.85rem 1rem;
        background: rgba(255, 255, 255, 0.96);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: rgba(14, 165, 233, 0.55);
        box-shadow: 0 0 0 0.2rem rgba(14, 165, 233, 0.14);
    }

    .form-check-input:checked {
        background-color: var(--market-brand);
        border-color: var(--market-brand);
    }

    .auth-layout {
        min-height: 100vh;
    }

    .auth-showcase {
        position: relative;
        overflow: hidden;
        background: linear-gradient(160deg, #102542 0%, #153e75 60%, #1f6feb 100%);
        color: #fff;
    }

    .auth-showcase::before {
        content: "";
        position: absolute;
        inset: 10% -10% auto auto;
        width: 18rem;
        height: 18rem;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.12);
    }

    .auth-showcase .feature-line {
        border-top: 1px solid rgba(255, 255, 255, 0.12);
    }

    .auth-card {
        padding: 2rem;
        background: rgba(255, 255, 255, 0.92);
    }

    .icon-tile {
        width: 3rem;
        height: 3rem;
        border-radius: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 107, 53, 0.12);
        color: var(--market-brand);
        font-size: 1.1rem;
    }

    .status-panel {
        background: linear-gradient(180deg, rgba(16, 37, 66, 0.98), rgba(21, 62, 117, 0.96));
        color: #fff;
        border: none;
    }

    .hero-stat {
        border-radius: 1.25rem;
        padding: 1rem 1.1rem;
        background: rgba(255, 255, 255, 0.78);
        border: 1px solid rgba(19, 34, 56, 0.08);
    }

    .section-link {
        color: var(--market-ink);
    }

    .section-link:hover {
        color: var(--market-brand);
    }

    @media (max-width: 991.98px) {
        .page-shell {
            padding-top: 1.25rem;
            padding-bottom: 2.5rem;
        }

        .page-header-card {
            padding: 1.25rem;
        }

        .auth-card {
            padding: 1.5rem;
        }
    }
</style>
