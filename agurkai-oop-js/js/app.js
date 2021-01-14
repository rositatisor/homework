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
            addNewListC();
            addNewListP();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
})

const addNewListC = () => {
    const darzoves = document.querySelectorAll('.items.cucumber');
    console.log(darzoves);
    darzoves.forEach(darzoves => {
        console.log(darzoves);
        darzoves.querySelector('[type=button]').addEventListener('click', () => {
            const id = darzoves.querySelector('[name=rauti-agurka]').value;
            axios.post(apiUrl, {
                id: id,
                'rauti-agurka': 1
            })
                .then(function (response) {
                    console.log(response.data);
                    listPlace.innerHTML = response.data.list;
                    errorMsg.innerHTML = '';
                    addNewListC();
                })
                .catch(function (error) {
                    console.log(error.response.data.msg);
                    errorMsg.innerHTML = error.response.data.msg;
                });
        });
    });
}

const addNewListP = () => {
    const darzoves = document.querySelectorAll('.items.pea');
    darzoves.forEach(darzoves => {
        console.log(darzoves);
        darzoves.querySelector('[type=button]').addEventListener('click', () => {
            const id = darzoves.querySelector('[name=rauti-zirni]').value;
            axios.post(apiUrl, {
                id: id,
                'rauti-zirni': 1
            })
                .then(function (response) {
                    console.log(response.data);
                    listPlace.innerHTML = response.data.list;
                    errorMsg.innerHTML = '';
                    addNewListP();
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
            errorMsg.innerHTML = '';
            addNewListC();
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
            errorMsg.innerHTML = '';
            addNewListP();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});