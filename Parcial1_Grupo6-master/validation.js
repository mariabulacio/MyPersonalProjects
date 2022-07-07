const inputs = document.querySelectorAll("input");
const emails = document.querySelectorAll("input[type='email']");
const cards = document.querySelectorAll("img");
const games = document.querySelector("select[name='games']");
const loc = document.querySelector("select[name='location']");
const quantity = document.querySelector("#tickets");
const form = document.querySelector("form");

//START Anonymous functions {
const insertClassName = (input, className) => {
    input.classList.add(className);
};

const removeClassName = (input, className) => {
    input.classList.remove(className);
};


const elementWithSiblingNode = (input) => { //Evita duplicar mensajes de error
    const siblingNode = input.nextElementSibling;
    return siblingNode ? true : false;
};

const insertErrorMessage = (input) => {
    input.insertAdjacentHTML('afterend', `<p class="showError">${identifyInputName(input)}</p>`);
};

const validateInputText = (input) => {
    if (input.value === "") {
        insertClassName(input, "error");
        if (!elementWithSiblingNode(input))
            insertErrorMessage(input);
    } else {
        removeClassName(input, "error");
        if (elementWithSiblingNode(input))
            input.nextElementSibling.remove();
    }
};

const identifyInputName = (input) => {
    switch (input.name) {
        case "firstName":
            return "El nombre es requerido";
        case "lastName":
            return "El apellido es requerido";
        case "tickets":
            return "La cantidad de entradas es requerida";
        case "card":
            return "Debe seleccionar una tarjeta para pagar";
        case "emailConfirm":
            return "Debe confirmar el mismo e-mail";
        default:
            return `El ${input.name} es requerido`;
    }
};

const isValidEmail = (input) => {
    const emailRegex = /[A-Za-z0-9._-]+@{1}(gmail|hotmail)\.(com)/;
    return emailRegex.test(input.toLowerCase());
};

const validateEmail = (input) => {
    if (!isValidEmail(input.value)) {
        input.focus();
        alert("El email no es valido, por favor ingresa un email valido, dominio gmail o hotmail");
    }
};



const isLengthValid = (input) => {
    return input.length <= 25;
}

const ticketPrice = () => {

    const selectGame = games.options[games.selectedIndex].value;
    const selecLoc = loc.options[loc.selectedIndex].value;
    const quantityTickets = Number(quantity.value);
    let price = document.querySelector("#price");

    switch (true) {
        case (selectGame.includes("Barcelona") && selecLoc.includes("Popular")):
            return price.value = quantityTickets * 200;
        case (selectGame.includes("Real") && selecLoc.includes("Popular")):
            return price.value = quantityTickets * 150;
        case (selectGame.includes("Coruna") && selecLoc.includes("Popular")):
            return price.value = quantityTickets * 170;
        case (selectGame.includes("Barcelona") && selecLoc.includes("Platea")):
            return price.value = quantityTickets * (200 * 5);
        case (selectGame.includes("Real") && selecLoc.includes("Platea")):
            return price.value = quantityTickets * (150 * 5);
        case (selectGame.includes("Coruna") && selecLoc.includes("Platea")):
            return price.value = quantityTickets * (170 * 5);
        default:
            return 0;
    };
}
//END Anonymous functions}


//START regular functions
function blurAndValidateText() {
  const arrayFromInputs = Array.from(inputs);
  arrayFromInputs.filter((input) => (input.type !== "radio" && input.type !== "button" && 
                                     input.type !== "submit")).forEach((input) => {
    input.addEventListener("blur", (e) => validateInputText(e.target))
  })
};
//END functions

//START Event listeners {
blurAndValidateText();
games.addEventListener("change",ticketPrice);
loc.addEventListener("change", ticketPrice);
quantity.addEventListener("change", ticketPrice);

cards.forEach((card) => {
    card.addEventListener("click", () => {
        if (card.id == "visaImg")
            alert("Visa 3 cuotas sin interes");
        else if (card.id == "mastercardImg")
            alert("Mastercard 6 cuotas sin interes");
        else
            alert("American Express 12 cuotas sin interes");
    });
})

emails.forEach((email) => {
    email.addEventListener("change", (e) => validateEmail(e.target));
});

form.addEventListener("submit", (e) => {
    const dataForm = Object.fromEntries(new FormData(e.target));
    console.log(dataForm);
    if (dataForm.email !== dataForm.emailConfirm) {
        e.preventDefault();
        alert("El email no coincide, por favor, ingresa el mismo email");
    }

    if (dataForm.firstName === "" || dataForm.lastName === "" || dataForm.tickets === "" || (dataForm.card == null || dataForm.card === "") || dataForm.email === "" || dataForm.emailConfirm === "") {
        e.preventDefault();
        alert("Por favor, rellena todos los campos");
    }

    if (!isLengthValid(dataForm.firstName) || !isLengthValid(dataForm.lastName)) {
        e.preventDefault();
        alert("El nombre y apellido no pueden tener mas de 25 caracteres");
    }

    if (dataForm.tickets < 1 || dataForm.tickets > 20) {
        e.preventDefault();
        alert("Debes comprar al menos 1 tickket y no mas de 20 por compra");
    }

});
//END Event listeners}