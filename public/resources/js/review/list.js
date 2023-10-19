$(document).ready(function() {

    const btnAction = (id) => {
        let html = "<div class='slds-dropdown-trigger slds-dropdown-trigger_click'>" +
                    "<button class='slds-button slds-button_icon slds-button_icon-border-filled' onclick='toggleMenu(this)'>" +
                    "<svg class='slds-button__icon' aria-hidden='true'>" +
                    "<use xlink:href='/resources/assets/icons/symbols.svg#down'></use>" +
                    "</svg>" +
                    "<span class='slds-assistive-text'>Show More</span>" +
                    "</button>" +
                    "<div class='slds-dropdown slds-dropdown_left'>" +
                    "<ul class='slds-dropdown__list' role='menu' aria-label='Show More'>" +
                    "<li class='slds-dropdown__item' role='presentation'>" +
                    "<a href='/review/" + id + "' role='menuitem' tabindex='0'>" +
                    "<span class='slds-truncate'>Visualiser</span>" +
                    "</a>" +
                    "</li>" +
                    "<li class='slds-dropdown__item' role='presentation'>" +
                    "<a href='/review/" + id + "/delete' role='menuitem' tabindex='-1'>" +
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

    $("#review-datatable").DataTable({
        language: {
            url: "/resources/libs/datatables/French.json"
        },
        data: data,
        responsive: true,
        columns: [
            { title: "Voyage", data: "ID_VOYAGE", render: function(data, type, row) {
                return data + " - " + row["NOM_VOYAGE"]; 
            }},
            { title: "N°Reservation", data: "ID_RESERVATION" },
            { title: "Date Avis", data: "DATE_AVIS" },
            { title: "Client", data: "ID_CLIENT", render: function(data, type, row) {
                return data + " - " + row["NOM_CLIENT"] + row["PRENOM_CLIENT"] ; 
            }},
            { title: "Action", data: "ID_MODELEVOYAGE", render: function(data, type, row) {
                return btnAction(data);
            }},
        ]
    });

});