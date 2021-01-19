const buttonCucumber = document.querySelector('.sodinti.agurka');
const buttonPea = document.querySelector('.sodinti.zirni');
const listPlace = document.querySelector('#list');
const errorMsg = document.querySelector('#error');

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl + '/list', {})
        .then(function (response) {
            console.log(response);
            listPlace.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
})

const addNewList = () => {
    const darzoves = document.querySelectorAll('.items');
    darzoves.forEach(darzoves => {
        darzoves.querySelector('[type=button]').addEventListener('click', () => {
            const id = darzoves.querySelector('[name=rauti]').value;
            axios.post(apiUrl + '/remove', {
                id: id
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
    axios.post(apiUrl + '/plantCucumber', {
        'kiekis': count
    })
        .then(function (response) {
            console.log(response);
            listPlace.innerHTML = response.data.list;
            document.querySelector('#cucumber').value = '';
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
});

buttonPea.addEventListener('click', () => {
    const count = document.querySelector('#pea').value;
    axios.post(apiUrl + '/plantPea', {
        'kiekis': count
    })
        .then(function (response) {
            console.log(response);
            listPlace.innerHTML = response.data.list;
            document.querySelector('#pea').value = '';
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
});