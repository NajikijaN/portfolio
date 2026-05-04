@php($recaptchaEnabled = config('services.recaptcha.enabled') && config('services.recaptcha.site_key'))
@php($recaptchaSiteKey = $recaptchaEnabled ? config('services.recaptcha.site_key') : null)

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kijan van Ginkel | Web Developer</title>
    <meta name="description" content="Portfolio van Kijan van Ginkel, web developer in opleiding. Bekijk projecten, skills en contactinformatie.">
    <meta name="keywords" content="web developer, portfolio, HTML, CSS, JavaScript, PHP, projecten, Kijan van Ginkel">
    <meta name="author" content="Kijan van Ginkel">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://umami.prowser.nl/script.js" data-website-id="d196a194-2f7a-4a6a-9e1a-ce8eb29a31bf"></script>
</head>
<body>
    <header>
        <div class="hero-container">
            <h1>
                Hoi, ik ben <br>
                <span class="text-gradient">Kijan van Ginkel.</span>
            </h1>
            <p>Web Developer Front-end | Back-end
                <div class="social-icons">
                    <div class="social-icon">
                        <a href="https://github.com/NajikijaN" target="_blank" rel="noreferrer">
                            <i class="fab fa-github fa-lg"></i>
                        </a>
                    </div>
                    <div class="social-icon">
                        <a href="https://www.linkedin.com/in/kijan-van-ginkel-867353226/" target="_blank" rel="noreferrer">
                            <i class="fab fa-linkedin fa-lg"></i>

                        </a>
                    </div>
                </div>
            </p>
        </div>
        <div class="ascii-container text-gradient">
            <pre>
██╗  ██╗██╗     ██╗ █████╗ ███╗   ██╗
██║ ██╔╝██║     ██║██╔══██╗████╗  ██║
█████╔╝ ██║     ██║███████║██╔██╗ ██║
██╔═██╗ ██║██   ██║██╔══██║██║╚██╗██║
██║  ██╗██║╚█████╔╝██║  ██║██║ ╚████║
╚═╝  ╚═╝╚═╝ ╚════╝ ╚═╝  ╚═╝╚═╝  ╚═══╝
            </pre>
        </div>
    </header>
    <main>
        <section>
            <div class="container">
                <h2 class="">Over <span class="text-gradient">mij.</span></h2>
                <p>Ik ben Kijan van Ginkel, 16 jaar oud en woon op de Utrechtse Heuvelrug. Ik ben een Web Developer met
                    ervaring in zowel front-end als back-end ontwikkeling, momenteel in opleiding. Buiten mijn studie
                    werk ik veel aan het verbeteren van mijn vaardigheden en het ontwikkelen van nieuwe projecten.
                    Bekijk hieronder enkele van mijn projecten:</p>
                <div class="project-container">
                    <a class="project-link active" data-project="viewsource" href="http://view-source.najikweb.com"
                        target="_blank" rel="noreferrer">
                        <div>
                            <img src="viewsource.png" alt="viewsource">
                        </div>
                    </a>
                    <a class="project-link" data-project="nude" href="https://bbdeoudenude.nl" target="_blank"
                        rel="noreferrer">
                        <div>
                            <img src="bb.png" alt="nude">
                        </div>
                    </a>
                    <a class="project-link" data-project="hollandica" href="https://hollandicabv.nl" target="_blank" rel="noreferrer">
                        <div>
                            <img src="hollandica.png" alt="hollandica">
                        </div>
                    </a>
                    <div class="project-sidebar">
                        <div class="button-container">
                            <button class="active" data-project="viewsource">ViewSource</button>
                            <button data-project="nude">B&B De Oude Nude</button>
                            <button data-project="hollandica">Hollandica B.V</button>
                        </div>
                        <p id="project-description">ViewSource is een open-source project dat ik heb ontwikkeld met
                            Laravel. Met ViewSource kunnen gebruikers gemakkelijk een URL invoeren en de broncode van
                            die pagina bekijken. Het project is ontworpen om educatief te zijn, zodat gebruikers kunnen
                            leren hoe webpagina's zijn opgebouwd en hoe ze werken. Probeer het zelf uit door een URL in
                            te voeren en de broncode te verkennen!
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <h2>Wat <span class="text-gradient">ik</span> doe.</h2>
                <p>Ik maak websites en webapplicaties, met een focus op zowel front-end als back-end ontwikkeling. Mijn
                    vaardigheden omvatten HTML, CSS, JavaScript, PHP en verschillende frameworks en tools die ik gebruik
                    om efficiënte en aantrekkelijke digitale ervaringen te creëren.</p>
                <div class="experience-container">
                    <div class="ide-wrapper">
                        <div class="ide-visual" aria-hidden="true">
                            <div class="ide-topbar">
                                <div class="ide-dots">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <span class="ide-title">ervaring.txt</span>
                            </div>
                            <div class="ide-body">
                                <div class="ide-editor">
                                    <div class="ide-line">
                                        <span class="ide-number">1</span>
                                        <div class="experience-item">
                                            <h3>Stage</h3>
                                            <span>Depositado · Web Developer (2026 - heden)</span>
                                        </div>
                                    </div>
                                    <div class="ide-line">
                                        <span class="ide-number">2</span>
                                        <div class="experience-item">
                                            <h3>Hollandica B.V</h3>
                                            <span>Webdesigner (2025 - heden)</span>
                                        </div>
                                    </div>
                                    <div class="ide-line">
                                        <span class="ide-number">3</span>
                                        <div class="experience-item">
                                            <h3>Klantproject</h3>
                                            <a href="https://bbdeoudenude.nl" target="_blank">B&B De Oude Nude <i class="fa-solid fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="ide-line">
                                        <span class="ide-number">4</span>
                                        <div class="experience-item">
                                            <h3>Kunstproject</h3>
                                            <a href="https://paulenerna.nl" target="_blank">paulenerna.nl <i class="fa-solid fa-link"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="ide-line ide-cursor-line">
                                        <span class="ide-number">5</span>
                                        <span class="typewriter"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <h2>Contact <span class="text-gradient">mij.</span></h2>
                <p>Heb je een vraag, een projectidee of zoek je een developer? Ik sta open voor nieuwe uitdagingen en
                    interessante samenwerkingen.</p>
                    @if(session('success') || session('error'))
                        <script>
                            window.toastifyMessage = @json(session('success') ?? session('error'));
                            window.toastifyType = '{{ session('success') ? 'success' : 'error' }}';
                        </script>
                    @endif
                    @if ($errors->any())
                        <div class="error-message">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="contact-container">
                    <form id="contact" method="post" action="{{ route('contact.send') }}" @if ($recaptchaSiteKey) data-recaptcha-site-key="{{ $recaptchaSiteKey }}" @endif>
                        @csrf
                        <input type="text" name="name" placeholder="Naam" value="{{ old('name') }}" required>
                        <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
                        <textarea name="message" placeholder="Bericht" required>{{ old('message') }}</textarea>
                        <input type="hidden" name="g-recaptcha-response" value="{{ old('g-recaptcha-response') }}">
                        <button type="submit">Verstuur</button>
                    </form>
                </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Kijan van Ginkel. Alle rechten voorbehouden.</p>
        </div>
    </footer>
    @if ($recaptchaSiteKey)
        <script src="https://www.google.com/recaptcha/api.js?render={{ $recaptchaSiteKey }}"></script>
    @endif
</body>
</html>
