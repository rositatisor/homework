const buttonCucumber = document.querySelector('.sodinti.agurka');
const buttonPea = document.querySelector('.sodinti.zirni');
const listPlace = document.querySelector('#list');
const errorMsg = document.querySelector('#error');

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl, {
        list: 1,
    })
        .then(function (response) {
            console.log(response.data);
            listPlace.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
})

const addNewList = () => {
    const darzoves = document.querySelectorAll('.items');
    console.log(darzoves);
    darzoves.forEach(darzoves => {
        console.log(darzoves);
        darzoves.querySelector('[type=button]').addEventListener('click', () => {
            const id = darzoves.querySelector('[name=rauti]').value;
            axios.post(apiUrl, {
                id: id,
                'rauti': 1
            })
                .then(function (response) {
                    console.log(response.data);
                    listPlace.innerHTML = response.data.list;
                    errorMsg.innerHTML = '';
                    addNewList();
                })
                .catch(function (error) {
                    console.log(error.response.data.msg);
                    errorMsg.innerHTML = error.response.data.msg;
                });
        });
    });
}

buttonCucumber.addEventListener('click', () => {
    const count = document.querySelector('#cucumber').value;
    axios.post(apiUrl, {
        'kiekis': count,
        'sodinti-agurka': 1
    })
        .then(function (response) {
            console.log(response.data);
            listPlace.innerHTML = response.data.list;
            document.querySelector('#cucumber').value = '';
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});

buttonPea.addEventListener('click', () => {
    const count = document.querySelector('#pea').value;
    axios.post(apiUrl, {
        'kiekis': count,
        'sodinti-zirni': 1
    })
        .then(function (response) {
            console.log(response.data);
            listPlace.innerHTML = response.data.list;
            document.querySelector('#pea').value = '';
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});