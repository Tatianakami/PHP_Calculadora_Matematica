// Configurações globais
const CONFETTI_SETTINGS = {
    particleCount: 150,
    spread: 70,
    origin: { y: 0.6 },
    colors: ['#4a3ad6', '#6c5ce7', '#a29bfe', '#00cec9']
};

// Elementos do DOM
const form = document.querySelector('form');
const numInput = document.getElementById('num');

// Funções
function validateForm(event) {
    if (isNaN(parseInt(numInput.value))) {
        event.preventDefault();
        showError();
        return false;
    }
    return true;
}

function showError() {
    numInput.classList.add('error');
    
    const existingError = document.querySelector('.error-message');
    if (existingError) existingError.remove();
    
    const errorElement = document.createElement('div');
    errorElement.className = 'error-message';
    errorElement.innerHTML = '<i class="fas fa-exclamation-circle"></i> Por favor, digite um número válido!';
    numInput.insertAdjacentElement('afterend', errorElement);
    
    setTimeout(() => {
        numInput.classList.remove('error');
        errorElement.remove();
    }, 3000);
}

function loadSavedNumber() {
    const savedNum = localStorage.getItem('lastNumber');
    if (savedNum) numInput.value = savedNum;
}

function saveNumber() {
    localStorage.setItem('lastNumber', this.value);
}

function showConfetti() {
    if (typeof confetti === 'function') {
        confetti(CONFETTI_SETTINGS);
    }
}

// Event Listeners
document.addEventListener('DOMContentLoaded', function() {
    loadSavedNumber();
    numInput.addEventListener('input', saveNumber);
    form.addEventListener('submit', function(e) {
        if (validateForm(e)) {
            showConfetti();
        }
    });
});
