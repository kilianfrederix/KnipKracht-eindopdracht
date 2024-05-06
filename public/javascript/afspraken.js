const stappenUitleg = document.querySelectorAll('.stap-uitleg');
const afspraakStappen = document.querySelectorAll('.afspraak-stap');

function toonStap(stapIndex) {
    stappenUitleg.forEach((stap, index) => {
        if (index === stapIndex) {
            stap.style.display = 'block';
        } else {
            stap.style.display = 'none';
        }
    });

    afspraakStappen.forEach((stap, index) => {
        if (index === stapIndex) {
            stap.style.display = 'block';
        } else {
            stap.style.display = 'none';
        }
    });
}

window.onload = function() {
    toonStap(0);
};

let huidigeStap = 0;

function volgendeStap() {
    console.log('Volgende stap aangeroepen');
    if (huidigeStap < afspraakStappen.length - 1) {
        afspraakStappen[huidigeStap].style.display = 'none';
        stappenUitleg[huidigeStap].style.display = 'none';
        huidigeStap++;
        afspraakStappen[huidigeStap].style.display = 'block';
        stappenUitleg[huidigeStap].style.display = 'block';
    }
    updateNavigatie();
}

function vorigeStap() {
    console.log('Vorige stap aangeroepen');
    if (huidigeStap > 0) {
        afspraakStappen[huidigeStap].style.display = 'none';
        stappenUitleg[huidigeStap].style.display = 'none';
        huidigeStap--;
        afspraakStappen[huidigeStap].style.display = 'block';
        stappenUitleg[huidigeStap].style.display = 'block';
    }
    updateNavigatie();
}

function updateNavigatie() {
    const vorigeButton = document.querySelector('button[type="button"][onclick="vorigeStap()"]');
    const volgendeButton = document.querySelector('button[type="button"][onclick="volgendeStap()"]');
    const verzendenButton = document.querySelector('input[type="submit"]');

    vorigeButton.disabled = huidigeStap === 0;
    volgendeButton.disabled = huidigeStap === afspraakStappen.length - 1;
    verzendenButton.style.display = huidigeStap === afspraakStappen.length - 1 ? 'inline-block' : 'none';
}
