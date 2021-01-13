const buttonCucumber = document.querySelector('.sodinti.agurka');
const placeCucumber = document.querySelector('#atsakymasA');
const errorMsg = document.querySelector('#error');

buttonCucumber.addEventListener('click', () => {
    const count = document.querySelector('#cucumber').value;

    axios.post(apiUrl, {
        'kiekis': count,
        'sodinti-agurka': 1
    })
        .then(function (response) {
            console.log(response);
            placeCucumber.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
        })
        .catch(function (error) {
            console.log(error.response.data);
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});

// const buttonPea = document.querySelector('.sodinti.zirni');
// const placePea = document.querySelector('#atsakymasZ');

// buttonPea.addEventListener('click', () => {
//     const info = document.querySelector('#pea').value;

//     axios.post(apiUrl, {
//         input: info,
//         kitkas: 'Zuikio ausys'
//     })
//         .then(function (response) {
//             console.log(response.data);
//             placePea.innerHTML = response.data.body;
//         })
//         .catch(function (error) {
//             console.log(error);
//         });
// });