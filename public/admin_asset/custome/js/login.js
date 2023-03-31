// strict
'use strict';
// Class definition
$(document).ready(function() {    
    let emailInput = $("#email")
    let input_group_append = $('#input_group_append')
    // if emailInput as class  is-invalid hide input_group_append
    if (emailInput.hasClass('is-invalid')) {
        input_group_append.hide()
    }                                   


});
