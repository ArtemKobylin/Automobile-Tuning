/******************* EVENT HANDLING ********************/
$(document).ready(function() {
    //define tuning options
    const tuningOptions = $('#tuning_options')
    if(getUrlVars().tableTitle1 === 'car_workshops') {
        tuningOptions.append('<button id="turbo_charging" value="turbo_charging" data-toggle="modal" data-target="#turboChargingPopUp">Turbo Charging</button><br>')
    } else if(getUrlVars().tableTitle1 === 'bike_workshops') {
        tuningOptions.append('<button id="brake_sys" value="brake_sys" data-toggle="modal" data-target="#brakePopUp">Install new brakes</button><br>')
    }

    //data from url: car or bike?
    const data = {
        objectType: 'vehicle',
        tableTitle: getUrlVars().tableTitle2
    }

    $.getJSON('../endpoints/get_items_json.php', data, createItemsList)
})

itemSelector.change(function(e) {
    const data = {
        tableTitle: getUrlVars().tableTitle2,
        registrationNum: e.target.value
    }
    $.getJSON('../endpoints/get_specs_json.php', data, displaySpecs)
})

const changeTiresButton = $('#change_tires')
changeTiresButton.click(function() {
    const data = {
        tableTitle1: getUrlVars().tableTitle1,
        workshopId: getUrlVars().workshopId,
        tableTitle2: getUrlVars().tableTitle2,
        registrationNum: itemSelector.val(),
        option: changeTiresButton.val()
    }

    $.getJSON('../endpoints/tuning.php', data, displaySpecs)
})

const paintButton = $('#paint')
paintButton.click(function() {
    const color = prompt("Enter the color: ")
    if(!color) return
    const data = {
        tableTitle1: getUrlVars().tableTitle1,
        workshopId: getUrlVars().workshopId,
        tableTitle2: getUrlVars().tableTitle2,
        registrationNum: itemSelector.val(),
        option: paintButton.val(),
        color
    }
    $.getJSON('../endpoints/tuning.php', data, function(response) {
        displaySpecs(response)
        const selectedOption = itemSelector.find('option[value=' + data.registrationNum + ']')
        const oem = $('#oem_val span').text()
        const model = $('#model_val span').text()
        const color = $('#color_val span').text()
        selectedOption.text( oem + ' ' + model + ', ' + color)
    })
})

const turboChargingPopUp = $('#turboChargingPopUp')
turboChargingPopUp.find('button').click(function() {
    const turboCharging = turboChargingPopUp.find('#charging_selector').val()
    const data = {
        tableTitle1: getUrlVars().tableTitle1,
        workshopId: getUrlVars().workshopId,
        tableTitle2: getUrlVars().tableTitle2,
        registrationNum: itemSelector.val(),
        option: 'turbo_charging',
        turboCharging
    }

    $.getJSON('../endpoints/tuning.php', data, displaySpecs)
})

const brakePopUp = $('#brakePopUp')
brakePopUp.find('button').click(function() {
    const brake = brakePopUp.find('#brake_selector').val()
    const data = {
        tableTitle1: getUrlVars().tableTitle1,
        workshopId: getUrlVars().workshopId,
        tableTitle2: getUrlVars().tableTitle2,
        registrationNum: itemSelector.val(),
        option: 'braking_sys_installation',
        brake
    }

    $.getJSON('../endpoints/tuning.php', data, displaySpecs)
})

