const linkArea = document.getElementById('link-area');

const addingLink = document.getElementById('adding-link');
const btnToAddLink = document.getElementById('before-add-link');

const backToStart = () => {
    addingLink.style.position = 'absolute';
    addingLink.style.visibility = 'hidden';
    btnToAddLink.style.display = 'flex';
}


btnToAddLink.addEventListener('click', function () {
    addingLink.style.position = 'inherit';
    addingLink.style.visibility = 'visible';
    this.style.display = 'none';
});

document.getElementById('back').addEventListener('click', () => backToStart());

document.getElementById('register-link').addEventListener('click', function (e) {
    e.preventDefault();
    const linkInput =  document.getElementById('link-input');    
    if(linkInput.value != "" && linkInput.value.length != 0){
        this.parentNode.submit();
        linkInput.value = '';
    }
})
