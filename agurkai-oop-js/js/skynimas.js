const buttonHarvest = document.querySelectorAll('.skinti');
const buttonHarvestOne = document.querySelectorAll('.skinti-visus');
const buttonHarvestAll = document.querySelector('.nuimti-viska');
const listPlace = document.querySelector('#list');
const errorMsg = document.querySelector('#error');
console.log(buttonHarvest);
console.log(buttonHarvestOne);
console.log(buttonHarvestAll);

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl, {
        list: 1,
    })
        .then(function (response) {
            listPlace.innerHTML = response.data.list;
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
})

buttonHarvestAll.addEventListener('click', () => {
    axios.post(apiUrl, {
        'nuimti-viska': 1
    })
        .then(function (response) {
            console.log(response);
            console.log(response.data);
            listPlace.innerHTML = response.data.list;
        })
        .catch(function (error) {
            console.log(error);
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});