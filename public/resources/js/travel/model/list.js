$(document).ready(function() {

    const btnAction = (id) => {
        let html = "<div class='slds-dropdown-trigger slds-dropdown-trigger_click slds-is-open'>" +
                    "<button class='slds-button slds-button_icon slds-button_icon-border-filled'>" +
                    "<svg class='slds-button__icon' aria-hidden='true'>" +
                    "<use xlink:href='/resources/assets/icons/symbols.svg#down'></use>" +
                    "</svg>" +
                    "<span class='slds-assistive-text'>Show More</span>" +
                    "</button>" +
                    "<div class='slds-dropdown slds-dropdown_left'>" +
                    "<ul class='slds-dropdown__list' role='menu' aria-label='Show More'>" +
                    "<li class='slds-dropdown__item' role='presentation'>" +
                    "<a href='#' role='menuitem' tabindex='0'>" +
                    "<span class='slds-truncate'>Modifier</span>" +
                    "</a>" +
                    "</li>" +
                    "<li class='slds-dropdown__item' role='presentation'>" +
                    "<a href='#' role='menuitem' tabindex='-1'>" +
                    "<span class='slds-truncate'>Supprimer</span>" +
                    "</a>" +
                    "</li>" +
                    "</ul>" +
                    "</div>" +
                    "</div>";
        return html;
    }

    const data = JSON.parse(document.getElementById("data").innerText);
    document.getElementById("data").remove();

    $("#travel-datatable").DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        },
        data: data,
        columns: [
            { title: "ID", data: "IDMODELEVOYAGE" },
            { title: "ID type voyage", data: "IDTYPEVOYAGE" },
            { title: "Nom", data: "NOM" },
            { title: "Description", data: "DESCRIPTION" },
            { title: "Destination", data: "DESTINATION" },
            { title: "Action", data: "IDMODELEVOYAGE", render: function(data, type, row) {
                return btnAction(data);
            }},
        ]
    });

});