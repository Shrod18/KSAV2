/**
 * Fonction qui transforme une date au format ISO en date au format français
 * 
 * @param {string} date
 */
function dateToFrench(date) {
    let dateSplit = date.split("-");
    return dateSplit[2] + "/" + dateSplit[1] + "/" + dateSplit[0];
}