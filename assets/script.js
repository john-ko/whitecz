/**
 * our javascript!
 */

console.log("HELLO WORLD!");









function removeErrors(elementList) {
    elementList.map(function(element) {
        element.parentElement.classList.remove("has-error");
    })
}

/**
 * returns object that has 2 properties
 * errors: number of errors
 * hasError: list of elements with those errors
 * {
 *     count: 2,
 *     elements: [elementWithError1, elementWithError2]
 * }
 * @param  {[type]} list [description]
 * @return {[type]}      [description]
 */
function checkEmpty(list) {
    var count = 0;
    var elements = [];

    list.map(function(element) {
        if (!element.value) {
            count += 1;
            elements.push(element);
        }
    });

    return {
        count: count,
        elements: elements
    };

}

function getListOfElements(list) {
    var elements = [];
    list.map(function(name) {
        elements.push(document.getElementById(name));
    });

    return elements;
}

function validate(form) {

    var list = [
        "name",
        "address",
        "phone",
        "email",
        "company",
        "subject",
        "message"
    ];

    var elements = getListOfElements(list);
    console.log(elements);

    // remove any errors
    removeErrors(elements);

    var errors = checkEmpty(elements);

    if (errors.count) {
        errors.elements.map(function(el) {
            el.parentElement.classList.add("has-error");
        });
    }

    // ehh good enough
}