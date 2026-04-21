<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kijan van Ginkel | Web Developer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <div class="hero-container">
            <h1>
                Hoi, ik ben <br>
                <span class="text-gradient">Kijan van Ginkel.</span>
            </h1>
            <p>Web Developer Front-end | Back-end</p>
        </div>
        {{-- <div class="w-2xl">
            <img src="hero.svg" alt="hero image" class="hero-image">
        </div>
        --}}

        <div class="w-2xl">
            <div class="ide-visual" aria-hidden="true">
                <div class="ide-topbar">
                    <div class="ide-dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="ide-body">
                    <div class="ide-editor">
                        <div class="ide-line"><span class="ide-number">1</span></div>
                        <div class="ide-line"><span class="ide-number">2</span></div>
                        <div class="ide-line"><span class="ide-number">3</span></div>
                        <div class="ide-line"><span class="ide-number">4</span></div>
                        <div class="ide-line"><span class="ide-number">5</span></div>
                        <div class="ide-line"><span class="ide-number">6</span></div>
                        <div class="ide-line"><span class="ide-number">7</span></div>
                        <div class="ide-line"><span class="ide-number">8</span></div>
                        <div class="ide-line"><span class="ide-number">9</span></div>
                        <div class="ide-line"><span class="ide-number">10</span></div>
                        <div class="ide-line"><span class="ide-number">11</span></div>
                    </div>
                </div>
            </div>
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
                        <img src="viewsource.png" alt="viewsource">
                    </a>
                    <a class="project-link" data-project="nude" href="https://bbdeoudenude.nl" target="_blank"
                        rel="noreferrer">
                        <img src="nude.png" alt="nude">
                    </a>
                    {{-- <img src="hollandica.png" alt="hollandica"> --}}
                    <div class="project-sidebar">
                        <div class="button-container">
                            <button class="active" data-project="viewsource">ViewSource</button>
                            <button data-project="nude">B&B De Oude Nude</button>
                            {{-- <button data-project="hollandica">Hollandica B.V</button> --}}
                        </div>
                        <p id="project-description">ViewSource is een open-source project dat ik heb ontwikkeld met
                            Laravel. Met ViewSource kunnen gebruikers gemakkelijk een URL invoeren en de broncode van
                            die pagina bekijken. Het project is ontworpen om educatief te zijn, zodat gebruikers kunnen
                            leren hoe webpagina's zijn opgebouwd en hoe ze werken. Probeer het zelf uit door een URL in
                            te voeren en de broncode te verkennen!</p>
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
                    <div class="experience-item">
                        <span>Stage</span>
                        <span>Depositado · Web Developer (2026 - heden)</span>
                    </div>
                    <div class="experience-item">
                        <span>Hollandica B.V</span>
                        <span>Webdesigner (2025 - heden)</span>
                    </div>
                    <div class="experience-item">
                        <span>Klantproject</span>
                        <a href="https://bbdeoudenude.nl" target="_blank">B&B De Oude Nude</a>
                    </div>
                    <div class="experience-item">
                        <span>Kunstproject</span>
                        <a href="https://paulenerna.nl" target="_blank">paulenerna.nl</a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <h2>Contact <span class="text-gradient">mij.</span></h2>
                <p>Heb je een vraag, een projectidee of zoek je een developer? Ik sta open voor nieuwe uitdagingen en
                    interessante samenwerkingen.</p>
                <div class="contact-container">
                    <form method="post">
                        @csrf
                        <input type="text" name="name" placeholder="Naam" required>
                        <input type="email" name="email" placeholder="E-mail" required>
                        <textarea name="message" placeholder="Bericht" required></textarea>
                        <button type="submit">Verstuur</button>
                    </form>
                </div>
        </section>
        <footer>
            <div class="container">
                <p>&copy; {{ date('Y') }} Kijan van Ginkel. Alle rechten voorbehouden.</p>
            </div>
        </footer>
    </main>
</body>

</html>
