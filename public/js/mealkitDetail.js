const thumbsup = document.querySelector('.thumbsup');

thumbsup.addEventListener('click', function() {
    const formData = new FormData();
    formData.append('id', this.getAttribute('data-id'));
    fetch('/controller/mealkit/setThumbsup', {
        method: 'POST',
        body: formData
    })
    .then(msg => msg.json())
    .then(msg => {
        console.log(msg);
    })
})