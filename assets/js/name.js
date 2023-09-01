var namesArr = [];
var appellantsArr = [];
var namesList = document.getElementById("namesList");
var appellantsList = document.getElementById("appellantsList");
var addNameBtn = document.getElementById("addNameBtn");
var addAppellantBtn = document.getElementById("addAppellantBtn");

addNameBtn.addEventListener("click", function () {
    var nameInput = document.getElementById("nameInput");
    var name = nameInput.value.trim();
    if (name) {
        namesArr.push(name);
        nameInput.value = "";
        renderNames();
    }
    if (namesArr.length > 0) {
        namesList.style.display = "block";
    } else {
        namesList.style.display = "none";
    }
});

addAppellantBtn.addEventListener("click", function () {
    var appellantInput = document.getElementById("appellantInput");
    var appellant = appellantInput.value.trim();
    if (appellant) {
        appellantsArr.push(appellant);
        appellantInput.value = "";
        renderAppellants();
    }
    if (appellantsArr.length > 0) {
        appellantsList.style.display = "block";
    } else {
        appellantsList.style.display = "none";
    }
});

function renderNames() {
    namesList.innerHTML = "";
    for (var i = 0; i < namesArr.length; i++) {
        var name = namesArr[i];
        var nameItem = document.createElement("div");
        nameItem.innerHTML = `<input type="hidden" name="names[]" value="${name}">${name} <button class="removeBtn" data-type="name" data-name="${name}"><i class="bi bi-x"></i></button>`;
        namesList.appendChild(nameItem);
    }
}

function renderAppellants() {
    appellantsList.innerHTML = "";
    for (var i = 0; i < appellantsArr.length; i++) {
        var appellant = appellantsArr[i];
        var appellantItem = document.createElement("div");
        appellantItem.innerHTML = '<input type="hidden" name="appellants[]" value="' + appellant + '">' + appellant;
        appellantsList.appendChild(appellantItem);
    }
}

function submitNames() {
    var nameInput = document.getElementById("nameInput");
    var name = nameInput.value.trim();
    if (name) {
        namesArr.push(name);
        nameInput.value = "";
    }
    var appellantInput = document.getElementById("appellantInput");
    var appellant = appellantInput.value.trim();
    if (appellant) {
        appellantsArr.push(appellant);
        appellantInput.value = "";
    }
    renderNames();
    renderAppellants();
}

$(document).on("click", ".removeBtn", function(){
    var type = $(this).data("type"); // get the type of the item to remove
    var name = $(this).data("name"); // get the name of the item to remove
    // remove the item from the array based on its type
    if(type === "name") {
        namesArr = namesArr.filter(function(item) {
            return item !== name;
        });
        renderNames(); // update the names list
    } else if(type === "appellant") {
        appellantsArr = appellantsArr.filter(function(item) {
            return item !== name;
        });
        renderAppellants(); // update the appellants list
    }
});