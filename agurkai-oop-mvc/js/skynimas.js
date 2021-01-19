const buttonHarvestAll = document.querySelector('.nuimti-viska');
const listPlace = document.querySelector('#list');
const errorMsg = document.querySelector('#error');

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl, {
        list: 1,
    })
        .then(function (response) {
            console.log(response);
            listPlace.innerHTML = response.data.list;
            harvest();
            harvestOne();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
})

const harvestOne = () => {
    const darzoves = document.querySelectorAll('.items');
    darzoves.forEach(darzove => {
        const btn = darzove.querySelector('.skinti-visus');
        if (btn) {
            btn.addEventListener('click', () => {
                const id = darzove.querySelector('[name=skinti-visus]').value;
                axios.post(apiUrl, {
                    id: id,
                    'skinti-visus': 1
                })
                    .then(function (response) {
                        console.log(response);
                        listPlace.innerHTML = response.data.list;
                        harvest();
                        harvestOne();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}

const harvest = () => {
    const darzoves = document.querySelectorAll('.items');
    darzoves.forEach(darzove => {
        const btn = darzove.querySelector('.skinti');
        if (btn) {
            btn.addEventListener('click', () => {
                const id = darzove.querySelector('[name=skinti]').value;
                const count = darzove.querySelector('[name=kiek]').value;

                axios.post(apiUrl, {
                    id: id,
                    'kiek-skinti': count,
                    'skinti': 1
                })
                    .then(function (response) {
                        console.log(response);
                        listPlace.innerHTML = response.data.list;
                        harvest();
                        harvestOne();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}

buttonHarvestAll.addEventListener('click', () => {
    axios.post(apiUrl, {
        'nuimti-viska': 1
    })
        .then(function (response) {
            console.log(response);
            listPlace.innerHTML = response.data.list;
            harvest();
            harvestOne();
        })
        .catch(function (error) {
            console.log(error);
            errorMsg.innerHTML = error.response.data.msg;
        });
});