$(document).ready(function() {

    // Autocomplete
    var countryList = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"];
    $("#countries").autocomplete({
        source: countryList
    });

    // Accordion
    $(".accordion").accordion({ header: "h3" });

    // Tabs
    $('#tabs').tabs();

    // Dialog			
    $('#dialog').dialog({
        autoOpen: false,
        width: 400,
        buttons: {
            "Ok": function() {
                $(this).dialog("close");
            },
            "Cancel": function() {
                $(this).dialog("close");
            }
        },
        modal: true
    });

    // Dialog Link
    $('#dialog_link').button().click(function() {
        $('#dialog').dialog('open');
        return false;
    });

    // Datepicker
    $('#datepicker1').datepicker().children().show();

    // Horizontal Slider
    $('#horizSlider').slider({
        range: true,
        values: [17, 67]
    })

    // Vertical Slider				
    $("#eq > span").each(function() {
        var value = parseInt($(this).text());
        $(this).empty().slider({
            value: value,
            range: "min",
            animate: true,
            orientation: "vertical"
        });
    });

    //hover states on the static widgets
    $('#dialog_link, ul#icons li').hover(
        function() {
            $(this).addClass('ui-state-hover');
        },
        function() {
            $(this).removeClass('ui-state-hover');
        }
    );

    // Button
    $("#divButton, #linkButton, #submitButton, #inputButton").button();

    // Icon Buttons
    $("#leftIconButton").button({
        icons: {
            primary: 'ui-icon-wrench'
        }
    });

    $("#bothIconButton").button({
        icons: {
            primary: 'ui-icon-wrench',
            secondary: 'ui-icon-triangle-1-s'
        }
    });

    // Button Set
    $("#radio1").buttonset();

    // Progressbar
    $("#progressbar").progressbar({
        value: 37
    }).width(500);
    $("#animateProgress").click(function(event) {
        var randNum = Math.random() * 90;
        $("#progressbar div").animate({ width: randNum + "%" });
        event.preventDefault();
    });

    //Datatable
    $('.dataTable').dataTable({
        "sPaginationType": "full_numbers",
        "bJQueryUI": true
    });

    //Tooltips
    $("[rel=tooltips]").twipsy({
        "placement": "right",
        "offset": 5
    });

    //WYSIWYG Editor
    $(".cleditor").cleditor();

    //HTML5 Placeholder for lesser browsers. Uses jquery.placeholder.1.2.min.shrink.js
    $.Placeholder.init();


    //Uses formvalidator
    $("#add").validationEngine('attach');
	
	//Multiselect
	$(".chzn-select").chosen();
	
	//Remove duplicate option
	var seen = {};
	$('option').each(function() {
		var txt = $(this).val();
		if (seen[txt])
			$(this).remove();
		else
			seen[txt] = true;
	});

});