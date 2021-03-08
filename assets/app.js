/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// Bootstrap plugins
import Dropdown from "bootstrap/js/src/dropdown";
import Tooltip from "bootstrap/js/src/tooltip";

// con questo construtto [].slice.call(arguments) converto oggetti o Nedelist in array
const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
const dropdownList = dropdownElementList.map( (dropdownToggleEl) => {
    return new Dropdown(dropdownToggleEl)
});
