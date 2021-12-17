const list = document.querySelector('.list');
const form = document.querySelector('form');
const title = document.querySelector('.title');
const item = document.querySelector('.item');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    list.innerHTML += `<li><span class="titleForm">${title.value} </span>${item.value}</li>`;
    title.value = '';
    item.value = '';
});