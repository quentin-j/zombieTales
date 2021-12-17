const list = document.querySelector('.list');
const form = document.querySelector('form');
const item = document.querySelector('.item');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    list.innerHTML += `<li>${item.value}</li>`;
    item.value = '';
});