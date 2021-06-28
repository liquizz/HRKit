$(document).ready(function() {
    loadDataOnReady();
    loadDataOnClick();
    
    finishWizard(function() {
        //ON FINISH EVENT
    });
});


function finishWizard(onFinish) {
    var wizardContent = $('.wizard-content');
    var wizardButtons = $('.wizard-menu .list-group-item');
    var currForm = $('.wizard-content form');

    //Use document.body for dynamically loaded content listening
    $(document.body).on('click', '.wizard-fin', function(event) {
        var finButton = $(this);
        event.preventDefault();
        var currStep = parseInt($(this).attr('data-current-step'));
        //Get previous elements
        var nextStep = $('.step-' + (currStep + 1));
        var nextMenu = $('.step-' + (currStep + 1) + '-menu');
        var thisMenu = $('.step-' + currStep + '-menu');
        var thisStep = $('.step-' + currStep);

        //Update menu
        wizardButtons.removeClass('active');
        

    });
}




function loadDataOnReady()
{
    var wizardContent = $('.wizard-content');
    
    //Get "data-for" attribute and find element
    var dataFor = $('.wizard-menu .list-group-item.active').attr('data-for');
    var elementFor = $(dataFor);

    var dataLoad = elementFor.attr('data-load');

//        Check if attribute does exist
//        If true then load ajax, else load from div
    if (typeof dataLoad !== 'undefined' && dataLoad !== false)
    {
        //Load content ajax
        wizardContent.load(dataLoad);
    }
    else
    {
        wizardContent.html(elementFor.html());
    }
}

function loadDataOnClick()
{
    var wizardButtons = $('.wizard-menu .list-group-item');
    var wizardContent = $('.wizard-content');
    
    wizardButtons.on('click', function(event) {
        event.preventDefault();
        //Change active state
        wizardButtons.removeClass('active');
        $(this).addClass('active');


        //Get "data-for" attribute and find element
        var dataFor = $(this).attr('data-for');
        var elementFor = $(dataFor);

        var dataLoad = elementFor.attr('data-load');

//        Check if attribute does exist
//        If true then load ajax, else load from div
        if (typeof dataLoad !== 'undefined' && dataLoad !== false)
        {
            //Load content ajax
            wizardContent.load(dataLoad);
            
        }
        else
        {
            wizardContent.html(elementFor.html());
            $('.back-c').hide();
        }
    });
}