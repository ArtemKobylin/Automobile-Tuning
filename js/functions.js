/********************* FUNCTIONS **********************/
const getUrlVars = function() {
    /*This function returns an object of URL parameters*/
    const vars = []
    let hash;
    const hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(let i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

const itemSelector = $('#item_selector')
const createItemsList = function(response) {
    /*On-success-functions for ajax request.
    * dev-version which checks first, whether the AJAX response
    * has an error or test option. If so, it is logged in a console.
    * Otherwise the content of the selector of the Selection Section is erased
    * and then filled with options of response data.*/
    if (response.error) {
        alert(response.error);
    } else {
        itemSelector.html('')
        $.each(response, function(key, value) {
            itemSelector.append($("<option></option>")
                .attr("value", key)
                .text(value))
        })
        itemSelector.change()
    }
}

const displaySpecs = function(response) {
    /*On-success-functions for ajax request.
    * dev-version which checks first, whether the AJAX response
    * has an error or test option. If so, it is logged in a console.
    * Otherwise the content of the Specs Section filled with
    * a dotted list of vehicle specs (both car and bike).
    * The list should be adapted for workshops.*/
    if (response.error) {
        alert(response.error)
    } else {
        const itemSpecs = $('#item_specs div')
        itemSpecs.html(response)
        $('#item_specs span').css({'font-weight': '600', 'font-size': '20px', 'color': '#303440'})
    }
}

const inputFieldValidator = function() {
    return $('#input_form input').filter(function () {
        return $.trim($(this).val()).length === 0
    }).length === 0
}