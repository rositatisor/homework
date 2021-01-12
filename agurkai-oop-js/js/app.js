const buttonCucumber = document.querySelector('.sodinti.agurka');
const placeCucumber = document.querySelector('#atsakymasA');

buttonCucumber.addEventListener('click', () => {
    const info = document.querySelector('#cucumber').value;

    axios.post(apiUrl, {
        input: info,
        kitkas: 'Zuikio ausys'
    })
        .then(function (response) {
            // console.log(response.data.ans);
            placeCucumber.innerHTML = response.data.ans;
        })
        .catch(function (error) {
            console.log(error);
        });
});

const buttonPea = document.querySelector('.sodinti.zirni');
const placePea = document.querySelector('#atsakymasZ');

buttonPea.addEventListener('click', () => {
    const info = document.querySelector('#pea').value;

    axios.post(apiUrl, {
        input: info,
        kitkas: 'Zuikio ausys'
    })
        .then(function (response) {
            // console.log(response.data.ans);
            placePea.innerHTML = response.data.ans;
        })
        .catch(function (error) {
            console.log(error);
        });
});