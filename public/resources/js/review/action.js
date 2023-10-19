function getTravelServices(id) {
    let result;
    $.ajax({
        url: "/api/model-travel/" + id + "/services",
        type: "POST",
        async: false,
        success: function (data) {
            result = data;
        }
    });
    return result;
}

function getTravelsByID(id) {
    let result;
    $.ajax({
        url: "/api/travels/" + id,
        type: "POST",
        async: false,
        success: function (data) {
            result = data;
        }
    });
    return result;
}

function setReviewsInputs(id) {
    if (id != "") {
        const services = getTravelServices(id);
        let inputs = "";
        services.forEach(function (service) {
            inputs += "<div class='input-review'>" +
                    "<div style='witdh: 300px;'>" +
                    "<span>" + service["LIBELLE_PRESTATION"] + "</span>" +
                    "</div>" +
                    "<div style='width: 300px'>" +
                    "<input name='input_" + service["ID_PRESTATION"] + "-review' type='range' class='slds-slider__range' value='0' min='1' max='3' step='1' style='width: 100%;'/>" +
                    "</div>" +
                    "</div>";
        });
        $("#inputs-review").html(inputs);
            
    } else {
        $("#inputs-review").html("");
    }
}

function setDateTravels(id) {
    $("#id_travel-review").prop("disabled", !(id != ""));
    if (id != "") {
        const dates = getTravelsByID(id);
        let options = "<option value=''>-- Sélectionner une date --</option>";
        for (let i = 0; i < dates.length; i++) {
            options += "<option value='" + dates[i]["IDVOYAGE"] + "'>" + dates[i]["DATEDEPART"] + "</option>";
        }
        $("#id_travel-review").html(options);
    } else {
        $("#id_travel-review").html("");
    }
}