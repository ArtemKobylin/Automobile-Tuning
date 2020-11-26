/********************* EVENT HANDLING **********************/
const createNewItem = $('#create_new_item')
/*Display right form for specifying a new item*/
$(document).ready(function() {
    const data = {
        objectType: getUrlVars().item
    }
    $.getJSON('../endpoints/get_input_form.php', data, function(response) {
        createNewItem.append(response)
    })
})

/*Save the new item in DB via AJAX*/
$(document).ajaxComplete(function() {
    createNewItem.find('button').click(function() {
        //checking whether all fields are filled
        const fullyFilled = inputFieldValidator()
        if(!fullyFilled) {
            alert('Fill all input fields first!')
            return
        }

        const item = $('h2').text();
        const inputForm = $('#input_form')
        const data = {
            objectType: 'car',
            oem: inputForm.find('#oem').val(),
            model: inputForm.find('#model').val(),
            type: inputForm.find('#type').val().replace('_', ' '),
            color: inputForm.find('#color').val(),
            age: inputForm.find('#age').val(),
            mileage: inputForm.find('#mileage').val(),
            power: inputForm.find('#power').val(),
            mass: inputForm.find('#mass').val(),
            tire_type: inputForm.find('#tire_type').val().replace('_', ' ')
        }
        if(item.includes('bike')) {
            data.objectType = 'bike'
            data.braking_distance = inputForm.find('#braking_distance').val()
        }

        $.getJSON('../endpoints/save_item.php', data, function(response) {
            $('#input_form input').val('')
            alert(response)
        })
    })
})
