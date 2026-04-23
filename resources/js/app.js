import '@fortawesome/fontawesome-free/css/all.min.css';
import 'toastify-js/src/toastify.css';
import Toastify from 'toastify-js';

if (window.toastifyMessage) {
    Toastify({
        text: window.toastifyMessage,
        duration: 3000,
        close: true,
        gravity: 'top',
        position: 'right',
        backgroundColor: window.toastifyType === 'success'
            ? 'linear-gradient(90deg, #49893D, #88C77C)'
            : 'linear-gradient(90deg, #893D3D, #C77C7C)',
        style: {
            borderRadius: '8px',
            boxShadow: '0 2px 12px rgba(0,0,0,0.12)',
            color: '#fff',
        },
        stopOnFocus: true,
    }).showToast();
}

const buttons = document.querySelectorAll('.button-container button');
const projectLinks = document.querySelectorAll('.project-link');
const descriptionElement = document.getElementById('project-description');
const contactForm = document.getElementById('contact');

const descriptions = {
    viewsource: 'ViewSource is een open-source project dat ik heb ontwikkeld met Laravel. Met ViewSource kunnen gebruikers gemakkelijk een URL invoeren en de broncode van die pagina bekijken. Het project is ontworpen om educatief te zijn, zodat gebruikers kunnen leren hoe webpagina\'s zijn opgebouwd en hoe ze werken. Probeer het zelf uit door een URL in te voeren en de broncode te verkennen!',
    nude: 'Website ontwikkeld voor Hollandica B.V. met een professionele uitstraling en een gebruiksvriendelijke interface. De website is ontworpen om klanten een kijkje te laten nemen van en in B&B De Oude Nude. Ook kunnen klanen gemakkelijk contact opnemen en reserveringen maken.',
    hollandica: ''
};

if (buttons.length > 0 && descriptionElement) {
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
}

if (contactForm) {
    const recaptchaSiteKey = contactForm.dataset.recaptchaSiteKey;
    const recaptchaResponseField = contactForm.querySelector('input[name="g-recaptcha-response"]');
    let isSubmittingWithRecaptcha = false;

    contactForm.addEventListener('submit', async event => {
        if (! recaptchaSiteKey || isSubmittingWithRecaptcha) {
            return;
        }

        if (typeof window.grecaptcha === 'undefined' || ! recaptchaResponseField) {
            return;
        }

        event.preventDefault();

        try {
            await new Promise(resolve => window.grecaptcha.ready(resolve));

            const token = await window.grecaptcha.execute(recaptchaSiteKey, {
                action: 'contact',
            });

            recaptchaResponseField.value = token;
            isSubmittingWithRecaptcha = true;
            contactForm.submit();
        } catch (error) {
            console.error('reCAPTCHA kon niet worden uitgevoerd.', error);
        }
    });
}
