/********************* FUNCTIONS **********************/
const hideSelector = function(selector) {
    /*partial function of displayFurtherRadioButtons()*/
    if(!selector.hasClass('hidden')) {
        selector.addClass('hidden')
        const radioButton = selector.find('input[type="radio"]:checked')
        if(radioButton.length > 0) {
            radioButton[0].checked = false
        }
        const radioLabel = selector.find('label.active')
        radioLabel.removeClass('active')
    }
}

const displayFurtherRadioButtons = function(e) {
    /*This function determines whether vehicle or workshop has been selected
    * and for this reason displays corresponding selectors and hides all others.*/
    const workshopTypeSelector = $('#workshop_type_selector')
    const vehicleTypeSelector = $('#vehicle_type_selector')

    if(e.target.getAttribute("value") === "vehicle") {
        hideSelector(workshopTypeSelector)
        vehicleTypeSelector.removeClass('hidden')
    } else {
        hideSelector(vehicleTypeSelector)
        workshopTypeSelector.removeClass('hidden')
    }
}

const getTitle = function() {
    /*looking for item names (e.g. car, bike...) on the html page*/
    return {
        title: itemSelectorContainer.find('h4 span').text(),
        tableTitle: itemSelectorContainer.find('input.hidden').val()
    }
}

const displayButtons = function(title) {
    /*regulating when the buttons below specs section on the main page
    * should be showed or hidden*/
    if(title.includes('workshop')) {
        tuneItem.removeClass('hidden')
        const tuneItemSpan = tuneItem.find('span')
        tuneItemSpan.text(title.replace(' workshop',''))
    } else {
        tuneItem.addClass('hidden')
    }
    deleteItem.removeClass('hidden')
    createNewItem.removeClass('hidden')
    const createNewItemSpan = createNewItem.find('span')
    createNewItemSpan.text(title.replace('a ',''))
    //calculate button width for certain button text
    const width = 155 + parseInt(createNewItemSpan.css('width').replace('px',''))
    createNewItemButton.css('width', width)
}

const setTitles = function(title, tableTitle, word) {
    /*setting an appropriate titles on the main html page*/
    title.text('a ' + word.replace('_',' '))
    tableTitle.attr('value', word + 's')
}

/********************* EVENT HANDLING **********************/

$(document).ready(function() {
    /*setting all radios on unchecked and inactive except the vehicle-radio*/
    const useCaseDefinition = $('#use_case_definition')
    const checkedRadios = useCaseDefinition.find('input[type="radio"]:checked')
    $.each(checkedRadios, function(index, radio) {
        radio.checked = radio.value === 'vehicle';
    })
    const activeLabels = useCaseDefinition.find('label.active')
    $.each(activeLabels, function (index, label) {
        if (label.textContent.trim().toLowerCase() === 'vehicle') {
            label.classList.add('active')
        } else {
            label.classList.remove('active')
        }
    })
})

//showing corresponding radios on change-event
$('#object_type_selector input').change(displayFurtherRadioButtons)

/*create an items list in selection section*/
const itemSelectorContainer = $('#item_selector_container')
$('#vehicle_type_selector input, #workshop_type_selector input').change(function() {
    const objectType = $('#object_type_selector input:checked').val()
    const vehicleType = $('#vehicle_type_selector input:checked').val()
    const workshopType = $('#workshop_type_selector input:checked').val()
    const title = itemSelectorContainer.find('h4 span')
    const tableTitle = itemSelectorContainer.find('input.hidden')

    const data = {
        objectType: objectType ? objectType : '',
        tableTitle: tableTitle.val()
    }

    if(objectType === 'vehicle') {
        if(vehicleType === 'car') {
            setTitles(title, tableTitle, 'car')
            data.tableTitle = 'cars'
        } else if(vehicleType === 'bike') {
            setTitles(title, tableTitle, 'bike')
            data.tableTitle = 'bikes'
        }
    } else { //workshop
        if(workshopType === 'car_workshop') {
            setTitles(title, tableTitle, 'car_workshop')
            data.tableTitle = 'car_workshops'
        } else if(workshopType === 'bike_workshop') {
            setTitles(title, tableTitle, 'bike_workshop')
            data.tableTitle = 'bike_workshops'
        }
    }

    $.getJSON('../endpoints/get_items_json.php', data, createItemsList)
})

/*create a list of items`specs*/
const createNewItem = $('#create_new_item')
const createNewItemButton = createNewItem.find('button')
const deleteItem = $('#delete_item')
const tuneItem = $('#tune_item')
const tuneItemButton = tuneItem.find('button')
itemSelector.change(function(e) {
    const {title, tableTitle} = getTitle()
    const data = {
        tableTitle,
        registrationNum: e.target.value
    }
    $.getJSON('../endpoints/get_specs_json.php', data, displaySpecs)

    /*display button "Create new Item"*/
    displayButtons(title)
})

/*adapt button text for an item should be created*/
createNewItemButton.click(function() {
    const item = itemSelectorContainer.find('h4 span').text().replace('a ','')
    location.href = '../create_new_item.php?item=' + item
})

tuneItemButton.click(function() {
    const tableTitle1 = itemSelectorContainer.find('input.hidden').val()
    const tableTitle2 = tableTitle1.replace('_workshops','') + 's'
    const workshopId = itemSelector.val()
    location.href = '../tune_item.php?tableTitle1=' + tableTitle1 + '&workshopId=' + workshopId + '&tableTitle2=' + tableTitle2
})

/*delete item*/
deleteItem.click(function() {
    const {title, tableTitle} = getTitle()
    const registrationNum = itemSelector.val()
    const data = {
        tableTitle,
        registrationNum
    }
    const ans = confirm("Do you really want to delete this " + title.replace('a ','') + "?")
    if(ans) {
        $.getJSON('../endpoints/delete_item.php', data, function(response) {
            alert(response)
            itemSelector.find('option:selected').remove()
            itemSelector.change()
        })
    }
})