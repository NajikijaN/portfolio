const buttons = document.querySelectorAll('.button-container button');
const projectLinks = document.querySelectorAll('.project-link');
const descriptionElement = document.getElementById('project-description');
const descriptions = {
    viewsource: 'ViewSource is een open-source project dat ik heb ontwikkeld met Laravel. Met ViewSource kunnen gebruikers gemakkelijk een URL invoeren en de broncode van die pagina bekijken. Het project is ontworpen om educatief te zijn, zodat gebruikers kunnen leren hoe webpagina\'s zijn opgebouwd en hoe ze werken. Probeer het zelf uit door een URL in te voeren en de broncode te verkennen!',
    nude: 'Website ontwikkeld voor Hollandica B.V. met een professionele uitstraling en een gebruiksvriendelijke interface. De website is ontworpen om klanten een kijkje te laten nemen van en in B&B De Oude Nude. Ook kunnen klanen gemakkelijk contact opnemen en reserveringen maken.',
    hollandica: ''
};

buttons.forEach(button => {
    button.addEventListener('click', () => {
        buttons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const project = button.getAttribute('data-project');
        projectLinks.forEach(link => link.classList.remove('active'));

        const activeProjectLink = document.querySelector(`.project-link[data-project="${project}"]`);
        if (activeProjectLink) {
            activeProjectLink.classList.add('active');
        }

        descriptionElement.textContent = descriptions[project] || '';
    });
});
