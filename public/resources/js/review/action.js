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
        for (let i = 0; i < services.length; i++) {
            inputs += "";
        }
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