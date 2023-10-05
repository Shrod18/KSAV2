function toggleTravel(element) {
    element.classList.toggle("slds-is-open");
    let open = element.classList.contains("slds-is-open");
    element.innerHTML = element.innerHTML.replace((open ? "chevrondown" : "chevronup"), (open ? "chevronup" : "chevrondown"));
}