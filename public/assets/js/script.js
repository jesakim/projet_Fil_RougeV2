function editPatient($elem){
    $elem.classList.add('d-none')
    $elem.nextElementSibling.classList.remove('d-none')
    inputs = document.getElementsByClassName('pat-int')
    Array.from(inputs).forEach(input => {
        input.removeAttribute('disabled')

    });
}


function editServices($elem){
    console.log($elem.parentElement.previousElementSibling.children[1]);
    $elem.nextElementSibling.classList.remove('d-none')
    $elem.classList.add('d-none')
    $elem.parentElement.previousElementSibling.children[1].classList.remove('d-none')
    $elem.parentElement.previousElementSibling.children[0].classList.add('d-none')
    $elem.parentElement.previousElementSibling.previousElementSibling.children[1].classList.remove('d-none')
    $elem.parentElement.previousElementSibling.previousElementSibling.children[0].classList.add('d-none')
}

function editDrug($elem){
    $elem.classList.add('d-none');
    $elem.nextElementSibling.classList.remove('d-none');
    $elem.parentElement.previousElementSibling.classList.remove('d-none');
    $elem.parentElement.parentElement.previousElementSibling.classList.add('d-none');
}

function deleteform($id){
    form = document.getElementById('deleteform');
    form.setAttribute('action','https://projet_fil_rougev2.com/drugs/'+$id)
}

function serviceDelete($id){
    form = document.getElementById('deleteform');
    form.setAttribute('action','https://projet_fil_rougev2.com/services/'+$id)
}
