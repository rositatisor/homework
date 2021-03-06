const buttonGrow = document.querySelector('.auginti');
const listPlace = document.querySelector('#list');
const errorMsg = document.querySelector('#error');

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl, {
        list: 1,
    })
        .then(function (response) {
            console.log(response);
            console.log(response.data);
            listPlace.innerHTML = response.data.list;
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
})

buttonGrow.addEventListener('click', () => {
    axios.post(apiUrl, {
        'auginti': 1
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