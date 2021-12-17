
const list = document.querySelector('.list');
const form = document.querySelector('form');
const spanTitle = document.querySelector('.spanTitle');
const item = document.querySelector('.item');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    list.innerHTML += `<li><span class="titleForm">${spanTitle.value}</span> ${item.value}</li>`;
    spanTitle.value = '';
    item.value = '';
});