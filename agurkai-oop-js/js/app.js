const button = document.querySelector('.sodinti.agurka');
const place = document.querySelector('#atsakymas');

button.addEventListener('click', () => {
    const info = document.querySelector('#cucumber').value;

    axios.post(apiUrl, {
        input: info,
        kitkas: 'Zuikio ausys'
    })
        .then(function (response) {
            // console.log(response.data.ans);
            place.innerHTML = response.data.ans;
        })
        .catch(function (error) {
            console.log(error);
        });

});